<?php
/*
 * 用户令牌检测
 * 
 * @autho ship
 */
namespace ship\exception;

class TokenExceptin extends \RuntimeException{
    const CODE=3000;
    
    public function __construct($message, $previous=null){
        parent::__construct($message, self::CODE, $previous);
    }
}