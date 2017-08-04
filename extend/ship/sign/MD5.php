<?php
/*
 * MD5签名算法
 * @author ship
 */

namespace ship\sign;

class MD5 extends EncryptAbstract{
    public function encryptHandle($string){
        return md5($string);
    }
    public function decryptHandle($sign){
        return $sign;
    }
}