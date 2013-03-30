<?
	// 前台系统菜单
	function showSidebar(){
		echo "	<ul>
				<li>基本选项</li>
				<li><a href=\"getstart.php\" target=\"_blank\">&nbsp;&nbsp;做题准备[TODO]</a></li>
				<li><a href=\"search.php\">&nbsp;&nbsp;搜索[TODO]</a></li>
			</ul>
			<ul>
				<li>管理选项</li>
				<li><a href=\"admin/index.php\">&nbsp;&nbsp;登入管理界面</a></li>
			</ul>";
	}// end showSidebar

	// 后台系统菜单
	function showAdminSideBar(){
		echo "	<ul>
				<li><a href=\"../index.php\">返回题库</a></li>
			</ul>
			<ul>
				<li>题库操作</li>
				<li><a href=\"subject.php\">&nbsp;&nbsp;新增或编辑题目</a></li>
				<li><a href=\"add.2.php\">&nbsp;&nbsp;新增题目(inline 模式)[TODO]</a></li>
			</ul>
			<ul>
				<li>BONUS<li>
				<li><a href=\"bug.php\">&nbsp;&nbsp;已知的 bug</a></li>
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
