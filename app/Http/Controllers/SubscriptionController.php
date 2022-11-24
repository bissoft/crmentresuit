<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //

    public function retrievePlans($type = 'monthly')
    {
        $plans = Plan::where('type', $type)->get();
        return view('plans', compact('plans', 'type'));
    }

    public function showSubscription($id)
    {
        $user = auth()->user();
        $plan = Plan::findOrFail($id);

        if ($user->subscribed($plan->name)) {
            return redirect()->route('subscription.plans');
        }

        return view('subscribe', [
            'intent' => $user->createSetupIntent(),
            'plan' => $plan
        ]);
    }

    public function processSubscription(Request $request)
    {
        $user = auth()->user();
        $paymentMethod = $request->input('payment_method');
    
        

        try {
            @$user->createOrGetStripeCustomer();
            @$user->addPaymentMethod($paymentMethod);
            @$plan = Plan::findOrFail($request->plan);
            @$user->newSubscription($plan->name, $plan->stripe_plan_id)
                ->create($paymentMethod, [
                    'email' => $user->email
                ]
            );
        } catch (\Exception $e) {
            
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }

        return redirect()->route('subscription.plans');
    }
}
