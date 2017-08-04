<?php
/*
 * 用户权限检测
 * 
 * @autho ship
 */
namespace ship\exception;

class AuthExceptin extends \RuntimeException{
    const CODE=5000;
    
    public function __construct($message, $previous=null){
        parent::__construct($message, self::CODE, $previous);
    }
}