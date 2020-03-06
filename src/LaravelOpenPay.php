<?php


namespace TooPago\OpenPay;

use Exception;

class LaravelOpenPay
{

    protected static $OPENPAY_ID;
    protected static $OPENPAY_SK;
    protected static $OPENPAY_PK;
    protected static $OPENPAY_PRODUCTION_MODE;
    protected static $OPENPAY_ENVIROMENT;
    

    public static function getOPENPAY_ID()
    {
        if (static::$OPENPAY_ID) {
            return static::$OPENPAY_ID;
        }
        if ($OPENPAY_ID = getenv('OPENPAY_ID')) {
            return $OPENPAY_ID;
        }
        return getenv('OPENPAY_ID');
    }


    public static function getOPENPAY_SK()
    {
        if (static::$OPENPAY_SK) {
            return static::$OPENPAY_SK;
        }
        if ($OPENPAY_SK = getenv('OPENPAY_SK')) {
            return $OPENPAY_SK;
        }
        return getenv('OPENPAY_SK');
    }

    
    public static function getOPENPAY_PK()
    {
        if (static::$OPENPAY_PK) {
            return static::$OPENPAY_PK;
        }
        if ($OPENPAY_PK = getenv('OPENPAY_PK')) {
            return $OPENPAY_PK;
        }
        return getenv('OPENPAY_PK');
    }
    

    public static function getOPENPAY_PRODUCTION_MODE()
    {
        if (static::$OPENPAY_PRODUCTION_MODE) {
            return static::$OPENPAY_PRODUCTION_MODE;
        }
        if ($OPENPAY_PRODUCTION_MODE = getenv('OPENPAY_PRODUCTION_MODE')) {
            return $OPENPAY_PRODUCTION_MODE;
        }
        return getenv('OPENPAY_PRODUCTION_MODE');
    }


    public static function getOPENPAY_ENVIROMENT()
    {
        if (static::$OPENPAY_ENVIROMENT) {
            return static::$OPENPAY_ENVIROMENT;
        }
        if ($OPENPAY_ENVIROMENT = getenv('OPENPAY_ENVIROMENT')) {
            return $OPENPAY_ENVIROMENT;
        }
        return getenv('OPENPAY_ENVIROMENT');
    }


    public static function setEnvironment()
    {
        \Openpay::setId(static::getOPENPAY_ID());
        \Openpay::setApiKey(static::getOPENPAY_SK());
        \Openpay::setProductionMode(static::getOPENPAY_PRODUCTION_MODE());
        return \Openpay::getInstance(static::getOPENPAY_ID(), static::getOPENPAY_SK());
    }   



}
