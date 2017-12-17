<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/14
 * Time: 22:18
 */
class ValidateForm
{
    protected static $err_msg = '';

    public static function checkEmpty($params, $fields)
    {
        $tmp = true;
        foreach ($fields as $k => $v) {
            if (!array_key_exists($k, $params)) {
                static::$err_msg[] = $k;
                $tmp = false;
            }
        }
        return $tmp;
    }

    public static function getErrMsg()
    {
        return '需要:' . implode(',', self::$err_msg) . '字段';
    }
}