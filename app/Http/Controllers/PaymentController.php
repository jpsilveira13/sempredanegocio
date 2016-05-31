<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Payments;
use sempredanegocio\Models\Plans;
use sempredanegocio\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;



class PaymentController extends Controller
{

    protected $plan;
    protected $client;
    protected $payment;

    protected $email = "marketing@sempredanegocio.com.br";
    protected $token = "84330A79B1644791BC0B26B2C00E19D8";

    public function pay($id){

        \PagSeguroLibrary::init();
        \PagSeguroConfig::setEnvironment('production');

        $this->plan = Plans::find($id);
        $this->client = User::find(Auth::user()->id);

        $this->payment = Payments::create([
            'plan_name' => $this->plan->name,
            'plan_value'=> $this->plan->value,
            'plan_id'   => $this->plan->id,
            'user_id' => $this->client->id,
            'confirmed' => 0
        ]);
        // Instantiate a new payment request
        $paymentRequest = new \PagSeguroPaymentRequest();

        // Set the currency
        $paymentRequest->setCurrency("BRL");

        /* // Add an item for this payment request
         $paymentRequest->addItem('0001', 'Sempre da Negócio - Plano '.$this->plan->name, 1, $this->plan->value);*/

        $paymentRequest->addItem($this->plan->id, 'Sempre da Negócio - Plano '.$this->plan->name, 1, $this->plan->value);


        // Set a reference code for this payment request. It is useful to identify this payment
        // in future notifications.
        $paymentRequest->setReference($this->payment->id);

        //Create object PagSeguroShipping
        $shipping = new \PagSeguroShipping();

        //Set Type Shipping
        $type = new \PagSeguroShippingType(3);
        $shipping->setType($type);

        //Set address of client
        $data = Array(
            'postalCode' => $this->client->zipcode,
            'street' => $this->client->address,
            'number' => $this->client->number,
            'city' => $this->client->city,
            'state' => $this->client->state,

        );
        $address = new \PagSeguroAddress($data);
        $shipping->setAddress($address);

        //Add Shipping to Payment Request
        $paymentRequest->setShipping($shipping);

        // Set your customer information.
        $phone = str_replace(
            [
                '(',
                ')',
                ' ',
                '-'
            ],
            [
                '',
                '',
                '',
                ''
            ],
            $this->client->phone
        );


        $paymentRequest->setSender(
            $this->client->name,
            $this->client->email_responsible,
            substr($phone, 0, 2),
            substr($phone, 2)
        );

        try {

            /*
             * #### Credentials #####
             * Replace the parameters below with your credentials (e-mail and token)
             * You can also get your credentials from a config file. See an example:
             * $credentials = PagSeguroConfig::getAccountCredentials();
            //  */
            $credentials = new \PagSeguroAccountCredentials( $this->email, $this->token );

            // Register this payment request in PagSeguro to obtain the payment URL to redirect your customer.
            $onlyCheckoutCode = true;
            $code = $paymentRequest->register($credentials, $onlyCheckoutCode);
            return view('site.pages.confirma_pagamento',compact('code'));
        } catch (\PagSeguroServiceException $e) {
            die($e->getMessage());
        }

    }


}
