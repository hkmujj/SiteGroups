<?php
	error_reporting(0);
  $dpage=$_GET["page"];
  $Aid=$_GET["Aid"];
  $config = "skin/config.php";
  require($config);
  //关键词获取
  $keywords=str_replace("，",",",$keywords);
  $keywords=explode(",",$keywords);
  $ked_times=count($keywords);
  //获取总页码
  @mysql_select_db($sqldb, $con);
			$qs = "SELECT * FROM article";
			mysql_query("set names 'gb2312'");
			$rss = mysql_query($qs, $con);
       $nums = mysql_num_rows($rss);
       $page_num=16;
       if($nums > $page_num){
       $total_page=ceil($nums/$page_num);
     }
     else{
     	$total_page=1;	
     }
	//评论输出
	if(is_numeric($dpage) && $dpage <= $total_page && $dpage > 0 && $dpage != ""){
     		$startdb=($dpage-1)*$page_num;
			}
			elseif($dpage == ""){
				$startdb = ($xulie-1)*16;	
			}
	else{
     $dpage=1;
     $startdb = 0;
		}
		$npg=$dpage+1;
  	$prepg=$dpage-1;
		$qa = "SELECT * FROM article order by Aid desc limit $startdb,$page_num";
		mysql_query("set names 'gb2312'");
		$ra = mysql_query($qa, $con);
?>