<?
	// name 中文匹配,2-4中文
	function name_re($name){
		return preg_match("/^[\x80-\xff]{4,8}$/",$name);
	}// end name_re($name)

	function nameRegist_re($name){
		return preg_match("/^[\x80-\xffA-Za-z]{4,10}$/",$name);
	}// end name_re($name)

	// age 数字匹配,1-2数字
	function age_re($age){
		return preg_match("/^[12][0-9]$/",$age);
	}// end age_re($age)

	// birthday 数字匹配,8数字,不严格
	function birthday_re($birthday){
		return preg_match("/^19[7-9][0-9][01][0-9][0-3][0-9]$/",$birthday);
	}// end birthday_re($birthday)

	// email 数字,英文,符号匹配,最多20位和,10位,4位
	function email_re($email){
		return preg_match("/^[a-zA-Z0-9][a-zA-Z0-9_\.-]{1,20}@[a-z0-9]{2,10}.[a-z]{2,4}/",$email);
	}// end email_re($email)

	// qq 5-12 位数字
	function qq_re($qq){
		return preg_match("/^[0-9]{5,12}$/",$qq);
	}// end qq_re($qq)

	// mobile 数字匹配,11数字
	function mobile_re($mobile){
		return preg_match("/^1[3|5|8][0-9]{9}$/",$mobile);
	}// end mobile_re($mobile)

	// class_number 数字匹配,12数字
	function class_number_re($class_number){
		return preg_match("/^20[0-1][0-9][0-9]{8}$/",$class_number);
	}// end class_number_re($class_number)

	// 判断学号,手机号重复
	function is_same($item,$field){
		switch($field){
			case 1:
				$sql="SELECT * FROM user WHERE class_number='$item'";
				break;
			case 2:
				$sql="SELECT * FROM user WHERE mobile='$item'";
				break;
		}
		$query=mysql_query($sql);

		if(!mysql_num_rows($query)){
			return 1;
		}
		else{
			return 0;
		}
	} // end is_same($item,$field)

	//// TODO
	// $flag
	// 1: school	
	// 2: college
	// 3: unit
	// 4: team
	// 5: department
	// 6: group
	function id2name($name,$flag){
		switch($flag){
			case 1:
				$table="s_school";
				break;
			case 2:
				$table="s_college";
				break;
			case 3:
				$table="w_unit";
				break;
			case 4:
				$table="w_team";
				break;
			case 5:
				$table="w_department";
				break;
			case 6:
				$table="w_group";
				break;
		}
		$sql="SELECT name FROM $table WHERE id=$name";
		$query=mysql_query($sql);
		$array=mysql_fetch_array($query);
		return $array['name'];
	}// end name2cn

	// 侧边菜单
	function sidebar(){
		$usertype=$_SESSION['usertype'];
		$sql1="SELECT * FROM menu WHERE pid='0' and type<='$usertype'";
		$query1=mysql_query($sql1);
		$array1=array();

		while($row1=mysql_fetch_array($query1)){
			array_push($array1,$row1);
		}// while

		foreach($array1 as $arr1){
			echo "</ul><ul><li>".$arr1['name']."</li>";

			$pid=$arr1['id'];
			$sql2="SELECT * FROM menu WHERE pid='$pid' and type<='$usertype'";
			$query2=mysql_query($sql2);
			$array2=array();

			while($row2=mysql_fetch_array($query2)){
				array_push($array2,$row2);
			}

			foreach($array2 as $arr2){
				echo "<li><a href=\"".$arr2['path']."\">&nbsp;".$arr2['name']."</a></li>";
			}
		}// foreach
	}// sidebar

	// 限制 usertype
	function pageusertype(){
		$page=basename($_SERVER['PHP_SELF']);

		$sql="SELECT * FROM menu WHERE path='$page'";
		$query=mysql_query($sql);
		$array=mysql_fetch_array($query);
		return $array['type'];
	}

	// 搜索
	function searchDownload($input){
		$input=trim($input);
		// 高级搜索
		if($outpos=strpos($input,'#')){
			$output=explode('#',$input);
			$item=$output[1];
			if($item){
				if($output[0]=='姓名'){
					$sql="SELECT * FROM user WHERE active='1' AND name LIKE '%$item%' OR name LIKE '%$item' OR name LIKE '$item%' ORDER BY id";
					$query=mysql_query($sql);
				}
				if($output[0]=='校区'){
					$sql="SELECT * FROM user WHERE active='1' AND school LIKE '%$item%' OR school LIKE '%$item' OR school LIKE '$item%' ORDER BY id";
					$query=mysql_query($sql);
				}
				if($output[0]=='学院'){
					$sql="SELECT * FROM user WHERE active='1' AND college LIKE '%$item%' OR college LIKE '%$item' OR college LIKE '$item%' ORDER BY id";
					$query=mysql_query($sql);
				}
				if($output[0]=='团队'){
					$sql="SELECT * FROM user WHERE active='1' AND team LIKE '%$item%' OR team LIKE '%$item' OR team LIKE '$item%' ORDER BY id";
					$query=mysql_query($sql);
				}
				if($output[0]=='部门'){
					$sql="SELECT * FROM user WHERE active='1' AND department LIKE '%$item%' OR department LIKE '%$item' OR department LIKE '$item%' ORDER BY id";
					$query=mysql_query($sql);
				}
			}
		}
		// 普通搜索
		else{
			$item=$input;
			// 校区
			$sql1="SELECT * FROM user WHERE active='1' and school LIKE '$item%' OR school LIKE '%$item' OR school LIKE '%$item%' ORDER BY id";
			$query1=mysql_query($sql1);
			if(!mysql_num_rows($query1)){
				// 学院
				$sql2="SELECT * FROM user WHERE active='1' and college LIKE '$item%' OR college LIKE '%$item' OR college LIKE '%$item%' ORDER BY id";
				$query2=mysql_query($sql2);
				if(!mysql_num_rows($query2)){
					// 团队
					$sql3="SELECT * FROM user WHERE active='1' and team LIKE '$item%' OR team LIKE '%$item' OR team LIKE '%$item%' ORDER BY id";
					$query3=mysql_query($sql3);
					if(!mysql_num_rows($query3)){
						// 部门
						$sql4="SELECT * FROM user WHERE active='1' and department LIKE '$item%' OR department LIKE '%$item' OR department LIKE '%$item%' ORDER BY id";
						$query4=mysql_query($sql4);
						if(!mysql_num_rows($query4)){
							// 姓名
							$sql5="SELECT * FROM user WHERE active='1' and name LIKE '$item%' OR name LIKE '%$item' OR name LIKE '%$item%' ORDER BY id";
							$query5=mysql_query($sql5);
							$query=$query5;
						}
						else{
							$query=$query4;
						}
					}
					else{
						$query=$query3;
					}
				}
				else{
					$query=$query2;
				}
			}
			else{
				$query=$query1;
			}
		}
		return $query;
	}
?>
