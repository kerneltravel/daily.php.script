<?php
/**
 * @file example.php
 * @brief Simple_douban_oauth2调用实例,内容为使用POST请求发表豆瓣广播.
 * @author JonChou <ilorn.mc@gmail.com>
 * @date 2012-12-13
 */

// 载入豆瓣Oauth类
require '../src/DoubanOauth.php';

/* ------------实例化Oauth2--------------- */
$appConfig = array(
            // 必选参数,豆瓣应用public key
            //'client_id' => '05af728776906399110e579663b12acb',
            'client_id' => '07afb20002bdb327170f160008391975',
            // 必选参数,豆瓣应用secret key
            //'secret' => 'e1800fd8935fddcf',
            'secret' => '6d4e085c64478c35',
            // 必选参数,用户授权后的回调链接
            'redirect_uri' => 'http://127.0.0.1/login.php',
            // 可选参数(默认为douban_basic_common),授权范围
            'scope' => 'douban_basic_common',
            // 可选参数(默认为false),是否在header中发送accessToken
            'need_permission' => false
            );
// 生成一个豆瓣Oauth类实例
$douban = new DoubanOauth($appConfig);


/* ------------请求用户授权--------------- */

// 如果没有authorizeCode,跳转到用户授权页面
if ( ! isset($_GET['code'])) {
    $douban->requestAuthorizeCode();
    exit;
}
// 设置authorizeCode
$douban->setAuthorizeCode($_GET['code']);
// 通过authorizeCode获取accessToken,至此完成用户授权
$douban->requestAccessToken();


/* ------------发送图片广播--------------- */

// 通过豆瓣API发送一条带图片的豆瓣广播
// 我看到豆瓣API小组里很多朋友都卡在了发送图片广播上,那是因为没有设置正确的Content-Type
// 在PHP中通过curl拓展上传图片必须使用类似"@/home/chou/images/123.png;type=image/png"的模式
// 并且必须在图片绝对路径后指定正确的图片类型,如果没有指定类型会返回"不支持的图片类型错误"
// 那是因为没有指定图片类型时,上传的文件类型默认为"application/octet-stream"
$data = array(
            'source' => $appConfig['client_id'], 
            'text' =>'又在测试豆瓣API啦。', 
            'image' => '@/home/chou/Downloads/canon.jpg;type=image/jpeg'
            );

$miniblog = $douban->api('Miniblog.statuses.POST')->makeRequest($data);

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php var_dump($miniblog); ?>
    </body>
</html>
