<?php
 class   JDDATA{
	 function judge_add($typedata,$num){
	if(is_array($typedata)){
		$countn = count($typedata);
			if(count($typedata) < $num){
				for($i=1;$i <= ($num- $countn);$i++){
					$typedata[$countn-1+$i] = $typedata[0];	
				}	
			}	
		}
		else{
			$typedata3 = ARRAY();
			for($i=0;$i < $num;$i++){
				$typedata3[$i] = $typedata;	
			}	
			$typedata = $typedata3;
		}
		return $typedata;
	 }
}
?>