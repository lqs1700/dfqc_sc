<?php
/**
 * Created by PhpStorm.
 * User: wx
 * Date: 2018/6/2
 * Time: 11:32
 */

namespace app\exception;


class Image extends BaseException
{
    public $code = 555;
    public $msg = '找不到图片';
    public $errorCode = 55555;
}
