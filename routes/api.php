<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::namespace ('Admin')->group(function () {
    //Route::post('idpay/callback', 'TransactionController@idPayCallback')->name('idpay-callback');
    Route::POST('user/signin', 'UserApiController@signinuser');

    Route::POST('user/verify', 'UserApiController@verifyuser');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::GET('user/supports', 'UserApiController@getusersupports');
        Route::POST('user/support/sendmessage', 'UserApiController@sendusersupport');
    });

});


Route::get('/search' , 'Client\Search\ShowSearchResultController@search_api')->name('search_api');
//Route::post('/file/upload', 'Client\ProfileSeller\UploadController@upload')->name('upload');

