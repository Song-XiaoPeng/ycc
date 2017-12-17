<?php
define("TOKEN", "sone");//自己定义的token 就是个通信的私钥

$wechatObj = new wechatCallbackapiTest();
if ($_GET['echostr']) {
    $wechatObj->valid();
} else {
    $wechatObj->responseMsg();
}

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if ($this->checkSignature()) {
            echo $echoStr;
            exit;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)) {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            //将xml转换为数组
            //json_decode(json_encode($postObj),true);

            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            <FuncFlag>0<FuncFlag>
            </xml>";
            if (!empty($keyword)) {
                /*try {
                    switch ($keyword) {
                        case "红包":
                            $contentStr = "恭喜，您获得了" . rand(0, 1000) / 100 . '元红包，请联系公众号作者领取！';
                            break;
                        case "宋晓鹏":
                            $contentStr = '你好，请输入：红包';
                            break;
                        default:
                            $strWowArr = ["大地母亲在护佑着你", "你好", '为了艾泽拉斯！', '为了部落！', 'Lok Tar Ogar!', '胜利与荣耀！', '为了胜利！', '你在考验我的耐心吗？', '走开，不要打扰我的工作！', '熊猫人，闹翻天！', '你需要我的帮助吗？', 'Hi~', '快，保卫我们的酋长！', '怪物，我们不欢迎你！', '欢迎~', '勇士，奥格瑞玛的城门将永远为你打开！'];
                            $contentStr = $strWowArr[count($strWowArr) - 1];
                            break;
                    }
                } catch (Exception $e) {
                    $contentStr = "大地母亲在护佑着你";
                }*/
                $contentStr = "大地母亲在护佑着你";

                $msgType = "text";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            } else {
                echo '你好';
            }
        } else {
            echo '我还有事';
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }
}

?>