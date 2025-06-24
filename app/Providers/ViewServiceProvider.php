<?php

namespace App\Providers;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Product;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer('layouts.admin', function ($view) {

            Stripe::setApiKey(config('services.stripe.secret'));


            $paymentIntents = PaymentIntent::all(['limit' => 100]);
            $totalRevenue = 0;
            $orderCount = 0;

            foreach ($paymentIntents->data as $payment) {
                if ($payment->status === 'succeeded') {
                    $totalRevenue += $payment->amount;
                    $orderCount++;
                }
            }

            $view->with([
                'userCount' => User::count(),
                'productCount' => Product::count(),
                'orderCount' => $orderCount,
                'totalRevenue' => $totalRevenue
            ]);
        });
    }


}
