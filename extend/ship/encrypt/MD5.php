<?php
/*
 * MD5签名算法
 * @author ship
 */

namespace ship\encrypt;

class MD5 extends EncryptAbstract{
    protected function encryptHandle($string){
        return md5($string);
    }
    protected function decryptHandle($sign){
        return false;
    }
}