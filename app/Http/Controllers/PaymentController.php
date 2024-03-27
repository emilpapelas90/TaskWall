<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Funds;

class PaymentController extends Controller
{
    public function funds(){
      return view('advertiser.add_funds');
    } 

    public function add_funds(Request $req){

      if($req['amount'] < 2){
        Toast::message('Minimum Amount is $2')->danger()->rightBottom()->autoDismiss(3);
        return view('advertiser.add_funds');
      }  

      if(!$req['provider']){
        Toast::message('Please Select an Payment Method.')->danger()->rightBottom()->autoDismiss(3);
        return view('advertiser.add_funds');
      }

      if($req['provider'] == 'paypal'){

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();

        $res = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
            "return_url" => route('success'), 
            "cancel_url" => route('cancel')  
            ],
            "purchase_units" => [
                [
                "amount" => [
                  "currency_code" => "USD",
                  "value" => $req->amount
                ]
                ]
            ]
        ]);

      if(isset($res['id']) && $res['id'] != null){
        foreach($res['links'] as $link) {
         if($link['rel'] === 'approve') {
          return redirect()->away($link['href']);
         } 
        } 
      } else {
        return redirect()->route('cancel');
      }
     }

     if($req['provider'] == 'stripe'){

        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));

        $res = $stripe->checkout->sessions->create([
         'line_items' => [
           [
            'price_data' => [
              'currency' => 'usd',
              'product_data' => [
                'name' => 'TaskWall Deposit'
              ],
              'unit_amount' => $req['amount'] * 100,
            ],
            'quantity' => 1,
           ],
         ],
         'mode' => 'payment',
         'success_url' => route('stripe_success').'?session_id={CHECKOUT_SESSION_ID}',
         'cancel_url' => route('stripe_cancel'),

        ]);

        if(isset($res->id) && $res->id != ''){
          return redirect($res->url);
        } else {
          return redirect()->route('stripe_cancel');
        }
     }
  
    }
  
    public function success(Request $req){
  
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
  
        $res = $provider->capturePaymentOrder($req->token);
  
        if(isset($res['status']) && $res['status'] == 'COMPLETED'){

          $user = User::findOrFail(Auth::id());

          $amount = $res['purchase_units'][0]['payments']['captures'][0]['amount'];
          $user->update(['abalance' => $user->abalance + $amount['value']]);

          Funds::create([
           'user_id' => Auth::id(),
           'provider' => 'PayPal',
           'amount' => $amount['value'],
           'currency' => $amount['currency_code']
          ]);

          session()->put('payment_success', true);
          session()->put('payment_provider', 'PayPal');
          session()->put('payment_amount', $amount['value']);

          return redirect()->route('summary');

        } else {
          return redirect()->route('cancel');
        }
  
      return 'Payment Success';
    }
  
    public function cancel(){
      return 'Payment Failed';
    }

    public function stripe_success(Request $req){

      if(isset($req->session_id)){

        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
        $res = $stripe->checkout->sessions->retrieve($req->session_id);

        Funds::create([
          'user_id' => Auth::id(),
          'provider' => 'Stripe',
          'amount' => $res->amount_total,
          'currency' => Str::upper($res->currency)
        ]);

        session()->put('payment_success', true);
        session()->put('payment_provider', 'Stripe');
        session()->put('payment_amount', $res->amount_total);

        return redirect()->route('summary');

      } else {
        return redirect()->route('stripe_cancel');
      }

    }

    public function stripe_cancel(){
      return 'Stripe Payment Failed';
    }

    public function summary(){
      if (session()->has('payment_success')) {

        $amount = session()->get('payment_amount');
        $provider = session()->get('payment_provider');

        session()->forget('payment_success');
        session()->forget('payment_provider');
        session()->forget('payment_amount');

       return view('advertiser.success', ['amount' => $amount, 'provider' => $provider]);

      } else {
        return redirect()->route('dashboard');
      }
    }
}
