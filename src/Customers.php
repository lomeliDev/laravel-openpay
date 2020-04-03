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
            //dd($customerData);
            $response = $openpay->customers->add($customerData);
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



    public function updateAddressCustomer($id , $d, $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $r = $openpay->customers->get($id);
            if($r && $r->id)
            {
                //$r->phone_number = $d["phone"];
                //$r->address("line1") = 1;
                //$r->address["line1"] = $d["address"];
                //$r->address->city = $d["city"];
                //$r->address->line2 = $d["colony"];
                //$r->address->line3 = $d["country"];
                //$r->address->country_code = 'MX';
                //$r->address->state = $d["state"];
                //$r->address->postal_code = $d["zip"];
                //$r->save();
                $OpenPay = new \stdClass;
                $OpenPay->id = $r->id;
                $onSuccess($r , $this);    
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

            /*$OpenPay = new \stdClass;
            $OpenPay->message = 'Operation not allowed';
            $onError($OpenPay);*/


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

}