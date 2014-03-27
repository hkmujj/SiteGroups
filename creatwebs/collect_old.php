<?php
	error_reporting(0);
	set_time_limit(0);
	//require_once("../class/class_sql.php");
	require_once("../class/class_getweb.php");
    $dbhost=$_POST['dbhost'];
	$dbuser=$_POST['dbuser'];
	$dbpasswd=$_POST['dbpasswd'];
	$dbname=$_POST['dbname'];
	$nums=$_POST['nums'];
	$sport=$_POST['sport'];
	$newsp = 0;
	$con = mysql_connect($dbhost,$dbuser,$dbpasswd);
	if(!$con){
		echo "数据库信息有误";
		return;
	}
function arrayChange($a){ 
    static $arr2; 
    foreach($a as $v){ 
        if(is_array($v)){ 
            arrayChange($v); 
        } 
        else{ 
            $arr2[]=$v; 
        } 
    } 
    return $arr2; 
} 	
	
	$getwebs= new GWEB;
	if($sport=="新浪滚动新闻"){
	    if($nums < 30){
			$loop_nums=1;
		}
		else{
			$loop_nums = intval($nums/30);
			if($nums%30 != 0){
				++$loop_nums;
			}
		}
		//echo $loop_nums;
		for($newsp=1;$newsp <= $loop_nums;$newsp++){
			$url = "http://roll.tech.sina.com.cn/internet_chinalist/index_".$newsp.".shtml";
			$contents=$getwebs->get_web($url,"utf-8");
			$needm = "/<li>(.*)<\/li>/is";
			$links = $getwebs->get_link($contents,$needm,30,0);
			$needm2 = "/正文内容 begin(.*?)publish_helper_end/is";
			$webname="新浪";
			//$file = fopen("a.txt",'w');
			$title_article[$newsp] = $getwebs->get_article($links,$needm2,$webname);
		}
		$arr = arrayChange($title_article);
		//$arr2 = implode(",",$arr);
		//fwrite($file,$arr2);
		//print_r($arr2);
	}
	elseif($sport=="天涯(博客)"){
		//$file = fopen("a.txt",'w');
		if($nums > 400){
			$nums = 400;
		}
		$url = "http://blog.tianya.cn/";
		$contents=$getwebs->get_web($url,"utf-8");
		$needm = "/([\s\S]*)/is";
		$links = $getwebs->get_link($contents,$needm,$nums,20);
		$needm2 = "/article-tag pos-relative cf\"(.*?)class=\"article-categories pos-relative\"/is";
		$webname="天涯";
		$title_article = $getwebs->get_article($links,$needm2,$webname);
		$arr = arrayChange($title_article);
		$arr2 = implode(",",$arr);
		//fwrite($file,$arr2);
		//print_r($title_article);
	}
	elseif($sport=="网易体育"){
		if($nums < 80){
			$loop_nums = 3;
		}
		else{
			$loop_nums = intval($nums/80)+2;
			if($nums%80 != 0){
				++$loop_nums;
			}
		}
		for($newsp=2;$news < $loop_nums;$newsp++){
		$url = "http://sports.163.com/special/0005rt/sportsgd_0$newsp.html";//index=http://sports.163.com/special/0005rt/sportsgd.html
		$contents = $getwebs->get_web($url,"utf-8");
		$needm = "/class=\"col2\"(.*?)class=\"blank12\"/is";
		$links = $getwebs->get_link($contents,$needm,80,0);
		$needm2 = "/id=\"endText\">(.*?)分页/is";
		$webname = "网易";
		$title_article[$newsp] = $getwebs->get_article($links,$needm2,$webname);
		}
		$arr = arrayChange($title_article);
	}
	elseif($sport=="中国新闻网体育新闻"){
		//$file = fopen("a.txt",'w');
		if($nums > 200){
			$nums= 200;
		}
		$url = "http://www.chinanews.com/ty/gun-news.html";//Only one page in all 
		$contents = $getwebs->get_web($url,"utf-8");
		$needm = "/class=\"content_list\">(.*?)id=\"footerAd\"/is";
		$links =$getwebs->get_link($contents,$needm,$nums,0);
		for($i=0;$i < count($links);$i++){
			$links[$i] = "http://www.chinanews.com".$links[$i];
		}
		$needm2 = "/class=\"left_zw\"(.*?)id=\"function_code_page\"/is";
		$webname = "中新网";
		$title_article = $getwebs->get_article($links,$needm2,$webname);
		$arr = arrayChange($title_article);
		//$arr2 = implode(",",$arr);
		//fwrite($file,$arr2);
		//print_r($arr);
	}
	elseif($sport=="两性知识"){
		//$file = fopen("a.txt",'w');
		if($nums <= 8){
			$loop_nums=2;
		}
		else{
			$loop_nums = intval($nums/8)+1;
			if($nums%8 != 0){
				++$loop_nums;
			}
		}
		for($newsp=1;$newsp < $loop_nums;$newsp++){
		$url = "http://lx.jk1688.com/lxcs/xjq/index_$newsp.html";//index=http://lx.jk1688.com/lxcs/xjq/index_1.html
		$contents = $getwebs->get_web($url,"utf-8");
		$needm = "/class=\"main_box main_box1\"(.*?)class=\"page\"/is";
		$links = $getwebs->get_link($contents,$needm,17,0);
		for($i=0;$i < count($links);$i++){
			$links[$i] ="http://lx.jk1688.com".$links[$i];
		}
		$links = array_flip(array_flip($links));
		$needm2 = "/class=\"content\">(.*?) class=\"page\"/is";
		$webname = "两性频道";
		$title_article[$newsp] = $getwebs->get_article($links,$needm2,$webname);
		}
		$arr = arrayChange($title_article);
	//	$arr2 = implode(",",$arr);
		//fwrite($file,$arr2);
		//print_r($arr);
	//print_r($title_article);
	}
	else{
		return;
	}
	mysql_select_db($dbname,$con);
	mysql_query("SET NAMES gb2312");
	//$ok = $cndb->condb($dbhost,$dbuser,$dbpasswd,$dbname);
	//$title_article1 = $getwebs->arrayChange($title_article);
	for($i=0;$i < count($arr);$i++){
		if(!empty($arr[$i])){
			$arr2 = explode('{*}',$arr[$i]);
			if(!empty($arr2[0]) & !empty($arr2[1])){
				$title = iconv("utf-8","gb2312",$arr2[0]);
				$info =iconv("utf-8","gb2312",$arr2[1]);
				$info = trim($info);
				$ins = "insert into article (Aid,Title,Date,Content,Channel_id) VALUES (null,'$title',now(),'$info',1)"; 
		   mysql_query($ins);
			
		}
			//echo $title;
		}
	}
	//print_r($title);
	//print_r($info);
	//$cndb = new MDB;
	//$cndb->condb($dbhost,$dbuser,$dbpasswd,$dbname);
?>