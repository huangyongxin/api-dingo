<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 2019/1/17
 * Time: 14:24
 */

namespace App\Api\Controllers;


use App\Api\Transformers\LessonTransformer;
use App\Http\Controllers\Controller;
use App\Lesson;


class LessonsController extends  BaseController
{
    public function index()
    {

        $lessons= Lesson::all();

        return $this->collection($lessons,new  LessonTransformer());
    }
    public function show($id)
    {

        $lesson= Lesson::find($id);

        if(!$lesson){
            return $this->response->errorNotFound('less not found ');
        }
        return $this->item($lesson,new  LessonTransformer());
    }
}