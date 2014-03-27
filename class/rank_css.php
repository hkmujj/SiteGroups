<?php
//$color = 0123456789abcdef;
//$rank_nums = rand(0,15);
class COLOR
 {
 	var $tag;
	var $color = array(1,2,3,4,5,6,7,8,9,0,'a','b','c','d','e','f');
	var $tags = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	function creat_sicolor(){
		//echo $this->color;
		$css_color = $this->color[rand(0,15)];
		return $css_color;
	}
	function creat_color(){
		$web_color1 = self::creat_sicolor();	
		$web_color2 = self::creat_sicolor();
		$web_color3 = self::creat_sicolor();
		$web_color4 = self::creat_sicolor();
		$web_color5 = self::creat_sicolor();
		$web_color6 = self::creat_sicolor();
		$jud = self::judge_color($web_color1,$web_color2,$web_color3);
		while(! $jud){
			$web_color2 = $this->creat_sicolor();
			$jud = $this->judge_color($web_color1,$web_color2,$web_color3);	
		}
		$web_color = "#".$web_color1.$web_color2.$web_color3.$web_color4.$web_color5.$web_color6;
		return $web_color;
	}
	function judge_color($c1,$c2,$c3){
		if($c1 == $c2 & $c2 == $c3 & $c1 == $c3){
			return false;	
		}	
		return true;
	}
	function creat_tag($nums){
		if(! is_numeric($nums)){
			return flase;	
		}	
		for($i=0;$i < $nums;$i++){
				$tag .= $this->tags[rand(0,25)];
		}
		return $tag;
	}	
}
?>