<?php
use think\Db;
use think\Request;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/14
 * Time: 22:13
 */
class Frontend
{
    /**
     * 添加/修改作品集
     */
    public function setCollect(Request $request)
    {
        $params = $request->param();// ['name'=>'name','type'=>1]
        $need_fields = ['name' => '作品集名称', 'type' => '作品集类型', 'desc' => '作品集介绍'];
        if (!ValidateForm::checkEmpty($params, $need_fields)) {
            //验证失败
            return json(msg(1, ValidateForm::getErrMsg()));
        }

        $res = Works::setCollect($params);

        return json($res);
    }

    /**
     * 添加/修改文章
     */
    public function setArticle(Request $request)
    {
        $params = $request->param();// ['name'=>'name','type'=>1]

        $res = Works::setArticle($params);

        return json($res);
    }
}