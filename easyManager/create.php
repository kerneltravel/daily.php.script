<?
	function f_create($create){
		if($create){
			if(file_exists($create)){
				echo "$create exists";
			}
			else{
				echo "creating now ...<br />";
				touch($create);
				if(file_exists($create))echo "DONE<br />";
			}
		}
		else echo "enter a filename<br />";
	}
?>