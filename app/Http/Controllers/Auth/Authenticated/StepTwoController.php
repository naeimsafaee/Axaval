<?php

namespace App\Http\Controllers\Auth\Authenticated;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StepTwoController extends Controller{


    protected function validator(array $data){
        return Validator::make($data, [
            'town_id' => ['required', 'exists:towns,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'address' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
        ], [
            "postal_code.required" => "لطفا کد پستی خود را وارد نمایید",
            "city_id.required" => "لطفا شهر خود را وارد نمایید",
            "town_id.required" => "لطفا استان خود را وارد نمایید",
        ]);
    }

    public function register(Request $request){

        $this->validator($request->all())->validate();

        $client_id = auth()->guard('clients')->user()->id;

        $client = Client::query()->find($client_id);

        $seller = Seller::query()->where('client_id', '=', $client_id)->firstOrFail();
        $seller->city_id = $request->city_id;
        $seller->town_id = $request->town_id;
        $seller->address = $request->address;
        $seller->postal_code = $request->postal_code;
        $seller->is_active = 2;
        $seller->save();

        return redirect()->route('show-seller');
    }

    public function show(){
        return view('auth.layouts.step_two');
    }

}
