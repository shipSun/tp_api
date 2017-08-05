<?php
/*
 * RSA加密
 * 
 * @author ship
 */
namespace ship\encrypt;

use ship\exception\ServiceException;
class RSA extends EncryptAbstract{
    protected function encryptHandle($string){
        $privateKey = $this->getPrivateKey();
        $encryptStatus = openssl_private_encrypt($string, $crypted, $privateKey);
        if(!$encryptStatus){
            throw new ServiceException('rsa_encrypt_fail');
        }
        return base64_encode($crypted);
    }
    protected function decryptHandle($sign){
        $publicKey = $this->getPublicKey();
        $sign = base64_decode($sign);
        $decryptStatus = openssl_public_decrypt($sign, $decrypted, $publicKey);
        if(!$decryptStatus){
            throw new ServiceException('rsa_decrypt_fail');
        }
        return $decrypted;
    }
    protected function getPublicKey(){
        $publicKeyPath=config('rsa.publicKey');
        return openssl_pkey_get_public(file_get_contents($publicKeyPath));
    }
    protected function getPrivateKey(){
        $privateKeyPath=config('rsa.privateKey');
        return openssl_pkey_get_private(file_get_contents($privateKeyPath));
    }
}