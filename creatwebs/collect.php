<?php
	error_reporting(0);
	set_time_limit(0);
	//require_once("../class/class_sql.php");
	require_once("../class/class_getweb2.php");
	require_once("../class/class_getweb.php");
	require_once("../class/class_getweb2.php");
	require_once("../class/rank_css.php");	
  $dbhost=$_POST['dbhost'];
	$dbuser=$_POST['dbuser'];
	$dbpasswd=$_POST['dbpasswd'];
	$dbname=$_POST['dbname'];
	$nums=$_POST['nums'];
	$sport=$_POST['sport'];
	$prokey = $_POST['prokey'];
	$taobao = $_POST['taobao'];
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
	elseif($sport=="淘宝评论采集"){
		$taobao = str_replace("http://","",$taobao);
		$taobao = "http://".$taobao;
		$contents = file_get_contents($taobao);
		$needm = "/itemId:\"([0-9]{1,})\",/is";
		preg_match($needm,$contents,$itemid);
		$needm = "/sellerId:\"([0-9]{1,})\",/is";
		preg_match($needm,$contents,$sellerid);
		//echo $itemid[1]."<br>".$sellerid[1];
		if($itemid == "" | $sellerid == ""){
			echo "此页面不符合采集规则，请重新输入";
			return;	
		}
		else{
			$page_nums = $nums/20;	
			for($page=1;$page <= $page_nums;$page++){
		$url = "http://rate.taobao.com/detail_rate.htm?userNumId=".$sellerid[1]."&auctionNumId=".$itemid[1]."&showContent=1&currentPage=".$page."&ismore=0&siteID=&t=1331601757286";
		//echo $url;
		$content = file_get_contents($url);
		//echo $content;
		$needm = "/\"rateContent\":\"(.*?)\"rateDate\"/is";
		preg_match_all($needm,$content,$f);
		if(count($f[0]) !=0 ){
		//$g = $a->arrayChange($f);
		$needm = "/\"rateContent\":\"([\s\S]*)userVipLevel/is";
		$needm_ = "/\"displayUserNick\":([\s\S]*)\"type\"/is";
		for($k=0;$k < count($f[0]);$k++){
		preg_match($needm,$f[0][$k],$h);
		preg_match($needm_,$f[0][$k],$l);
		$h[1] = str_replace('"',"",$h[1]);
		$h[1] = str_replace('\\n',"",$h[1]);
		$l[1] = str_replace("*","",$l[1]);
		//if(strlen($h[1] >= 2)){
		$j[] = $h[1];
		$rank_name = new COLOR;
		if($l[1] == ""){
			$uname[] = $rank_name->creat_tag(rand(3,6));
		}
		else{
		$l[1] = str_replace('"',"",$l[1]);
		$l[1] = str_replace(',',"",$l[1]);
		$l[1] = str_replace('，',"",$l[1]);
		$uname[] = $l[1];
	}
 }
	}
	
	else{
		$j[] = "";	
	}
}
for($i=0;$i < count($j);$i++){
		$j[$i] = str_replace('\u0001',"",$j[$i]);
		//$j[$i] = iconv("utf8","gb2312",$j[$i]);
		$jhz = explode("，",$j[$i]);
		$jh = array();
		shuffle($jhz);
		$j[$i] = implode($jhz);
		$j[$i] = iconv("gb2312","utf-8",$j[$i]);
		$uname[$i] = iconv("gb2312","utf-8",$uname[$i]);
		$arr[] = $uname[$i]."{*}".$j[$i];
	}
	/*
	for($i=0;$i < count($j);$i++){
		$suiji = rand(0,count($jhz));
		$ked_times = 1;
  	$keywords = "{<ked>}";
  	$strlen = mb_strlen($j[$i], "gb2312"); 
  	$in = mt_rand(0, $strlen); 
  	$str_new = mb_substr($j[$i], 0, $in, "gb2312").$keywords.mb_substr($j[$i], $in, $strlen-$in, "gb2312"); 
  	$j[$i]=$str_new;
		$j[$i] = implode("，",$j[$i]);	
		$j[$i] = iconv("gb2312","utf-8",$j[$i]);
		$uname[$i] = iconv("gb2312","utf-8",$uname[$i]);
		$arr[] = $uname[$i]."{*}".$j[$i];
		//echo iconv("utf-8","gb2312",$j[$i]);
		//$ins = "INSERT INTO article (Aid, Title, Date,Content,channel_id) VALUES ('', '$uname[$i]', now(),'$j[$i]','')";
		//mysql_query($ins);
	}  */
//	print_r($arr);
		}
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
		$title_article = $getwebs->get_article($links,$needm2,$webname);
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
	elseif($sport=="评论采集"){
		$url = "http://s.taobao.com/search?q=".$prokey;
		$content =file_get_contents($url);//$getwebs->get_web($url,"utf-8");
		//$file = fopen("a.html",'w');
		//fwrite($file,$content);
		//fclose($file);
		$needm = "/<h3 class=\"summary\">([\s\S]*)<\/a><\/h3>/is";
		preg_match($needm,$content,$result);
		$needm = "/href=\"(.*?)\"/is";
		preg_match_all($needm,$result,$result2);
		print_r($result2);
		//$links = $getwebs->get_link($content,$needm,2,0);
		//print_r($links);
	}
	else{
		echo "参数错误";
		return;
	}
	mysql_select_db($dbname,$con);
	mysql_query("SET NAMES gb2312");
	//$ok = $cndb->condb($dbhost,$dbuser,$dbpasswd,$dbname);
	//$title_article1 = $getwebs->arrayChange($title_article);
	$count_nums = 0;
	for($i=0;$i < count($arr);$i++){
		if(!empty($arr[$i])){
			$arr2 = explode('{*}',$arr[$i]);
			if(!empty($arr2[1])){
				//插入关键字
				$title = iconv("utf-8","gb2312",$arr2[0]);
				$info =iconv("utf-8","gb2312",$arr2[1]);
				$tcont = $info;
				$ked_times = 1;
		  	$keywords = "{<ked>}";
		  	$strlen = mb_strlen($tcont, "gb2312"); 
		  	$in = mt_rand(0, $strlen); 
		  	$str_new = mb_substr($tcont, 0, $in, "gb2312").$keywords.mb_substr($tcont, $in, $strlen-$in, "gb2312"); 
		  	$tcont=$str_new;
  			$info = $tcont;
				if(empty($title)){
					$title = 	$rank_name->creat_tag(rand(3,6));
				}
				//echo $info;
				$info = trim($info);
				$id = $getwebs->rand_id("channel",$con,$dbname);
				$ins = "insert into article (Aid,Title,Date,Content,Channel_id) VALUES (null,'$title',now(),'$info',0)"; 
		   mysql_query($ins);
		   ++$count_nums;
			
		}
			//echo $title;
		}
	}
	echo "操作完成，实际采集数目为".$count_nums."条";
	//print_r($title);
	//print_r($info);
	//$cndb = new MDB;
	//$cndb->condb($dbhost,$dbuser,$dbpasswd,$dbname);
?>