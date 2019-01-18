<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;

class LessonsController extends ApiController
{
    protected  $lessonTransformer;

    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer=$lessonTransformer;
        $this->middleware('auth.basic',['only'=>['store','update']]);
    }

    public function index()
    {
         $lessons =Lesson::all();
//        return \Response::json([
//            'status'=>'success',
//            'status_code'=>200,
//            //'data'=>$lessons->toArray()
//            //'data'=>$this->transformCollection($lessons)
//            'data'=>$this->lessonTransformer->transformCollection($lessons->toArray())
//        ]);
        return $this->response([
            'status'=>'success',
            'data'=>$this->lessonTransformer->transformCollection($lessons->toArray())

        ]);


    }

    public function show($id)
    {
        $lesson =Lesson::find($id);
        //return $lesson;
        if(!$lesson){
            return $this->responseNotFound();
//            return \Response::json([
//                'status'=>'failed',
//                'status_code'=>404,
//                'message'=>'Lesson not found'
//
//            ]);
        }

        return $this->response([
            'status'=>'success',

            //'data'=>$lessons->toArray()
            //'data'=>$this->transform($lesson)
            'data'=>$this->lessonTransformer->transform($lesson)

        ]);

    }
    //第一版
//    private  function  transform($lessons)
//    {
//        return array_map(function ($lesson){
//            return [
//                'title'=>$lesson['title'],
//                'content'=>$lesson['body'],
//                'is_free'=>(boolean)$lesson['free'],
//            ];
//        },$lessons->toArray );
//
//    }
//第二版
//    private  function  transformCollection($lessons)
//    {
//        return array_map([$this,'transform'],$lessons->toArray );
//
//    }
//    private  function  transform($lesson)
//    {
//        return [
//                'title'=>$lesson['title'],
//                'content'=>$lesson['body'],
//                'is_free'=>(boolean)$lesson['free'],
//            ];
//
//    }

    public function store(Request $request)
    {

      if(!$request->get('title') or !$request->get('body')){
        return $this->setStatusCode(422)->responseError('validate fails');
      }
       Lesson::create($request->all());
      return  $this->setStatusCode(201)->response([
            'status'=>'success',
            'message'=>'lesson created'
        ]);
    }
    public function update(Request $request)
    {
        dd(1111);
    }
}
