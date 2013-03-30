<html>
<head>
    <title>FileMd5Gen</title>
    <meta http-equiv="Content-Language" content="zh-CN" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<form action="index.php" method="post" name="form1">
    input the file path<input type="text" name="form1_val" /><br />
    <input type="submit" name="submit"  /><br />
    MD5 SUM:
    <?
        set_time_limit(0);                          // 时间无限制
        $file=$_POST['form1_val'];
        if(file_exists($file)){                         // if file does not exist
            //$stime1=microtime(true);
            $sum1=md5_file($file);
            echo $sum1;
            //$etime1=microtime(true);
            //$total1=$etime1-$stime1;
            //echo '<br />'.(($total1)*1000).'ms';
        }
        else{
            echo "file $file not exists";
        }
        
        //echo "<br />{$total} second";
    ?>
    <br />
    SHA-1 SUM:
    <?
        set_time_limit(0);
        $file=$_POST['form1_val'];
        if(file_exists($file)){
            $sum2=sha1_file($file);
            echo $sum2;
        }
        else{
        }
    ?>
</form>
</body>
</html>
