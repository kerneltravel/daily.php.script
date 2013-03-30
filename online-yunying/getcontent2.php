<?
	require_once('include/conn.2.php');

	$type=trim($_GET['type']);
	$out="<option value='0'>select</option>";
	switch($type){
		// w1
		case '0':
			$sql="SELECT `id`,`name` FROM w_unit WHERE active=1";
			$query=mysql_query($sql);
			if(mysql_num_rows($query)){
				while($assoc=mysql_fetch_assoc($query)){
					$out.="<option value='".$assoc['id']."'>".$assoc['name']."</option>";
				}
			}
			break;
		// w2
		case '1':
			$pid=trim($_GET['p1']);
			//$pid=$_GET['p'];
			$sql="SELECT `id`,`name` FROM w_team WHERE pid=$pid and active=1";
			$query=mysql_query($sql);
			if(mysql_num_rows($query)){
				while($assoc=mysql_fetch_assoc($query)){
					$out.="<option value='".$assoc['id']."'>".$assoc['name']."</option>";
				}
			}
			break;
		// w3
		case '2':
			$pid=trim($_GET['p2']);
			$sql="SELECT `id`,`name` FROM w_department WHERE pid=$pid and active=1";
			$query=mysql_query($sql);
			if(mysql_num_rows($query)){
				while($assoc=mysql_fetch_assoc($query)){
					$out.="<option value='".$assoc['id']."'>".$assoc['name']."</option>";
				}
			}
			break;
		// w4
		case '3':
			$pid=trim($_GET['p3']);
			$sql="SELECT `id`,`name` FROM w_group WHERE pid=$pid and active=1";
			$query=mysql_query($sql);
			if(mysql_num_rows($query)){
				while($assoc=mysql_fetch_assoc($query)){
					$out.="<option value='".$assoc['id']."'>".$assoc['name']."</option>";
				}
			}
			break;
		default:	
			$out.="ERROR";
	}
	echo $out;
?>
