<html>
<head>
<title>online ��Ӫƽ̨</title>
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

        // ����Ȩ��
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
        <li><s>�޸�ҳ��--201211161329--F</s></li>
        <li><s>��ӵ�¼�ǳ�ģ��--201211161601--F</s></li>
        <li><s>���ע��ģ��--201211171803--F</s></li>
        <li>���ע��,��ת������--201211171905--<font color="red">U</font></li>
        <li><s>����û�Ȩ��,�˵���ʾ--201211181530--F</s></li>
        <li><s>�ļ�û�����Ʒ���--201211182052--201211201140--F</s></li>
        <li><s>��Ӹ�����Ϣ�˵�--201211191335--F</s></li>
        <li><s>��д sidebar ����--201211191409--F</s></li>
        <li><s>��д�����˵�,jquery+php+mysql--201211261818--F</s></li>
        <li><s>���ͨѶ¼����--201211272223--F</s></li>
        <li>����excel�򿪻ᱨ���ݳ���--201211302016--<font color="red">U</font></li>
        <li><s>�������ģ��--201211302201--F</s></li>
        <li>����ģ������ % ��ȫ������--201211302201--<font color="red">U</font></li>
        <li>����û�н��, login ��� user ����ͬ��--201211302254--<font color="red">U</font></li>
    </div>
</body>
</html>
