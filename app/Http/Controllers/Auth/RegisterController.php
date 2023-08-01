<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Client;
use App\Notifications\SendSMS;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(){
    }

    public function showRegistrationForm(){
        auth()->guard('clients')->logout();
        return view('auth.layouts.login');
    }

    /**
     * Get a validator for an incoming registration request.
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        if(substr($data["phone"], 0, 1) == 0)
            $data["phone"] = substr($data["phone"], 1);

        return Validator::make($data, [
            //            , 'unique:clients,phone'
            'phone' => ['required', 'iran_mobile', 'max:11'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    protected function create(array $data){

        $code = rand(1000, 9999);

        $client = Client::query()->updateOrCreate([
            'phone' => $data['phone'],
        ], [
            'phone' => $data['phone'],
            "verify_code" => $code,
            "phone_verified" => 0,
        ]);

        $client->notify(new SendSMS($client->phone, $code));

        return $client;
    }

    public function register(Request $request){

        $this->validator($request->all())->validate();

        $client = $this->create($request->all());

        auth()->guard('clients')->login($client);

        $this->registered($request, $client);

        return redirect()->route('verify');
    }
}
