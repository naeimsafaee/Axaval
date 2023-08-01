<?php

namespace App\Http\Controllers\Client\ProfileSeller;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientProduct;
use App\Models\Product;
use App\Models\Seller;
use App\Models\SellerProduct;
use Illuminate\Http\Request;

class ShowUserProfileController extends Controller{

    public function __invoke($name, $id){

        $client = Seller::query()->find($id);
        $client->products;
        return view('client.profile_seller.show_user_profile', compact('client'));
    }
}
