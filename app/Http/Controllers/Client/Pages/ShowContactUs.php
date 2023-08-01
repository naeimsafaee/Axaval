<?php

namespace App\Http\Controllers\Client\Pages;

use App\ContactUsForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowContactUs extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('client.pages.Contact_us');
    }

    public function ContactUsForm(Request $request)
    {
        ContactUsForm::query()->create(['name'=>$request->name ,'title'=>$request->title , 'description'=>$request->description ]);
        return redirect('contact_us');
    }
}
