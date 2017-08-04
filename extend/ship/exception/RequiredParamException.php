<?php
/*
 * 必填参数检测
 * 
 * @autho ship
 */
namespace ship\exception;

class RequiredParamExceptin extends \RuntimeException{
    const CODE=4000;
    
    public function __construct($message, $previous=null){
        parent::__construct($message, self::CODE, $previous);
    }
}