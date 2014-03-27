<?php
set_time_limit(0);
class GWEB{
	var $url="";
	var $encode="utf-8";
	public function get_web($url,$encode){
		//echo $url;
		$this->url=$url;
		$this->encode=$encode;
		if($url=""){
			return false;	
		}
		if($encode=""|$encode != "utf-8" |$encode != "gbk" |$encode != "gb2312" |$encode != "GBK" |$encode != "GB2312"){
			$this->encode="utf-8";	
		}
		/*
		$ch = curl_init(); 
		$timeout = 5; 
		curl_setopt($ch, CURLOPT_URL, $this->url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
		//在需要用户检测的网页里需要增加下面两行 
		//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		//curl_setopt($ch, CURLOPT_USERPWD, US_NAME.":".US_PWD); 
		*/
		$contents = file_get_contents($this->url);
		//$contents = curl_exec($ch); 
		//curl_close($ch); 
		$content=substr($contents,0,500);
		preg_match("/charset=(.*)>/",$content,$charset);
		$charset=str_replace("\"","",$charset[1]);
		$charset=str_replace(",","",$charset);
		$charset=str_replace("/","",$charset);
		$charset=str_replace(" ","",$charset);
		$charset=str_replace(">","",$charset);
		$contents = iconv($charset,$this->encode,$contents);
		return $contents; 	
	} 	
	public function get_link($contents,$needm,$every_page,$start_page){
		preg_match($needm,$contents,$result);
		$result2 = implode("",$result);
		print_r($result);
		$n2="/href=\"(.*?)\"/is";
		preg_match_all($n2,$result2,$result3);
		$result4 = array_slice($result3[1],$start_page,$every_page);
		$result4 = array_flip(array_flip($result4));
		return $result4;
	}
	
	public function get_article($links,$needm,$webname){
		for($i=0;$i < count($links);$i++){
			$contents = $this->get_web($links[$i],"");
			$needm_title = "/<title>(.*?)<\/title>/is";
			preg_match($needm_title,$contents,$title);
			$artitle=$title[1];
			$artitle=str_replace($webname,"",$artitle);
			preg_match($needm,$contents,$info);
			$a = explode("(.*?)",$needm);
			$a[2] = "正文内容 begin";
			$info2 = str_replace("<p>","\n",$info[0]);
			$info2 = strip_tags($info2);
			$info2 = str_replace($webname,"",$info2);
			$info2 = str_replace($a[0],"",$info2);
			$info2 = str_replace($a[1],"",$info2);
			$info2 = str_replace($a[2],"",$info2);
			$info2 = str_replace("&nbsp;","",$info2);//class="left_zw" style="position:relative">
			//$info2 = str_replace(";","",$info2);//class="content">  &ldquo;   --> 查看最新行情  article-tag pos-relative cf">
			$info2 = str_replace("&ldquo;","",$info2);
			$info2 = str_replace("-->","",$info2);
			$info2 = str_replace("查看最新行情","",$info2);
			$info2 = str_replace("&rdquo;","",$info2);
			$info2 = str_replace("article-tag pos-relative cf\">","",$info2);
			$info2 = str_replace("\r\n","",$info2);
			$info2 = str_replace("class=\"content\">","",$info2);
			$info2 = str_replace("_acK({aid:1807,format:0,mode:1,gid:1,serverbaseurl:\"me.afp.chinanews.com/\"});","",$info2);
			$info2 = str_replace("class=\"left_zw\" style=\"position:relative\">","",$info2);
			$content_arry[$i] = $artitle."{*}".$info2;
		}
		
		return $content_arry;
	}
	function arrayChange($a){ 
    static $arr2; 
    foreach($a as $v){ 
        if(is_array($v)){ 
            $this->arrayChange($v); 
        } 
        else{ 
            $arr2[]=$v; 
        } 
    } 
    return $arr2; 
} 
	 
	 	function rand_id($table,$con,$dbname){
	//$con = mysql_connect("localhost","root","rong");
	mysql_select_db($dbname,$con);
	mysql_query("SET NAMES gb2312");
	$q = "SELECT * FROM channel";
	$rs = mysql_query($q, $con);  
	while($row = mysql_fetch_row($rs)){
		$arr[] = $row[0];	
		//print_r($row[0]);
	}
 //随机
 $nums = count($arr);
 $arr_index = rand(0,$nums-1);
 $index = $arr[$arr_index];
 return $index;
}
}

?>