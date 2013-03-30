<?
	require_once('include/conn.2.php');

	$type=trim($_GET['type']);
	$out="<option value='0'>select</option>";
	switch($type){
		// s1
		case '0':
			$sql="SELECT `id`,`name` FROM s_school WHERE active=1";
			$query=mysql_query($sql);
			if(mysql_num_rows($query)){
				while($assoc=mysql_fetch_assoc($query)){
					$out.="<option value='".$assoc['id']."'>".$assoc['name']."</option>";
				}
			}
			break;
		// s2
		case '1':
			$pid=trim($_GET['p']);
			$sql="SELECT * FROM s_college WHERE pid=$pid and active=1";
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
