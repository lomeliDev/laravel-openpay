<?php

namespace TooPago\OpenPay;

use InvalidArgumentException;
use TooPago\OpenPay\LaravelOpenPay;
use Exception;

class Customers
{


    public function newCustomer($customerData , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            //$response = $openpay->customers->add($customerData);


            $customerData = array(
                'card_number' => '5555555555554444',
                'holder_name' => 'Juan Perez Ramirez',
                'expiration_year' => '25',
                'expiration_month' => '12',
                'cvv2' => '110',
            );
            $response = $openpay->tokens->add($customerData);

            $customers = $openpay->customers->get('ac97s6ipgtyc4jypzwm5');
            $customers->cards->add(array(
                'token_id' => $response->id,
                'device_session_id' => '8VIoXj0hN5dswYHQ9X1mVCiB72M7FY9o',
                
            ));



            dd($response);



            // if($response && $response->id)
            // {
            //     $OpenPay = new \stdClass;
            //     $OpenPay->id = $response->id;
            //     $onSuccess($OpenPay , $this);    
            // } else {
            //     $OpenPay = new \stdClass;
            //     $OpenPay->message = 'Operation not allowed';
            //     $onError($OpenPay);
            // }
        } catch (\OpenpayApiRequestError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiConnectionError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiAuthError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\InvalidArgumentException $exc) {
            $onError($exc);
        } catch (Exception $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        }
    }


    public function getCustomer($id , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $response = $openpay->customers->get($id);
            if($response && $response->id)
            {
                $OpenPay = new \stdClass;
                $OpenPay->id = $response->id;
                $onSuccess($response , $this);    
            } else {
                $OpenPay = new \stdClass;
                $OpenPay->message = 'Operation not allowed';
                $onError($OpenPay);
            }
        } catch (\OpenpayApiRequestError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiConnectionError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiAuthError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\InvalidArgumentException $exc) {
            $onError($exc);
        } catch (Exception $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        }
    }



    public function allCustomers($customerData , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $response = $openpay->customers->getList($customerData);
            $onSuccess($response , $this);    
        } catch (\OpenpayApiRequestError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiConnectionError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiAuthError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\InvalidArgumentException $exc) {
            $onError($exc);
        } catch (Exception $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        }
    }


    public function deleteCustomer($id , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $response = $openpay->customers->get($id);
            $response->delete();
        } catch (\OpenpayApiRequestError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiConnectionError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiAuthError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\OpenpayApiError $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        } catch (\InvalidArgumentException $exc) {
            $onError($exc);
        } catch (Exception $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        }
    }

}