<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\User;
use App\Models\AccountsPayments;
use App\Models\Pricing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccess;

class PaymentController extends Controller
{
    private $gateway;

    public function showPaymentForm()
    {
        $pricing = Pricing::latest()->first();
        return view('/users/products', [
            'pricing' => $pricing,
        ]);
    }

    public function processPayment(Request $request)
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false);

        $price = Pricing::first();

        $params = [
            'amount' => $price->priceWith, // Customize this based on your application's needs
            'currency' => env('PAYPAL_CURRENCY'),
            'returnUrl' => url('/payment/success'),
            'cancelUrl' => url('/payment/cancel'),
        ];

        $response = $this->gateway->purchase($params)->send();

        if ($response->isRedirect()) {
            // Redirect to the payment gateway
            return $response->redirect();
        } else {
            // Handle the error
            return $response->getMessage();
        }
    }

    public function processPaymentWithout(Request $request)
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false);

        $price = Pricing::first();

        $params = [
            'amount' => $price->priceWithout, // Customize this based on your application's needs
            'currency' => env('PAYPAL_CURRENCY'),
            'returnUrl' => url('/payment/successWithout'),
            'cancelUrl' => url('/payment/cancel'),
        ];

        $response = $this->gateway->purchase($params)->send();

        if ($response->isRedirect()) {
            // Redirect to the payment gateway
            return $response->redirect();
        } else {
            // Handle the error
            return $response->getMessage();
        }
    }

    public function paymentSuccess(Request $request)
    {
        // Process successful payment
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false);

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payerId' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ]);

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = new AccountsPayments();
                $payment->uuid = Str::uuid();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payment_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->type = 1;

                // Get the client name from the payer information
                $clientFirstName = $arr['payer']['payer_info']['first_name'];
                $clientLastName = $arr['payer']['payer_info']['last_name'];

                // Combine the first and last names if needed
                $clientFullName = $clientFirstName . ' ' . $clientLastName;

                // Assuming you have a 'client_name' column in your Payment model
                $payment->client_name = $clientFullName;

                Mail::to('patrickespena016@gmail.com')->send(new PaymentSuccess($payment->payment_id, $payment->client_name, $payment->uuid));
                // Mail::to($payment->payment_email)->send(new PaymentSuccess($payment->payment_id, $payment->client_name, $payment->uuid));

                $payment->save();

                return redirect()
                    ->route('homepage')
                    ->with('success', 'Payment is Successful. Your Transaction ID is: ' . $arr['id']);
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Payment declined!';
        }
    }

    public function paymentsuccessWithout(Request $request)
    {
        // Process successful payment
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false);

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payerId' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ]);

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = new AccountsPayments();
                $payment->uuid = Str::uuid();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payment_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->type = 2;

                // Get the client name from the payer information
                $clientFirstName = $arr['payer']['payer_info']['first_name'];
                $clientLastName = $arr['payer']['payer_info']['last_name'];

                // Combine the first and last names if needed
                $clientFullName = $clientFirstName . ' ' . $clientLastName;

                // Assuming you have a 'client_name' column in your Payment model
                $payment->client_name = $clientFullName;

                Mail::to('patrickespena016@gmail.com')->send(new PaymentSuccess($payment->payment_id, $payment->client_name, $payment->uuid));
                // Mail::to($payment->payment_email)->send(new PaymentSuccess($payment->payment_id, $payment->client_name, $payment->uuid));

                $payment->save();

                return redirect()
                    ->route('homepage')
                    ->with('success', 'Payment is Successful. Your Transaction ID is: ' . $arr['id']);
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Payment declined!';
        }
    }

    public function paymentCancel(Request $request)
    {
        // Handle payment cancellation
        return redirect('/')->with('error', 'Payment cancelled.');
    }
}
