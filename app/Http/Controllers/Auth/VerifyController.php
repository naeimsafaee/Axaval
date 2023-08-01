<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VerifyController extends Controller{
    /*
   |--------------------------------------------------------------------------
   | Email Verification Controller
   |--------------------------------------------------------------------------
   |
   | This controller is responsible for handling email verification for any
   | user that recently registered with the application. Emails may also
   | be re-sent if the user didn't receive the original email message.
   |
   */

    /**
     * Where to redirect users after verification.
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(){

    }

    /**
     * Get a validator for an incoming registration request.
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'code' => ['required', 'size:4', 'exists:clients,verify_code'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    protected function create(array $data){

        $client = Client::query()->find(auth()->guard('clients')->user()->id);
        $client->phone_verified = 1;
        $client->save();

        return $client;
    }

    public function show(){
        if(!auth()->guard('clients')->check())
            return redirect()->route('login');

        if(auth()->guard('clients')->user()->phone_verified == 1)
            return redirect()->route('home');
        return view('auth.layouts.verify');
    }

    public function register(Request $request){

        $this->validator($request->all())->validate();

        $client = $this->create($request->all());

        if($client->is_seller)
            return redirect()->route('show-seller');

        if(!$client->name)
            return redirect()->route('editProfile');

        return redirect()->route('show-buyer');
    }

}
