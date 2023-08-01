<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AxAval;
use App\Models\Client;
use App\Models\Seller;
use App\Notifications\SendSMS;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RequestSellerController extends Controller{

    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct(){

    }

    protected function validator(array $data){

        return Validator::make($data, [
            'melli_card_scan' => ['image', 'required', 'mimes:jpeg,jpg,png'],
            'home_phone' => ['required'],
            'phone' => ['iran_mobile', 'required'],
            'email' => ['required' , 'email:rfc,dns'],
        ], [
            "melli_card_scan.required" => "لطفا اسکن کارت ملی خود را انتخاب کنید",
            "home_phone.required" => "شماره تلفن ثابت الزامی است",
        ]);
    }

    protected function create($data){
        if(substr($data->phone, 0, 1) == 0)
            $data->phone = substr($data->phone, 1);

        $code = rand(1000, 9999);
        $email_code = rand(1000, 9999);

        $client = Client::query()->where('phone', '=', $data->phone)->updateOrCreate([
            'phone' => $data->phone,
        ], [
            "phone" => $data->phone,
            "verify_code" => $code,
            "is_seller" => true,
            "phone_verified" => false,
        ]);

        $file = $data->file('melli_card_scan');

        $filename = time() . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->put('melli_card/' . $filename, file_get_contents($file));

        $seller = Seller::query()->updateOrCreate(["client_id" => $client->id], [
            "melli_card" => 'melli_card/' . $filename,
            "home_phone" => $data->home_phone,
            "email" => $data->email,
            "verify_code" => $email_code,
        ]);

        $client->notify(new SendSMS($client->phone, $code));

        Mail::to($seller)->send(new AxAval($email_code));

        return $client;
    }

    public function show(){

        return view('auth.layouts.request_seller');
    }

    public function register(Request $request){

        $this->validator($request->all())->validate();

        $client = $this->create($request);

        auth()->guard('clients')->login($client);

        return redirect()->route('verify');
    }

}
