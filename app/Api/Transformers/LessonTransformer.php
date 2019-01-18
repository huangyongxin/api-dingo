<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 2019/1/16
 * Time: 13:48
 */

namespace App\Api\Transformers;


use App\Lesson;
use League\Fractal\TransformerAbstract;

class LessonTransformer extends   TransformerAbstract
{
    public  function  transform(Lesson $lesson)
    {
        return [
                'title'=>$lesson['title'],
                'content'=>$lesson['body'],
                'is_free'=>(boolean)$lesson['free'],
            ];

    }
}