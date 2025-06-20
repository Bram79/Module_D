<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\PaymentIntent;

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

            Stripe::setApiKey(env('STRIPE_SECRET'));

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
