<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;

class DashboardController extends Controller
{
    public function plans()
    {
        $stripe_plans = [];
        $stripe_product_id = "prod_I7INY1teqX6icH";
        $stripe = new Stripe(config('services.stripe.secret'));
        $plans = $stripe->plans()->all();
        foreach ($plans['data'] as $key => $value) {
            if ($value['product'] == $stripe_product_id) {
                $stripe_plans[] = $value;
            }
        }
        // dd($stripe_plans);
        return view('dashboard', get_defined_vars());
    }

    public function pay(Request $req)
    {
        if ($req->id == "")
            abort(404);
        $intent = auth()->user()->createSetupIntent();
        return view('pay', get_defined_vars());
    }

    public function subscription(Request $req)
    {
        if (auth()->user()->subscribed("StripeDemo")) {
            if (auth()->user()->subscribed("StripeDemo")) {
                auth()->user()->subscription("StripeDemo")->swap( $req->stripe_plan_id );
            }
        }
        else{
            $stripeCustomer = auth()->user()->createAsStripeCustomer();
            auth()->user()->updateDefaultPaymentMethod($req->payment_method);
            $paymentMethod = auth()->user()->defaultPaymentMethod()->paymentMethod;
            auth()->user()->newSubscription("StripeDemo", $req->stripe_plan_id)->create($paymentMethod);
        }


        return redirect()->route('success');
    }

    public function success()
    {
        $stripe = new Stripe(config('services.stripe.secret'));
        $plan = $stripe->plans()->find(auth()->user()->subscriptions()->first()->stripe_plan);
        return view('success', get_defined_vars());
    }
}
