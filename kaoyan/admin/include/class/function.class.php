<?
	// ǰ̨ϵͳ�˵�
	function showSidebar(){
		echo "	<ul>
				<li>����ѡ��</li>
				<li><a href=\"getstart.php\" target=\"_blank\">&nbsp;&nbsp;����׼��[TODO]</a></li>
				<li><a href=\"search.php\">&nbsp;&nbsp;����[TODO]</a></li>
			</ul>
			<ul>
				<li>����ѡ��</li>
				<li><a href=\"admin/index.php\">&nbsp;&nbsp;����������</a></li>
			</ul>";
	}// end showSidebar

	// ��̨ϵͳ�˵�
	function showAdminSideBar(){
		echo "	<ul>
				<li><a href=\"../index.php\">�������</a></li>
			</ul>
			<ul>
				<li>������</li>
				<li><a href=\"subject.php\">&nbsp;&nbsp;������༭��Ŀ</a></li>
				<li><a href=\"add.2.php\">&nbsp;&nbsp;������Ŀ(inline ģʽ)[TODO]</a></li>
			</ul>
			<ul>
				<li>BONUS<li>
				<li><a href=\"bug.php\">&nbsp;&nbsp;��֪�� bug</a></li>
			<ul>";
	}// end showAdminSideBar

	function showTime(){
		echo date("Y/m/d H:i:s");
	}// end showTime

	function mysqlAddTime(){
		$time=date("Y-m-d H:i:s");
		return $time;
	}// end mysqlAddTime
?>
