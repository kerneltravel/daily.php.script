<html>
<head>
<title>online 运营平台</title>
<link rel="stylesheet" type="text/css" href="scripts/css/index.css" />
<script src="scripts/js/jquery.js" type="text/javascript" lang="javascript"></script>
<script type="text/javascript" language="javascript">
    setInterval(
        function(){
            $("#header").load(location.href+" #header");
        },1000);
</script>
</head>

<body>
    <?
        require_once("include/class/function.class.php");
        require_once("include/conn.php");
        session_start();

        $usertype=$_SESSION['usertype'];
        $type=pageusertype($name);

        // 限制权限
        if(!isset($_SESSION['userid'])){
            header("Location:index.html");
            exit;
        }
        else{
            if($usertype<$type){
                header("Location:index2.php");
                exit;
            }
        }
    ?>
    <!-- TODO -->
    <div id="header">
        <?
            echo date("Y/m/d H:i:s");
        ?>
    </div>
    <!--// TODO -->
    <div id="navbar">
        <?sidebar();?>
    </div>

    <div id="main">
        <li><s>修改页面--201211161329--F</s></li>
        <li><s>添加登录登出模块--201211161601--F</s></li>
        <li><s>添加注册模块--201211171803--F</s></li>
        <li>添加注册,跳转有问题--201211171905--<font color="red">U</font></li>
        <li><s>添加用户权限,菜单显示--201211181530--F</s></li>
        <li><s>文件没有限制访问--201211182052--201211201140--F</s></li>
        <li><s>添加个人信息菜单--201211191335--F</s></li>
        <li><s>重写 sidebar 函数--201211191409--F</s></li>
        <li><s>重写联动菜单,jquery+php+mysql--201211261818--F</s></li>
        <li><s>添加通讯录下载--201211272223--F</s></li>
        <li>下载excel打开会报内容出错--201211302016--<font color="red">U</font></li>
        <li><s>添加搜索模块--201211302201--F</s></li>
        <li>搜索模块输入 % 即全局下载--201211302201--<font color="red">U</font></li>
        <li>重名没有解决, login 表和 user 表不能同步--201211302254--<font color="red">U</font></li>
    </div>
</body>
</html>
