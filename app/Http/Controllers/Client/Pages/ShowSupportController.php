<?php

namespace App\Http\Controllers\Client\Pages;

use App\Http\Controllers\Controller;
use App\Submit_Support;
use Illuminate\Http\Request;

class ShowSupportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        if(auth()->guard("clients")->check())

            $messages = Submit_Support::query()->where('client_id','=',auth()->guard("clients")->user()->id)->get();
        else

            $messages = Submit_Support::query()->where('client_ip','=',request()->ip())->get();

        return view('client.pages.support', compact('messages'));
    }

    public function submit_form(Request $request)
    {
        if(auth()->guard("clients")->check())
            Submit_Support::query()->create(['message_text'=>$request->messagetext ,'is_admin'=>false, 'client_id'=>auth()->guard("clients")->user()->id]);
        else
            Submit_Support::query()->create(['message_text'=>$request->messagetext ,'is_admin'=>false,'client_ip' => request()->ip()]);

        return redirect('support');
    }
}
