<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\RequestMoney;
use Illuminate\Http\Request;

class ShowRequestMoneyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request , $result = -1)
    {
        $client_id = auth()->guard('clients')->user()->id;
        $client = Client::query()->find($client_id);

        return view('client.profile.show_request_money' , compact('client' , 'result'));

    }

    public function submit(Request $request)
    {
        $client_id = auth()->guard('clients')->user()->id;
        $client = Client::query()->find($client_id);

        if($request->price > $client->seller->wallet){
            $result = 0;
            return redirect(route('request_money',[$result]));
        }
        else{
            $result = 1 ;
            RequestMoney::query()->create(['price'=>$request->price , 'client_id'=>$client->id , 'status'=>0]);
            return redirect(route('request_money',[$result]));

        }
    }
}
