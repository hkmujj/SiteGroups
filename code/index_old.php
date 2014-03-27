<?php
  error_reporting(0);
  $dpage=$_GET["page"];
  $Aid=$_GET["Aid"];
  //取域名，配置网站
  $newurl =  $_SERVER["HTTP_HOST"];
	$newurl = str_replace("http://","",$newurl);
	$newurl = str_replace("/","",$newurl);
	if(file_exists($newurl)){
	  $config = $newurl."/skin/config.php";
	  $lujing = $newurl;
  }
  else{
  	$newurl=explode(".",$newurl);
	  $urlnums = count($newurl);
	  $mainurl = "http://".$newurl[$urlnums-2].".".$newurl[$urlnums-1];
  	$config = $mainurl."/skin/config.php";	
  	$lujing = $mainurl;
  }
  require($config);
  //检查是否存在缓存文件
  $jingtai=0;
  if(file_exists("$newurl/index.html")&$dpage=="" | $dpage==1){
  	$jingtai=1;
		$html = file_get_contents("$newurl/index.html");
		echo $html;
		exit;	
  }
  else{
  	if(file_exists("$newurl/index-$dpage.html")&is_numeric($dpage)){
  	$html = file_get_contents("$newurl/index-$dpage.html");
  	echo $html;
		exit;		
	}
  }
  $keywords=str_replace("，",",",$keywords);
  $keywords=explode(",",$keywords);
  $ked_times=count($keywords);
  @mysql_select_db($sqldb, $con);
			$qs = "SELECT * FROM article";
			mysql_query("set names 'gb2312'");
			$rss = mysql_query($qs, $con);
       $nums = mysql_num_rows($rss);
       $page_num=12;
       if($nums > $page_num){
       $total_page=ceil($nums/$page_num);
     }
     else{
     	$total_page=1;	
     }
     	ob_start();	 
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?php echo $webname ?>,<?php echo $webname ?>官方门户网站-<?php if(is_numeric($dpage) && $dpage <= $total_page && $dpage > 0) echo "第".$dpage."页";else{echo "首页";}         ?></title>
<meta name="keywords" content="<?php for($u=1;$u <= $ked_times;$u++){echo strip_tags($keywords[$u-1],"").",";} ?>">
<?php
	@mysql_select_db($sqldb, $con);
	$qs1 = "SELECT * FROM article";
	mysql_query("set names 'gb2312'");
	$rss1 = mysql_query($qs1, $con);
  $nums1 = mysql_num_rows($rss1);
  if($dpage <= $nums1 && is_numeric($dpage) && $dpage >= 1 ){
  	$dpage = $dpage;
} 
else{
	$dpage = 1;
}
	$q = "SELECT * FROM article where Aid BETWEEN ($dpage-1)*16+1 AND $dpage*16";
	mysql_query("set names 'gb2312'");
	$rs = mysql_query($q, $con);
	while($row = mysql_fetch_row($rs)){
		$title=$row[1];
		$tdate=$row[2];
		$tcont=$row[3];
		//$tdecs=mb_substr($tcont,0,200,'gb2312');
		//$tdecs2=mb_substr($tcont,0,100,'gb2312');
		//$tdecs3=mb_substr($tcont,100,100,'gb2312');
	}
?>

