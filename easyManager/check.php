<?
	function f_check($check){
		if($check){
			if(file_exists($check)){
				echo "$check exists<br />";
				if(is_readable($check))echo "$check is readable<br />";
				else echo "$check is not readable<br />";
				if(is_writeable($check))echo "$check is writeable<br />";
				else echo "$check is not writeable<br />";
				if(is_executable($check))echo "$check is executable<br />";
				else echo "$check is not executable<br />";
			}
			else echo "$check does not exist ...<br />Please create it first <br />";
		}
		else echo "enter a filename<br />";
	}
?>