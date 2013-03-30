<html>
<head>
<title>2014题库系统</title>
<link rel="stylesheet" type="text/css" href="scripts/css/index.css" />
<script src="scripts/js/jquery.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
    setInterval(
        function(){
            $("#header").load(location.href+" #header");
    },1000);
</script>
</head>

<body>
    <?
        require_once('admin/include/conn.php');
        require_once('admin/include/class/function.class.php');
    ?>
    <div id="header">
        <?
            showTime();
        ?>
    </div>
    <div id="navbar">
        <?
            showSideBar();
        ?>
    </div>
    <div id="main">
        <form action="search.php" name="searchForm" method="post">
            搜索<input type="text" name="search" />
            <input type="submit" name="submit" value="go"/>
        </form>
        <table width="90%" border="1" align="center" cellspacing="0" cellpadding="1">
            <tr>
                <td width="7%"></td>
                <td width="5%">题号</td>
                <td width="7%">类型</td>
                <td width="60%">标题</td>
                <td>标签1</td>
                <td>AC/ALL</td>
            </tr>
            <?
                //$sql="SELECT * FROM subject WHERE active='1' ORDER BY id ASC LIMIT 0,10";
                $sql="SELECT * FROM `subject` ORDER BY id ASC LIMIT 0,10";
                $query=mysql_query($sql);
                $array=array();

                while($assoc=mysql_fetch_assoc($query)){
                    array_push($array,$assoc);
                }
                foreach($array as $key){
            ?>
            <tr>
                <td><a href="do.php?id=<?echo $key['id'];?>" target="_target">[做题]</a></td>
                <td><?echo $key['id'];?></td>
                <td><?echo $key['type'];?></td>
                <td><?echo $key['title'];?></td>
                <td><?echo $key['tag1'];?></td>
                <td>
                    <?
                        if($key['t_done']==0){
                            echo '00%';
                        }
                        else{
                            $ratio=($key['t_success']/$key['t_done'])*100;
                            echo round($ratio,0).'%';
                        }
                        echo '('.$key['t_success'].'/'.$key['t_done'].')';
                    ?>
                </td>
            </tr>
            <?
                }
            ?>
        </table>
    </div>
</body>
</html>
