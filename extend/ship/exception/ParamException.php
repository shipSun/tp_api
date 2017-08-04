<?php
/*
 * 参数不合法检测
 * 
 * @autho ship
 */
namespace ship\exception;

class ParamExceptin extends \RuntimeException{
    const CODE=5000;
    
    public function __construct($message, $previous=null){
        parent::__construct($message, self::CODE, $previous);
    }
}