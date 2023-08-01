<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ShowEditProfileController extends Controller{

    public function __invoke(Request $request){
        return view('client.profile.show_edit_profile');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'avatar' => ['image' , 'nullable' , 'mimes:jpeg,jpg,png'],
        ]);
    }

    public function edit(Request $request){

        $this->validator($request->all())->validate();

        $user_id = auth()->guard('clients')->user()->id;
        $client = Client::query()->find($user_id);
        $client->name = $request->name;
        $client->description = $request->description;

        if($request->has("avatar") && $request->avatar){
            $file = $request->file('avatar');

            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;

            Storage::disk('public')->put('avatar/' . $filename, file_get_contents($file));

            $client->avatar = 'avatar/' . $filename;
//            $file->move(public_path('app/images/article/image/'), $filename);
        }


        $client->save();

        if($client->is_seller)
            return redirect()->route('show-seller');
        return redirect()->route('show-buyer');
    }

}
