<?php
/*
 * 响应
 * 
 * @auth ship
 * 
 */

namespace ship;

use think\Log;
class Resonpse{
    protected $signType;
    
    protected static $instance=false;
    
    public static function getInstance(){
        if(!static::$instance){
            static::$instance = new static();
        }
        return static::$instance;
    }
    public function setSignType($signType){
        $this->signType = $signType;
    }
    public function success(array $data){
        $data['code'] = 1000;
        return json($this->sign($data));
    }
    public function error(\Exception $e){
        $data['code'] = $e->getCode();
        $data['sub_code'] = $this->getMessage($e);
        return json($this->sign($data));
    }
    
    protected function getMessage(\Exception $e){
        $data = [];
        while ($e){
            $data[]= $e->getMessage();
            $e = $e->getPrevious();
        }
        return implode(',', $data);
    }
    protected function sign(array $data){
        $data['sign'] = 'sign';
        
        return $data;
    }
}