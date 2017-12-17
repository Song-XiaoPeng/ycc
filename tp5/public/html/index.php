<?php
use common\components\JConfig;
?>
<?php $this->beginBlock('title');?>
    校园原创
<?php $this->endBlock();?>

<?php $this->beginBlock('cssFile', 'append');?>
    <link rel="stylesheet" href="<?php echo JConfig::item('config.imgCdnDomain');?>/wap/activity/original/css/style.css">
<?php $this->endBlock();?>

<?php $this->beginBlock('cssText', 'append');?>
    <style>
        body{
            background-color: #f7f7f7;
            height:100%;
            padding-bottom:152px;
            overflow-y:auto;
            box-sizing: border-box;
        }
        .shoot_area  .enter{
            background:#fff url(<?php echo JConfig::item('config.imgCdnDomain');?>/wap/activity/original/img/0-7.png) center no-repeat;
            background-size: 14px auto;
        }
        .smimg{
            background: #fff url(<?php echo JConfig::item('config.imgCdnDomain');?>/wap/activity/original/img/people.png) center no-repeat;
            background-size: 14px auto;
        }
        .img2{
            background:#fff url(<?php echo JConfig::item('config.imgCdnDomain');?>/wap/activity/original/img/mumark.png) center no-repeat;
            background-size:14px auto;
        }
        .music_area  .enter{
            background:#fff url(<?php echo JConfig::item('config.imgCdnDomain');?>/wap/activity/original/img/0-8.png) center no-repeat;
            background-size: 14px auto;
        }
    </style>
<?php $this->endBlock();?>

<div class="main">
    <div class="banner-top">
        <img src="<?php echo JConfig::item('config.imgCdnDomain');?>/wap/activity/original/images/8.jpg">
    </div>
    <div class="wrap">
        <div class="list-box shoot_area">
            <a href="<?php echo Yii::$app->urlManager->createUrl(['/activity/wap/original/list'])?>" class="enter_btn" style="display: block;">
                <div class="list-picbox">
                    <img src="<?php echo JConfig::item('config.imgCdnDomain');?>/wap/activity/original/img/9.png">
                </div>
                <div class="txt">
                    <h5>原创摄影集</h5>
                    <p>为摄影爱好者提供一个展示自己、交流学习的平台</p>
                </div>
            </a>
            <a href="<?php echo Yii::$app->urlManager->createUrl(['/activity/wap/original/list'])?>" class="enter">
                <span class="enter"></span>
            </a>
        </div>
        <div class="list-box music_area">
            <a href="<?php echo Yii::$app->urlManager->createUrl(['/activity/wap/original/list', 'type'=>1])?>" class="enter_btn" style="display: block;">
                <div class="list-picbox">
                    <img src="<?php echo JConfig::item('config.imgCdnDomain');?>/wap/activity/original/img/6.png">
                </div>
                <div class="txt">
                    <h5>原创之声</h5>
                    <p>为音乐爱好者提供一个展示自己、交流学习的平台</p>
                </div>
            </a>
            <a href="<?php echo Yii::$app->urlManager->createUrl(['/activity/wap/original/list', 'type'=>1])?>" class="enter">
                <span class="enter"></span>
            </a>
        </div>
    </div>
</div>
<div class="owner_mess">
    <div class="huxing"></div>
    <a>
        <div class="owner_mes flex">
            <div class="owner_img">
                <a href="<?php echo Yii::$app->urlManager->createUrl(['/activity/wap/original/user'])?>"><img src="<?php echo Yii::$app->user->info['avatar'];?>" style="border-radius:50%;"/></a>
            </div>
            <p style="margin-top:14px; font-size: 14px;"><?php echo Yii::$app->user->info['realname'];?></p>
        </div>
    </a>
    <a>
        <div class="music_mes flex">
            <span class="smimg"></span>
            <p>关注:<span class="num"><?php echo !empty($follow_num) ? $follow_num : 0;?></span><span class="conut">人</span></p>
            <p>点赞:<span class="num"><?php echo !empty($likes_num) ? $likes_num : 0;?></span><span class="conut">次</span></p>
        </div>
    </a>
    <a>
        <div class="music_mes flex">
            <span class="smimg img2"></span>
            <p>图集:<span class="num"><?php echo !empty($album_num[0]) ? $album_num[0] : 0;?></span><span class="conut">个</span></p>
            <p>音频专辑:<span class="num"><?php echo !empty($album_num[1]) ? $album_num[1] : 0;?></span><span class="conut">个</span></p>
        </div>
    </a>
</div>