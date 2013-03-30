<html>
<head>
<title>easyManager v0.1.0</title>
</head>
<body>
<form action="<? $_SERVER['PHP_SELF'];?>" method="POST">
	check  it : <input type="text" name="t_check" /><input type="submit" name="check" value="check it"/><br />
	create it : <input type="text" name="t_create" /><input type="submit" name="create" value="create it" /><br />
	rename it : old name : <input type="text" name="t_rename_old" /><br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				new name : <input type="text" name="t_rename_new" /><input type="submit" name="rename" value="rename it" /><br />
	delete it : <input type="text" name="t_delete" /><input type="submit" name="delete" value="delete it" /><br />
</form>
<?
	if($_POST['check']){
		require_once 'check.php';
		f_check($_POST['t_check']);
	}
	if($_POST['create']){
		require_once 'create.php';
		f_create($_POST['t_create']);
	}
	if($_POST['rename']){
		require_once 'rename.php';
		f_rename($_POST['t_rename_old'],$_POST['t_rename_new']);
	}
	if($_POST['delete']){
		require_once 'delete.php';
		f_delete($_POST['t_delete']);
	}
?>
</body>
</html>