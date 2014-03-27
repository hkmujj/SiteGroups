<?php
  error_reporting(0);
  //require('skin/config.php');
  $cid = $_GET['cid'];
  $dpage = $_GET['page'];
  $newurl =  $_SERVER["HTTP_HOST"];
	$newurl = str_replace("http://","",$newurl);
	$newurl = str_replace("/","",$newurl);
	if(file_exists($newurl)){
	  $config = $newurl."/skin/config.php";
  }
  else{
  	$newurl=explode(".",$newurl);
	  $urlnums = count($newurl);
	  $mainurl = "http://".$newurl[$urlnums-2].".".$newurl[$urlnums-1];
  	$config = $mainurl."/skin/config.php";	
  }
  require($config);
  //取总页数
  @mysql_select_db($sqldb, $con);
			$qs = "SELECT * FROM article where Channel_id=$cid";
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
     if(!is_numeric($dpage) | $dpage > $total_page | $dpage == ""){
     	$dpage = 1;	
     }
     $min = ($dpage-1)*20+1;
     //检查是否存在缓存文件
  if(file_exists("$newurl/channel.html") & $cid=="" & is_numeric($cid)){
		$html = file_get_contents("$newurl/channel.html");
		echo $html;
		exit;	
  }
   else{
  	if(file_exists("$newurl/channel-$cid.html")&is_numeric($cid)){
  	$html = file_get_contents("$newurl/channel-$cid.html");
  	echo $html;
		exit;		
	}
}
	ob_start();	 
	 @mysql_select_db($sqldb, $con);
    $qs = "SELECT * FROM channel where Cid=$cid";
    mysql_query("set names 'gb2312'");
    $rss = mysql_query($qs, $con);
    while($row = mysql_fetch_row($rss)){
    	$title = $row[1];	
    }	
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?php echo $webname ?>,<?php echo $webname ?>官方门户网站</title>
<meta name="keywords" content="<?php for($u=1;$u <= $ked_times;$u++){echo strip_tags($keywords[$u-1],"").",";} ?>">
<meta name="description" content="<?php echo strip_tags($webseo,""); ?>" />
<link href="<?php echo $lujing ?>/skin/style.css" rel="stylesheet" type="text/css">
<?php echo $webjs; ?>
</head>
<body>

<div class="main">
	<?php include 'head.php';  ?>
  <div class="content-left">
    <h1 class="con-title"><?php 
    echo $title.strip_tags($keywords[0],""); ?></h1>
    <?php
			@mysql_select_db($sqldb, $con);
			$qc = "SELECT * FROM article where Channel_id=$cid limit $min,20";    
			mysql_query("set names 'gb2312'");
			$rsc = mysql_query($qc, $con);
	    while($rowc = mysql_fetch_row($rsc)){
	    	echo "<div class=\"info\"><a href=\"article.php?artid=$rowc[0]\">$rowc[1]</a>&nbsp;&nbsp;&nbsp;时间:$rowc[2]</div>";	
	    }
   ?>
  </div>
  <div class="content-right">
    <h2 class="new">【<?php echo strip_tags($keywords[0],""); ?>】最新</h2>
    <div class="newpost">
      <ul>
      	<?php 
     		$qa = "SELECT * FROM article where Channel_id=$cid order by Date desc limit 10";
				mysql_query("set names 'gb2312'");
				$ra = mysql_query($qa, $con);
				 while($myrowa=mysql_fetch_array($ra)){
				 	
				 
     ?>
        <div class="list">
          <div class="list-icon"><img src="<?php echo $lujing ?>/skin/0269.jpg" alt="头像"></div>
          <div class="list-topic">
            <div class="list-name"><?php echo mb_substr($myrowa['Title'],0,4,'gb2312'); ?> <span class="list-name-time">
            	<?php  echo $myrowa['Date']; ?></span></div>
            <div class="list-detail"><?php $keid=mt_rand(0, $ked_times);  echo mb_substr($myrowa['Content'],0,60,'gb2312').strip_tags($keywords[$keid],""); ?></div>
          </div>
        </div>
       <?php } ?>
      </ul>
    </div>
  </div>
  <div class="c"></div>
  <div class="pages"> 
  	<?php  
  	/*
  	    for($pg=1;$pg <= $total_page;$pg++){
  	    	if($pg == $dpage){
  	    	  echo "<span class=\"current\">$pg</span> ";	
  	    	}	
  	    	else{
  	    		if($wjtk==1){
  	    		echo 	"<a class=\"pages\" href=\"/".$wjtqz."-".$pg."".$wjthz."\">$pg</a>";	
  	    		}
  	    		else{
  	    	  echo "<a class=\"pages\" href=\"channel.php?page=$pg&cid=$cid\">$pg</a>";	
  	    	  }
  	    	}
  	    	
  	    }
  	if($wjtk==1){
  		$npg=$pg+1;
  		$prepg=$pg-1;
  		echo "<a href=\"/".$wjtqz."-".$npg."".$wjthz."\">下一页</a>";
  		echo "<a href=\"/".$wjtqz."-".$prepg."".$wjthz."\">上一页</a>";	
  	}
  	else{
  		$nnpg=$pg+1;
  		$pnrepg=$pg-1;
  		echo "<a href=channel.php?page=$nnpg&cid=$cid>上一页</a>";
  		echo "<a href=channel.php?page=$pnrepg&cid=$cid>下一页</a>";	
  	}
  	 ?>
    <select name="sldd" style="width:36px" onchange="location.href=this.options[this.selectedIndex].value;">
        <?php
        	  for($k=1;$k <= $total_page;$k++){
        	  	if($wjtk==1){
           			echo "<option value=\"/".$wjtqz."-".$k."".$wjthz."\" selected=\"\">$k</option>";
        	
                }
                else{
        	  	echo "<option value=\"channel.php?page=$k&cid=$cid\" selected=\"\">$k</option>";	
        	  }
        	  } */
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
if($cid != "" & is_numeric($cid)){
$fp = fopen("$newurl/channel-$cid.html","w");
//$out1 = str_replace("skin/style.css","../skin/style.css",$out1);
fwrite($fp,$out1);
fclose($fp);
$html = file_get_contents("$newurl/channel-$cid.html");
echo $html;
exit;
}
else{
$fp = fopen("$newurl/channel.html","w");
fwrite($fp,$out1);
fclose($fp);	
$html = file_get_contents("$newurl/channel.html");
echo $html;
exit;	
} 
?>