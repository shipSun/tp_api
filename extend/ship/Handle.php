<?php
/*
 * 自定义异常处理类
 * 
 * @author shipSun
 */
namespace ship;

use think\exception\Handle as TpHandle;
use ship\Response;
use think\Config;
use think\Log;

class Handle extends TpHandle{
    public function report(\Exception $exception)
    {
        if (!$this->isIgnoreReport($exception)) {
            
            $className = get_class($exception);
            $log[] = '['.$className.']';
            $log[] = 'code:'.$exception->getCode();
            $log[] = 'message:'.$this->getMessage($exception);
            $log[] = 'file:'.$exception->getFile().'('.$exception->getLine().')';
            //[error] [xxxx] code:1111 message:11111 file:asdfasdfa/asdfa/asdf(10)
            $log = implode(' ',$log);
            if (Config::get('record_trace')) {
                $log .= "\r\n" . $exception->getTraceAsString();
            }
    
            Log::record($log, 'error');
        }
    }
    protected function getMessage(\Exception $e){
        $data = [];
        while ($e){
            $data[]= $e->getMessage();
            $e = $e->getPrevious();
        }
        return implode(',', $data);
    }
    public function render(\Exception $e){
        return Resonpse::getInstance()->error($e);
    }
}