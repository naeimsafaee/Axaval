<?php

namespace App\Http\Controllers\Client\ProfileBuyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowProfileBuyer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('client.profile_buyer.show_profile_buyer');
    }
}
