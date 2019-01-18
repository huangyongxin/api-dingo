<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 2019/1/16
 * Time: 11:42
 */

namespace App\Transformer;


abstract class Transformer
{
    public  function  transformCollection($items)
    {
        return array_map([$this,'transform'],$items );

    }
    public  abstract  function  transform($items);

}