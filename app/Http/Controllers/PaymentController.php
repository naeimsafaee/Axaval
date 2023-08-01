<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ClientPricing;
use App\Models\ClientProduct;
use App\Models\Color;
use App\Models\DiscountCodes;
use App\Models\Pricing;
use App\Models\Product;
use App\Models\Seller;
use App\Models\SellerProduct;
use App\Models\Transaction;
use Illuminate\Http\Request;
use SaeedVaziry\Payir\Exceptions\SendException;
use SaeedVaziry\Payir\Exceptions\VerifyException;
use SaeedVaziry\Payir\PayirPG;

class PaymentController extends Controller{

    public function pay_plan($plan_id){

        $plan = Pricing::query()->findOrFail($plan_id);

        if(!auth()->guard('clients')->check()){

            ClientPricing::query()->create([
                'plan_id' => $plan_id,
                'ip' => \request()->ip(),
                'count' => $plan->pic_count,
            ]);

            return redirect()->route('login');
        } else {

            ClientPricing::query()->create([
                'plan_id' => $plan_id,
                'client_id' => auth()->guard('clients')->user()->id,
                'count' => $plan->pic_count,
            ]);

            $factor_number = rand(100000, 999999);

            $payir = new PayirPG();
            $payir->amount = ($plan->price) * 10; // Required, Amount
            $payir->factorNumber = $factor_number; // Optional
            $payir->description = setting('cart.gate_description'); // Optional
            $payir->mobile = auth()->guard('clients')->user()->phone; // Optional, If you want to show user's saved card numbers in gateway

            Transaction::query()->create([
                'wallet_transaction_id' => $factor_number,
                'amount' => ($plan->price) * 10,
                'client_id' => auth()->guard('clients')->user()->id,
                'product_id' => $plan_id,
                'is_plan' => true,
                'status' => 0,
                'paid' => false,
            ]);

            try {
                $payir->send();

                return redirect($payir->paymentUrl);
            } catch(SendException $e){
                throw $e;
            }
        }

    }

    public function pay_product($product_id){

        $product = Product::query()->findOrFail($product_id);

        if(!auth()->guard('clients')->check() ){
            return redirect()->route('login');
        } else {

            $factor_number = rand(100000, 999999);

            $payir = new PayirPG();
            $payir->amount = ($product->price) * 10; // Required, Amount
            $payir->factorNumber = $factor_number; // Optional
            $payir->description = setting('cart.gate_description'); // Optional
            $payir->mobile = auth()->guard('clients')->user()->phone; // Optional, If you want to show user's saved card numbers in gateway

            Transaction::query()->create([
                'wallet_transaction_id' => $factor_number,
                'amount' => ($product->price) * 10,
                'client_id' => auth()->guard('clients')->user()->id,
                'product_id' => $product_id,
                'is_plan' => false,
                'status' => 0,
                'paid' => false,
            ]);

            try {
                $payir->send();

                return redirect($payir->paymentUrl);
            } catch(SendException $e){
                throw $e;
            }
        }

    }

    public function verify(Request $request){
        $payir = new PayirPG();
        $payir->token = $request->token; // Pay.ir returns this token to your redirect url

        try {

            $verify = $payir->verify(); // returns verify result from pay.ir like (transId, cardNumber, ...)

            if($verify["status"] && $verify["status"] == 1){
                $transaction = Transaction::query()->where('wallet_transaction_id', '=', $verify["factorNumber"])->first();
                $transaction->status = 1;
                $transaction->paid = true;
                //                $transaction->bank_transaction_id = $verify["transId"];
                $transaction->card_number = $verify["cardNumber"];
                $transaction->transaction_data = json_encode($verify);
                $transaction->transaction_date = now();
                $transaction->save();


                if($transaction->is_plan){

                    $client_pricing = ClientPricing::query()->where([
                        'client_id' => auth()->guard('clients')->user()->id,
                        'plan_id' => $transaction->product_id,
                    ])->first();

                    $client_pricing->is_paid = true;
                    $client_pricing->is_active = true;
                    $client_pricing->save();

                    $redirect = route('home');

                } else {
                    $product = Product::query()->find($transaction->product_id);

                    ClientProduct::query()->create([
                       "product_id" => $product->id,
                        "client_id" => auth()->guard('clients')->user()->id
                    ]);

                    $seller_product = SellerProduct::query()->where('product_id' , '=' , $product->id)->first();

                    $seller = Seller::query()->find($seller_product->seller_id);
                    $seller->wallet += $product->price;
                    $seller->save();

                    $redirect = route('single_product' , [$product->slug , $product->id]);
                }

                return view('client.pages.callback' , compact('redirect'));

            } else {
                return view('client.pages.callback_error');
            }

        } catch(VerifyException $e){
            //throw $e;
            return view('client.pages.callback_error');
        }
    }

    public function pay_with_card($product_id){

        $product = Product::query()->findOrFail($product_id);

        $client_pricing = ClientPricing::query()->where([
            'client_id' => auth()->guard('clients')->user()->id,
            'is_active' => 1,
            'is_paid' => 1,
        ])->where('count' , '>' , 0)->firstOrFail();

        $client_pricing->count -= 1;
        $client_pricing->save();

        ClientProduct::query()->create([
            'product_id' => $product_id,
            'client_id' => auth()->guard('clients')->user()->id
        ]);


        $seller_product = SellerProduct::query()->where('product_id' , '=' ,$product_id)->first();

        $seller = Seller::query()->find($seller_product->seller_id);
        $seller->wallet += $product->price;
        $seller->save();

        return redirect()->route('single_product' , [$product->slug , $product->id]);
    }



}
