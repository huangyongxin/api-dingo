<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 2019/1/16
 * Time: 13:48
 */

namespace App\Transformer;


class LessonTransformer extends   Transformer
{
    public  function  transform($lesson)
    {
        return [
                'title'=>$lesson['title'],
                'content'=>$lesson['body'],
                'is_free'=>(boolean)$lesson['free'],
            ];

    }
}