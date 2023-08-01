<?php

namespace App\Http\Controllers\Auth\Authenticated;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StepOneController extends Controller{

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string' , 'persian_alpha'],
            'birthdate' => ['required', 'string'],
            'shenasname' => ['required', 'string'],
            'melli_code' => ['required', 'string' , 'melli_code'],
            'gender' => ['required', 'string' , 'in:مرد,زن'],
            'email_verify' => ['required', 'size:4', 'exists:sellers,verify_code'],
        ], [
            "shenasname.required" => "لطفا شماره شناسنامه خود را وارد نمایید",
            "birthdate.required" => "لطفا تاریخ تولد خود را وارد نمایید",
            "melli_code.required" => "لطفا کد ملی خود را وارد نمایید"
        ]);
    }

    public function register(Request $request){

        $this->validator($request->all())->validate();

        $client_id = auth()->guard('clients')->user()->id;

        $client = Client::query()->find($client_id);
        $client->name = $request->name;
        $client->save();

        $seller = Seller::query()->where('client_id' , '=' , $client_id)->firstOrFail();
        $seller->birthdate = $request->birthdate;
        $seller->shanasname_number = $request->shenasname;
        $seller->melli_code = $request->melli_code;
        $seller->gender = $request->gender;
        $seller->is_active = 1;
        $seller->save();


        return redirect()->route('show-seller');
    }

    public function show(){
        return view('auth.layouts.step_one');
    }


}
