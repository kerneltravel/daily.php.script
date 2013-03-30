<html>
<head>
<title>2014Ã‚ø‚œµÕ≥</title>
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
        <form action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
            search:<input type="text" name="search" />
            <?
                // TODO
                // 201212021559
            ?>
        </form>
    </div>
</body>
</html>
