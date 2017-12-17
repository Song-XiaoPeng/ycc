<?php
use think\Db;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/15
 * Time: 21:57
 */
class WorksModel
{
    /**
     * 作品集作品数量++/--
     * @param $collect_id
     * @param int $type
     * @return int|true
     */
    public static function changeWorkCollectNum($collect_id, $type = 0)
    {
        if ($type == 0) {
            $res = Db::name('works_collect')->setInc('works_num');
        } else {
            $res = Db::name('works_collect')->setDec('works_num');
        }
        return $res;
    }
}