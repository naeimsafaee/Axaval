<?php

namespace App\Http\Controllers\Client\ProfileSeller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowProfileSeller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('client.profile_seller.show_profile_seller');

    }
}
