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
    Auth::user()->subscription('monthlyPremium')->withCoupon('special')->create(Input::get('stripeToken'));

    return 'Subscribed for one premium month';
});

Route::get('testing', function () {
    dd(Auth::user()->onGracePeriod());
});

Route::get('swap', function () {
    Auth::user()->subscription('monthly')->swapAndInvoice();

    return 'Swapped to monthly';
});

Route::get('coupon', function() {
    Auth::user()->applyCoupon('special');

    return 'Coupon applied';
});

Route::get('cancel', function () {
    Auth::user()->subscription()->cancel();

    return 'Cancelled';
});

Route::get('invoices', function () {
    $invoices = Auth::user()->invoices();

    return view('invoices', compact('invoices'));
});
