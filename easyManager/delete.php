<?
	function f_delete($delete){
		if($delete){
			if(file_exists($delete)){
				unlink($delete);
				if(!file_exists($delete))echo "DONE<br />";
			}
			else echo "$delete does not exist<br />please create it first<br />";
		}
		else echo "enter a filename<br />";
	}
?>