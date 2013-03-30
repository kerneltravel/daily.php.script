<?
	function f_rename($rename_old,$rename_new){
		if($rename_old&&$rename_new){
			if(file_exists($rename_old)){
				@$status=rename($rename_old,$rename_new);
				if($status)echo "DONE";
			}
			else echo "$rename_old does not exist...<br /> Please create it first<br />";
		}
		else echo "enter a filename<br />";
	}
?>