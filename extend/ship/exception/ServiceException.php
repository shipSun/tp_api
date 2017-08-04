<?php
/*
 * 服务系统检测
 * 
 * @author ship
 */
namespace ship\exception;

class ServiceException extends \RuntimeException{
    const CODE=2000;
    
    public function __construct($message, $previous=null){
        parent::__construct($message, self::CODE, $previous);
    }
}
