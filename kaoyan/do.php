<html>
<head>
<title>2014���ϵͳ</title>
<link rel="stylesheet" type="text/css" href="scripts/css/index.css" />
<script src="scripts/js/jquery.js" type="text/javascript" language="javascript"></script>
<script src="admin/ckeditor/ckeditor.js"></script>
<script type="text/javascript" language="javascript">
    setInterval(
        function(){
            $("#header").load(location.href+" #header");
    },1000);

    CKEDITOR.replace('answer');
    CKEDITOR.replace('analyze');
    CKEDITOR.replace('remark');
</script>
</head>

<body>
    <?
        require_once('admin/include/conn.php');
        require_once('admin/include/class/function.class.php');
    ?>
    <div id="header">
        <? showTime(); ?>
    </div>
    <div id="navbar">
        <? showSideBar(); ?>
    </div>
    <?
        $id=$_GET['id'];
        $sql_in="SELECT * FROM subject WHERE id='$id'";
        $query_in=mysql_query($sql_in);
        $assoc=mysql_fetch_assoc($query_in);
        $get=$assoc['id'];
    ?>
    <div id="main">
        <form name="add" action="do.php?id=<?echo $get;?>" method="post">
        <!--<form name="add" action="<?echo $_SERVER['PHP_SELF'];?>" method="post">-->
            <table width="100%" align="center" border="1" cellspacing="1" cellpadding="4">
                <tr>
                    <td><a href="getstart.php">[����]</a></td>
                    <td><input type="submit" name="view" value="�鿴��" /></td>
                </tr>
                <tr>
                    <td width="5%">����*</td>
                    <td>
                        <?echo $assoc['title'];?>
                    </td>
                </tr>
                <tr>
                    <td>����*</td>
                    <td>
                        <?echo $assoc['content'];?>
                    </td>
                </tr>
                <?
                    if($assoc['type']=='ѡ����'){
                ?>
                        <tr>
                            <td>��</td>
                            <td>
                                <input type="radio" name="answer" value="A">A
                                <input type="radio" name="answer" value="B">B
                                <input type="radio" name="answer" value="C">C
                                <input type="radio" name="answer" value="D">D
                            </td>
                        </tr>
                <?  
                    }
                    else if($assoc['type']=='�����'){
                ?>
                        <tr>
                            <td>��</td>
                            <td>
                                <textarea class="ckeditor" name="answer"></textarea>
                            </td>
                        </tr>
                <?
                    }
                ?>
                <tr>
                    <td><input type="hidden" name="id" value="<?echo $assoc['id'];?>"></td>
                    <td><input type="submit" name="submit" value="�ύ"></td>
                </tr>
            </table>
        </form>
    </div>
    <?
        if($_POST['view']){
            echo $assoc['answer'];
        }
        else{
            if($_POST['submit']){
                $id_out=$_POST['id'];
                $myAnswer=$_POST['answer'];
                $sql="SELECT * FROM `subject` WHERE `id`='$id_out' AND `answer`='$myAnswer'";
                $query=mysql_query($sql);
                $assoc2=mysql_fetch_assoc($query);

                //$t_done=++$assoc2['t_done'];
                //$sql_out1="UPDATE `subject` SET `t_done`='$t_done' WHERE `id`='$id_out'";
                //$query_out1=mysql_query($sql_out1);

                if(mysql_num_rows($query)){
                    $t_done=++$assoc2['t_done'];
                    $sql_out1="UPDATE `subject` SET `t_done`='$t_done' WHERE `id`='$id_out'";
                    $query_out1=mysql_query($sql_out1);

                    $t_success=++$assoc2['t_success'];
                    $sql_out2="UPDATE `subject` SET `t_success`='$t_success' WHERE `id`='$id_out'";
                    $query_out2=mysql_query($sql_out2);

                    echo "  <script language=\"javascript\">
                            alert('��ȷ');
                        </script>";
                    // TODO
                    // ��ת��ô��
                }
                else{
                    echo $t_done=++$assoc2['t_done'];
                    //$sql_out4="UPDATE `subject` SET `t_done`='$t_done' WHERE `id`='$id_out'";
                    //$query_out4=mysql_query($sql_out4);

                    echo $t_fail=++$assoc2['t_fail'];
                    //$sql_out3="UPDATE `subject` SET `t_fail`='$t_fail' WHERE `id`='$id_out'";
                    //$query_out3=mysql_query($sql_out3);

                    //echo "    <script language=\"javascript\">
                    //      alert('����');
                    //      window.history.back(-1);
                    //  </script>";
                }
            }
        }
    ?>
</body>
</html>
