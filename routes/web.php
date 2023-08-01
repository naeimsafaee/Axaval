<?php

use App\Mail\AxAval;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::namespace('Admin')->group(function(){
    Route::get('locale/{lang}', 'LocalController@setLocale')->middleware('web');
    Route::group(['prefix' => 'admin'], function(){
        Voyager::routes();
        Route::group(['middleware' => 'admin.user'], function(){
            /*personalizemenus*/
            Route::post('personalizemenus/set', 'personalizemenus@set');
            Route::post('personalizemenus/delete', 'personalizemenus@delete');
            Route::post('personalizemenus/update', 'personalizemenus@update');
            /*notes*/
            Route::post('notes/set', 'NoteController@set');
            Route::post('notes/delete', 'NoteController@delete');
            /*chargesms*/ // Route::post('chargesms', 'TransactionController@chargesms');
            /*chart*/
            Route::get('chartdata', 'ChartController');
            /*messagetemplate */
            Route::post('messagetemplate/set', 'MessagetemplateController@set');
            Route::post('messagetemplate/delete', 'MessagetemplateController@delete');
            /*support */
            Route::post('support/sendmessage', 'SupportController@sendmessage');
            Route::post('support/readmessage', 'SupportController@readmessage');
            Route::get('support/getmessage', 'SupportController@getmessages');
            Route::post('support/lockmessage', 'SupportController@lockmessage');
            //Route::post('support/createmessage', 'SupportController@createmessage');
            Route::post('support/banuser', 'SupportController@banuser');
        });
    });

});


Route::get('migrate', function(){
    Artisan::call('migrate');

    return redirect()->route('home');
    //    die('migrate complete');
});

Route::get('clear', function(){
    Artisan::call('config:clear');

    return redirect()->route('home');
    //    die('migrate complete');
});

Route::get('clear_view', function(){
    Artisan::call('view:clear');

    return redirect()->route('home');
    //    die('migrate complete');
});

Route::get('seed', function(){
    Artisan::call('db:seed', ['--class' => 'SettingsTableSeeder']);

    return redirect()->route('home');
    //    die('migrate complete');
});


//search
Route::get('/search', 'Client\Search\ShowSearchResultController')->name('search');

//product
Route::get('/single-product/{slug}/{id}/{size?}', 'Client\Product\ShowSingleProductController')->name('single_product');
Route::get('/add_to_book_mark/{id}', 'Client\Product\ShowSingleProductController@add_bookmark')->name('add_bookmark');

Route::get('/profile', function(){
})->middleware('detect_buyer_or_seller')->name('profile');

//profile
Route::get('/profile/edit', 'Client\Profile\ShowEditProfileController')->name('editProfile')->middleware([
    'auth_client',
]);
Route::post('/profile/edit', 'Client\Profile\ShowEditProfileController@edit')->name('edit')->middleware([
    'auth_client',
]);
Route::get('/profile/request-money/{result?}', 'Client\Profile\ShowRequestMoneyController')->middleware([
    'auth_client',
    'is_authenticated',
    'is_seller',
])->name('request_money');

Route::post('/profile/request-money/submit', 'Client\Profile\ShowRequestMoneyController@submit')->middleware([
    'auth_client',
    'is_authenticated',
    'is_seller',
])->name('request_money_submit');


//profile-seller
Route::get('/show-seller', 'Client\ProfileSeller\ShowProfileSellerController')->middleware([
    'auth_client',
    'is_authenticated',
    'is_seller',
])->name('show-seller');
Route::get('/seller/upload', 'Client\ProfileSeller\UploadController')->middleware([
    'auth_client',
    'is_authenticated',
    'is_seller',
])->name('upload');

//profile-buyer
Route::get('/show-buyer', 'Client\ProfileBuyer\ShowProfileBuyerController')->middleware([
    'auth_client',
    'name_needed',
    'is_buyer',
])->name('show-buyer');


Route::get('/ShowUser/{name}/{id}', 'Client\ProfileSeller\ShowUserProfileController')->name('ShowUser');

//blog
Route::get('/blogs', 'Client\Blog\ShowBlogsController')->name('blogs');
Route::get('/singleBlog/{slug}', 'Client\Blog\SingleBlogController')->name('singleBlog');

//pages
Route::get('/contact_us', 'Client\Pages\ShowContactUs')->name('contact_us');
Route::post('/contact_us/saveform', 'Client\Pages\ShowContactUs@ContactUsForm')->name('ContactUsForm');
Route::get('/faq', 'Client\Pages\FaqController')->name('faq');
Route::get('/about_us', 'Client\Pages\AboutUsController')->name('about_us');
Route::get('/pricing', 'Client\Pages\ShowPricingController')->name('pricing');
Route::get('/support', 'Client\Pages\ShowSupportController')->name('support');
Route::get('/', 'Client\Pages\HomeController')->name('home');

//auth
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/verify', 'Auth\VerifyController@show')->middleware('auth_client')->name('verify');
Route::post('/verify', 'Auth\VerifyController@register')->middleware('auth_client')->name('set_verify');
//authenticated
Route::get('/step_one', 'Auth\Authenticated\StepOneController@show')->middleware('auth_client')->name('step_one');
Route::post('/step_one', 'Auth\Authenticated\StepOneController@register')->middleware('auth_client')->name('set_step_one');
Route::get('/step_two', 'Auth\Authenticated\StepTwoController@show')->middleware('auth_client')->name('step_two');
Route::post('/step_two', 'Auth\Authenticated\StepTwoController@register')->middleware('auth_client')->name('set_step_two');
Route::get('/step_three', 'Auth\Authenticated\StepThreeController@show')->middleware('auth_client')->name('step_three');
Route::post('/step_three', 'Auth\Authenticated\StepThreeController@register')->middleware('auth_client')->name('set_step_three');

//request auth
Route::get('/request_seller', 'Auth\RequestSellerController@show')->middleware('auth_client')->name('request_seller');
Route::post('/request_seller', 'Auth\RequestSellerController@register')->middleware('auth_client')->name('set_request_seller');

Route::get('pay_plan/{plan_id}', 'PaymentController@pay_plan')->name('pay_plan');
Route::get('pay_with_card/{product_id}', 'PaymentController@pay_with_card')->middleware('auth_client')->name('pay_with_card');
Route::get('pay_product/{product_id}', 'PaymentController@pay_product')->middleware('auth_client')->name('pay_product');
Route::get('/callback', 'PaymentController@verify');

Route::post('/support/submit_form', 'Client\Pages\ShowSupportController@submit_form')->name('submit_form');

Route::post('/seller/upload', 'Client\ProfileSeller\UploadController@upload')->middleware([
    'auth_client',
    'is_seller',
])->name('set_upload');

Route::get('up', function(){

    Mail::to(["email" => "naeimsafaee1412@gmail.com"])->send(new AxAval(2456));

});


