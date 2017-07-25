<?php
/*
 * 自定义异常处理类
 * 
 * @author shipSun
 */
namespace ship;

use think\exception\Handle as TpHandle;
use think\exception\HttpException;

class Handle extends TpHandle{
    public function render(\Exception $e){
        var_dump($e);
        exit;
    }
}