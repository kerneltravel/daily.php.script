<html>
<head>
<title>2014���ϵͳ</title>
<link rel="stylesheet" type="text/css" href="../scripts/css/index.css" />
<script src="../scripts/js/jquery.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
	setInterval(
		function(){
			$("#header").load(location.href+" #header");
	},1000);
</script>
</head>

<body>
	<?
		require_once('include/conn.php');
		require_once('include/class/function.class.php');
	?>
	<div id="header">
		<?showTime();?>
	</div>
	<div id="navbar">
		<?showAdminSideBar();?>
	</div>
	<div id="main">
		<form action="search.php" name="searchForm" method="post">
			����[TODO]:<input type="text" name="search" />
			<input type="submit" name="submit" value="�ύ" />
		</form>
		����:
		<a href="add_xz.php" target="_blank">[ѡ����]</a>
		<a href="add_tk.php" target="_blank">[�����]</a>
		<a href="add_jd.php" target="_blank">[�����]</a>
		<table width="90%" border="1" align="center" cellspacing="0" cellpadding="1">
			<!--<tr>
				<td>[����]</td>
				<td colspan="2"><a href="add_xz.php" target="_blank">[ѡ����]</a></td>
				<td colspan="2"><a href="add_tk.php" target="_blank">[�����]</a></td>
				<td colspan="2"><a href="add_jd.php" target="_blank">[�����]</a></td>
			</tr>-->
			<tr>
				<td width="7%"></td>
				<td width="5%">���</td>
				<td width="5%">״̬</td>
				<!--<td>����</td>-->
				<td>����</td>
				<td>��</td>
				<td width="7%">����</td>
				<td>��ǩ1</td>
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
				<td><a href="edit.php?id=<?echo $key['id'];?>" target="_target">[�༭]</a></td>
				<td><?echo $key['id'];?></td>
				<td><?echo $key['active'];?></td>
				<!--<td><?echo $key['content'];?></td>-->
				<td><?echo $key['title'];?></td>
				<td><?echo $key['answer'];?></td>
				<td><?echo $key['type'];?></td>
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