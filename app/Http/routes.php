<?php

Auth::loginUsingId(1);

Route::get('/', function () {
    $user = Auth::user();

    return view('cart', compact('user'));
});

Route::post('/', function () {
    $total = Auth::user()->cart->sum(function ($cart) {
        return $cart->product->price * $cart->quantity;
    });

    Auth::user()->charge($total * 100, ['source' => Input::get('stripeToken')]);

    return 'Charged';
});

Route::get('subscribe', function () {
    $user = Auth::user();

    return view('subscribe', compact('user'));
});

Route::post('subscribe', function () {
    Auth::user()->subscription('monthlyPremium')->create(Input::get('stripeToken'));

    return 'Subscribed for one premium month';
});

Route::get('testing', function () {
    dd(Auth::user()->everSubscribed());
});
