<?php
use think\Db;

class Works
{
    /**
     * 添加/修改作品集
     * @param $params
     * @return array
     */
    public static function setCollect($params)
    {
        $uid = 1;
        $data = [
            "uid" => $uid,
            "name" => $params['name'],
            "type" => $params['type'],
            "desc" => $params['desc'],
            "create_time" => time(),
        ];

        try {
            $id = empty($params['id']) ? 0 : $params['id'];
            if (!$id) {
                Db::name('works_collect')->insert();
            } else {
                Db::name('works_collect')->where('id', $id)->update($data);
            }
            return msg();
        } catch (\Exception $e) {
            return msg(1, $e->getMessage());
        }
    }

    /**
     * 添加/修改文章
     * @param $params
     */
    public static function setArticle($params)
    {
        $uid = 1;//@TODO
        $article_id = empty($params['article_id']) ? 0 : $params['article_id'];
        Db::startTrans();
        try {
            $data_article = [
                'uid' => $uid,
                'name' => $params['name'],
                'desc' => $params['desc'],//作品详情
                'content' => $params['content'],
                'wid' => $params['wid'],
            ];

            $data_work = [
                'uid' => $uid,
                'name' => $params['name'],//作品名称
                'type' => $params['type'],//作品类型
                'desc' => $params['desc'],//作品详情
                'collect_id' => $params['collect_id'],//作品集id
                'create_time' => time(),
            ];

            if ($article_id) {
                $data_article['update_time'] = time();
                Db::name('article')->where('id', $article_id)->update($data_article);

                Db::name('works')->where('article_id', $article_id)->update();
            } else {
                $data_article['create_time'] = time();
                $article_id = Db::name('article')->insertGetId($data_article);

                $data_work['article_id'] = $article_id;
                Db::name('works')->insert($data_work);

                WorksModel::changeWorkCollectNum($params['collect_id']);
            }
            Db::commit();
            return msg(0);
        } catch (Exception $e) {
            Db::rollback();
            return msg(1, $e->getMessage());
        }
    }
}