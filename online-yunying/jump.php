<?
	require_once("include/conn.php");
	session_start();
	// logout
	if($_GET['action']=="logout"){
		unset($_SESSION['userid']);
		unset($_SESSION['username']);
?>
		<script language="javascript">
			window.location.href='index.html';
			alert("×¢Ïú³É¹¦");
		</script>
<?
	}// end if

	if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$password=md5($_POST['password']);

		// ÃÜÂë´íÎó
		$sql1="SELECT id,usertype FROM login WHERE active='1' and username='$username' and password='$password'";
		$query1=mysql_query($sql1);

		$sql2="SELECT department FROM user WHERE active='1' and name='$username'";
		$query2=mysql_query($sql2);
		$array1=mysql_fetch_array($query1);
		$array2=mysql_fetch_array($query2);
		if($array1){
		//if($array1=mysql_fetch_array($query1)&&$array2=mysql_fetch_array($query2)){
			//$array2=mysql_fetch_array($query2);
			$_SESSION['username']=$username;
			$_SESSION['userid']=$array1['id'];
			$_SESSION['usertype']=$array1['usertype'];
			$_SESSION['department']=$array2['department'];
			header("Location:index2.php");
			exit;
		}
		else{
?>
			<script language="javascript">
				window.location.href='index.html';
				alert("µÇÂ¼Ê§°Ü");
			</script>
<?
			exit;
		}// end if
	}
	else if(isset($_POST['regist'])){
		header("Location:regist.php");
		exit;
	}// end if

	header("Location:index.php");
	header("Location:index.html");
?>
