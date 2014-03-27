<?php
	function EchoJQ($ID,$content,$HoA){//$HoA 0:HTML  1:APPAD
		if($HoA == 0){
		echo '<script>$("#'.$ID.'").html("'.$content.'");</script>';	
		flush();
		}
		elseif($HoA == 1){
		echo '<script>$("#'.$ID.'").append("'.$content.'");</script>';	
		flush();		
		}	
		elseif($HoA == 2){
		echo '<script>$("#'.$ID.'").css("width",'$content'%);</script>';	
		flush();	
		}
	}
?>