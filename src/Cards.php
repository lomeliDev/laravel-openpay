<?php

namespace TooPago\OpenPay;

use InvalidArgumentException;
use TooPago\OpenPay\LaravelOpenPay;
use Exception;

class Cards
{





    public function postCurl($Url, $sk , $Post){
        $Headers = array("Content-Type: application/json", "Accept-Language: es-ES,es;q=0.8" , "User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36" , "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8");
        $Conexion = curl_init();
        curl_setopt($Conexion, CURLOPT_URL , $Url);
        curl_setopt($Conexion, CURLOPT_USERPWD, $sk . ":"); 
		curl_setopt($Conexion, CURLOPT_POST, true);
		curl_setopt($Conexion, CURLOPT_POSTFIELDS, $Post);
		curl_setopt($Conexion, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($Conexion, CURLOPT_HEADER, 1);
		curl_setopt($Conexion, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($Conexion, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($Conexion, CURLOPT_HTTPHEADER, $Headers); 
        curl_setopt($Conexion, CURLOPT_TIMEOUT_MS, 5000);
        $Txt = curl_exec($Conexion);
        curl_close($Conexion);
        return $Txt;
    }


    public function tokenizarCard($dataCard , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $response = $openpay->tokens->add($dataCard);
            dd($response);
            if($response && $response->id)
            {
                $OpenPay = new \stdClass;
                $OpenPay->id = $response->id;
                $onSuccess($OpenPay , $this);    
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

    
    public function addTokenCard($dataCard , $onSuccess, $onError)
    {
        try {
            $cardDataRequest = array(
                'token_id' => $dataCard["token_id"],
                'device_session_id' => $dataCard["device_session_id"],
            );
            $openpay = LaravelOpenPay::setEnvironment();
            $customer = $openpay->customers->get($dataCard["customer"]);
            $response = $customer->cards->add($cardDataRequest);
            if($response && $response->id)
            {
                $OpenPay = new \stdClass;
                $OpenPay->id = $response->id;
                $onSuccess($OpenPay , $this);    
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


    public function allCards($id, $customerData , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $customer = $openpay->customers->get($id);
            $response = $customer->cards->getList($customerData);
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


    public function deleteCard($card, $id , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $customer = $openpay->customers->get($id);
            $response = $customer->cards->get($card);
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



    public function createChargeToken($customer, $dataCard , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $customer = $openpay->customers->get($customer);
            $response = $customer->charges->create($dataCard);
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


    public function createChargeTokenSinCuenta($customer, $dataCard , $onSuccess, $onError)
    {
        try {
            $openpay = LaravelOpenPay::setEnvironment();
            $response = $openpay->charges->create($dataCard);            
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