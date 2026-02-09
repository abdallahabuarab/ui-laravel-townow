<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('step1');
})->name('home');

Route::get('/roadside/location', function () {
    return view('step2');
})->name('roadside.location');

Route::post('/roadside/location', function (Request $request) {
    // Temporarily store the posted location data in session and redirect
    session(['roadside_location' => $request->all()]);
    return redirect()->route('roadside.location')->with('success', 'Location saved');
})->name('roadside.location.submit');
Route::get('/roadside/confirm', function () {
    return view('step3');
});
Route::get('/roadside/customer', function () {
    return view('step4');
});
Route::get('/roadside/provider-request', function () {
    return view('step5');
});
Route::get('/roadside/destination-vehicle', function () {
    return view('step6');
});
