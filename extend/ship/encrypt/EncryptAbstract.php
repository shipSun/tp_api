<?php
/*
 * 加密抽象类 
 */
namespace ship\encrypt;

abstract class EncryptAbstract{
    public final function encrypt($data){
        $sign = $this->toString($data);
        return $this->encryptHandle($sign);
    }
    protected abstract function encryptHandle($string);
    public final function decrypt($sign){
        return $this->decryptHandle($sign);
    }
    protected abstract function decryptHandle($sign);
    protected function toString($data){
        $data = $this->sort($data);
        return http_build_query($data);
    }
    protected function sort($data){
        $data = $this->filterData($data);
        ksort($data);
        return $data;
    }
    protected function filterData($data){
        if(isset($data['sign'])){
            unset($data['sign']);
        }
        foreach($data as $key=>$val){
            $val = trim($val," ");
            $data[$key] = $val;
            if(empty($val) && $val!==0){
                unset($data[$key]);
            }
        }
        return $data;
    }
}