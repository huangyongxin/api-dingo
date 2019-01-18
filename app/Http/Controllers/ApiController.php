<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    protected  $statusCode = 200;

    public function getStatusCode()
    {
            return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
          $this->statusCode=$statusCode;
          return $this; //为了 可以链式操作
    }

    public function responseNotFound($message= 'not found')
    {

        return $this->setStatusCode(404)->responseError($message);
    }
    public function responseError($message= 'not found')
    {
        return $this->response([
            'status'=>'failed',
            'error'=>[
                'status_code'=>$this->getStatusCode(),
                'message'=>$message
            ]


        ]);

    }

    public function response($data)
    {
        return  \Response::json($data,$this->getStatusCode());
        
    }



}
