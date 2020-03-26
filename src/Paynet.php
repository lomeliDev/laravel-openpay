<?php

namespace TooPago\OpenPay;

use InvalidArgumentException;
use TooPago\OpenPay\LaravelOpenPay;
use Exception;

class Paynet
{


    public function createCharge($customer, $dataCharge , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $customer = $openpay->customers->get($customer);
            $response = $customer->charges->create($dataCharge);
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

    public function createChargeSinCuenta($dataCharge , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $response = $openpay->charges->create($dataCharge);
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


}