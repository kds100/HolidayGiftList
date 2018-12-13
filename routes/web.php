<?php

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

use App\Gift;
use Illuminate\Http\Request;

/* Display All Gifts as a list */
Route::get('/', function () {
    return view('gifts');
});

/* Add A New Gift */
Route::post('/gift', function (Request $request) {
    //
});

/* Delete An Existing Gift */
Route::delete('/gift/{id}', function ($id) {
    //
});

Route::post('/gift', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'product' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $gift = new gift;
    $gift->product = $request->product;
    $gift->quantity = $request->quantity;
    $gift->recipient = $request->recipient;
    $gift->cost = 0;
    $gift->save();

    return redirect('/');
});

Route::get('/', function () {
    $gifts = gift::orderBy('created_at', 'asc')->get();

    return view('gifts', [
        'gifts' => $gifts
    ]);
});

Route::delete('/gift/{id}', function ($id) {
    gift::findOrFail($id)->delete();

    return redirect('/');
});