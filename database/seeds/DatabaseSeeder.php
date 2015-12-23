<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        App\User::truncate();
        App\Cart::truncate();
        App\Product::truncate();

        factory(App\Product::class, 10)->create();

        factory(App\User::class, 10)->create()->each(function ($user) {
            $user->cart()->saveMany(
                factory(App\Cart::class, 2)->make()
            );
        });

        Model::reguard();
    }
}