<meta name="description" content="<?php echo strip_tags($webseo,""); ?>" />
<link href="<?php echo $lujing ?>/skin/style.css" rel="stylesheet" type="text/css">
<?php echo $webjs; ?>
</head>
<body>
<div class="main">
	<?php include 'head.php';  ?>
  <div class="content-left">
    <h2 class="con-title"><?php echo $title.strip_tags($keywords[0],""); ?></h2>
    <div class="info">来源：<?php echo $webname; ?>&nbsp;&nbsp;&nbsp;时间：<?php echo $tdate; ?></div>
    <div class="con-body">
      <div><?php echo $tdecs2.$webseo.$tdecs3; ?></div>
      <?php
      for($tt=1;$tt <= $ked_times;$tt++){
     $times=2;
     $strlen = mb_strlen($tcont, "gb2312"); 
			for ( $i = 0; $i < $times; $i ++ ) 
			{ 
			$arr[] = mt_rand(0, $strlen); 
			} 
			$arr = array_unique($arr); 
			//print_r($arr);
			sort($arr); 
			$i = 0; 
			$str_new = ""; 
			foreach( $arr as $v ) 
			{ 
			$str_new .= mb_substr($tcont, $i, $v - $i, "gb2312").$keywords[$tt-1]; 
			$i = $v; 
			} 
			$str_new .= mb_substr($tcont, $i, $strlen - $i, "gb2312"); 
			$tcont=$str_new;
     }
     
      echo $tcont; ?>
    </div>
  </div>
  <div class="content-right">
    <h3 class="new">【<?php echo strip_tags($keywords[0],""); ?>】最新评论</h3>
    <div class="newpost">
      <ul>
      	<?php 
      		if(is_numeric($dpage) && $dpage <= $total_page && $dpage > 0){
     		$startdb=($dpage-1)*$page_num;
     		$qa = "SELECT * FROM article order by Aid desc limit $startdb,$page_num";
				mysql_query("set names 'gb2312'");
				$ra = mysql_query($qa, $con);
				 while($myrowa=mysql_fetch_array($ra)){//循环的
				 	
				 
     ?>
        <div class="list">
          <div class="list-icon"><img src="<?php echo $lujing ?>/skin/0269.jpg" alt="头像"></div>
          <div class="list-topic">
            <div class="list-name"><?php echo mb_substr($myrowa['Title'],0,4,'gb2312'); ?> <span class="list-name-time"><?php  echo $myrowa['Date']; ?></span></div>
            <div class="list-detail"><?php $keid=mt_rand(0, $ked_times);  echo mb_substr($myrowa['Content'],0,60,'gb2312').strip_tags($keywords[$keid],""); ?></div>
          </div>
        </div>
       <?php }}  
     else{
     		$dpage=1;
     		$qt = "SELECT * FROM article order by Aid desc limit 0,$page_num";
				mysql_query("set names 'gb2312'");
				$rt = mysql_query($qt, $con);
				 while($myrowst=mysql_fetch_array($rt)){
				// print_r($myrowst);
				 //echo $myrowst['Title'];	
				 
     
      	?>
      	<div class="list">
          <div class="list-icon"><img src="<?php echo $lujing ?>/skin/0269.jpg" alt="头像"></div>
          <div class="list-topic">
            <div class="list-name"><?php echo mb_substr($myrowst['Title'],0,4,'gb2312'); ?> <span class="list-name-time"><?php  echo $myrowst['Date']; ?></span></div>
            <div class="list-detail"><?php  $keid=mt_rand(0, $ked_times);  echo mb_substr($myrowst['Content'],0,60,'gb2312').strip_tags($keywords[$keid],""); ?></div>
          </div>
        </div>
         <?php  } } //循环结束 
         ?>
      </ul>
    </div>
  </div>
  <div class="c"></div>
  <div class="pages"> 
  	<?php  
  	    for($pg=1;$pg <= $total_page;$pg++){
  	    	if($pg == $dpage){
  	    	  echo "<span class=\"current\">$pg</span> ";	
  	    	}	
  	    	else{
  	    		if($wjtk==1){
  	    		echo 	"<a class=\"pages\" href=\"/".$wjtqz."-".$pg."".$wjthz."\">$pg</a>";	
  	    		}
  	    		else{
  	    	  echo "<a class=\"pages\" href=\"index.php?page=$pg\">$pg</a>";	
  	    	  }
  	    	}
  	    	
  	    }
  	if($wjtk==1){
  		$npg=$dpage+1;
  		$prepg=$dpage-1;
  		if($npg < $total_page)
  		echo "<a href=\"/".$wjtqz."-".$npg."".$wjthz."\">下一页</a>";
  		if($prepg >= 1)
  		echo "<a href=\"/".$wjtqz."-".$prepg."".$wjthz."\">上一页</a>";	
  	}
  	else{
  		$nnpg=$dpage+1;
  		$pnrepg=$dpage-1;
  		if($pnrepg >= 1)
  		echo "<a href=index.php?page=$pnrepg>上一页</a>";
  		if($nnpg < $total_page)
  		echo "<a href=index.php?page=$nnpg>下一页</a>";	
  	}
  	 ?>
    <select name="sldd" style="width:36px" onchange="location.href=this.options[this.selectedIndex].value;">
        <?php
        	  for($k=1;$k <= $total_page;$k++){
        	  	if($wjtk==1){
           			echo "<option value=\"/".$wjtqz."-".$k."".$wjthz."\" selected=\"\">$k</option>";
        	
                }
                else{
        	  	echo "<option value=\"index.php?page=$k\" selected=\"\">$k</option>";	
        	  }
        	  }
        	?>
    </select>
    <span class="pageinfo">共 <strong><?php echo $total_page; ?></strong>页<strong><?php echo $nums; ?></strong>条</span></div>
  <div class="pt10 c"></div>
</div>

<!-- main End-->
<?php include 'foot.php';  ?>
</body>
</html>
<?php
$out1 = ob_get_contents();
ob_end_clean();
if($dpage != "" & is_numeric($dpage)& $dpage !=1){
$fp = fopen("$newurl/index-$dpage.html","w");
//$out1 = str_replace("skin/style.css","../skin/style.css",$out1);
fwrite($fp,$out1);
fclose($fp);
$html = file_get_contents("$newurl/index-$dpage.html");
echo $html;
exit;
}
else{
$fp = fopen("$newurl/index.html","w");
fwrite($fp,$out1);
fclose($fp);	
$html = file_get_contents("$newurl/index.html");
echo $html;
exit;	
}
?>
