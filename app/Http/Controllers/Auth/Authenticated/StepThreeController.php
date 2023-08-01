<?php

namespace App\Http\Controllers\Auth\Authenticated;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StepThreeController extends Controller{

    public function show(){
        return view('auth.layouts.step_three');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'hesab' => ['required', 'string'],
            'card_number' => ['required', 'string'],
            'shaba' => ['required', 'string'],
        ], [
            "hesab.required" => "لطفا شماره حساب خود را وارد نمایید",
            "card_number.required" => "لطفا شماره کارت خود را وارد نمایید",
            "shaba.required" => "لطفا شماره شبای خود را وارد نمایید",
        ]);
    }

    public function register(Request $request){

        $this->validator($request->all())->validate();

        $client_id = auth()->guard('clients')->user()->id;

        $seller = Seller::query()->where('client_id', '=', $client_id)->firstOrFail();
        $seller->hesab_number = $request->hesab;
        $seller->shaba_number = $request->shaba;
        $seller->card_number = $request->card_number;
        $seller->is_active = 3;
        $seller->save();

        return redirect()->route('show-seller');
    }


}
