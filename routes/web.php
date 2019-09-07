<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/charge', function (Request $request) {

   $user =  \App\User::find(2);

//    if ($user->hasStripeId()) {
//        $user->charge(66 * 100, [
//            'description' => 'test charge',
//        ]);
//        return [
//            'success' => true,
//            'error_message' => 'Payment successful'
//        ];
//    }else{
//        $user->createAsStripeCustomer();
//        $user->updateCard($request->stripeToken);
//        $user->charge(10000);
//    }

    if ($user->hasStripeId()) {
        $user->updateCard($request->stripeToken);
        $user->charge(55000);
        return [
            'success' => true,
            'error_message' => 'Payment successful'
        ];
    }
});
