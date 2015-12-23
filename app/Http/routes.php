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
