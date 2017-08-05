<?php
/*
 * 签名与验签
 * @author ship
 */
namespace ship;

class Sign{
    protected static $instance=false;
    
    public $signType=false;
    public $signTypeName='';
    
    public static function data($data, $type='MD5'){
        static::getInstance($type);
        if(static::$instance->signTypeName!=$type){
            static::$instance->initSignType($type);
        }
        return static::$instance->signType->encrypt($data);
    }
    public static function verify($sign, $data, $type='MD5'){
        static::getInstance($type);
        if(static::$instance->signTypeName!=$type){
            static::$instance->initSignType($type);
        }
        
        $verifySign = static::$instance->signType->encrypt($data);
        if($verifySign==$sign){
            return true;
        }
        return false;
    }
    public static function getInstance($type){
        if(!static::$instance){
            static::$instance = new static();
            static::$instance->initSignType($type);
        }
        return static::$instance;
    }
    protected function initSignType($type){
        static::$instance->signTypeName = $type;
        $className = 'ship\encrypt\\'.$type;
        static::$instance->signType=(new $className);
    }
}