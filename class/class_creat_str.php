<?php
error_reporting(0);
class RAND_STR{
	function rand_creat($mod,$bit,$nums){
		$fanyu = array();
		$num = array(0,1,2,3,4,5,6,7,8,9);
		for($ti=0;$ti < $nums;$ti++){
		if($mod == 0){
			for($i=1;$i <= $bit;$i++){
				@$fanyu[$ti] .= chr(rand(97,122)); 	
			}
		}
		elseif($mod == 1){
			for($i=1;$i <= $bit;$i++){
				$choose = rand(0,1);
				if($choose == 0){
				@$fanyu[$ti] .= chr(rand(97,122));	
			}	
			else{
			  @$fanyu[$ti] .=$num[rand(0,9)];
			}		
			}					
		}
	}
	$last_arr = self::rand_check($fanyu,$mod,$bit);
	return $last_arr;
}
	function rand_check($arr,$mod,$bit){
		$raw_nums = count($arr);
	  $arr_check = array_unique($arr);
		$back_nums = count($arr_check);
		if($back_nums < $raw_nums){
			$incret_nums = $raw_nums - $back_nums;
			for($nf=0;$nf < $incret_nums;$nf++){
			$new_arr = self::rand_creat($mod,$bit,1);
			array_push($arr_check,$new_arr);	
		}
		}
		return $arr_check;
	}
} 
?>