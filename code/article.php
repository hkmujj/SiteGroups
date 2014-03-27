<?php
  error_reporting(0);
  //require('skin/config.php');
  $Aid=$_GET["artid"];
  if($Aid == "" | !is_numeric($Aid)){
  	$Aid = 1;	
  }
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
  //检查是否存在缓存文件
  if(file_exists("$newurl/article.html") & $Aid==1 & is_numeric($Aid)){
		$html = file_get_contents("$newurl/article.html");
		echo $html;
		exit;	
  }
   else{
  	if(file_exists("$newurl/article-$Aid.html")&is_numeric($Aid)){
  	$html = file_get_contents("$newurl/article-$Aid.html");
  	echo $html;
		exit;		
	}
}
	ob_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?php echo $webname ?>,<?php echo $webname ?>官方门户网</title>
<meta name="keywords" content="<?php for($u=1;$u <= $ked_times;$u++){echo strip_tags($keywords[$u-1],"").",";} ?>">
<meta name="description" content="<?php echo strip_tags($webseo,""); ?>" />
<link href="<?php echo $lujing ?>/skin/style.css" rel="stylesheet" type="text/css">
<?php echo $webjs; ?>
</head>
<body>
<div class="main">
	<?php include 'head.php';  ?>
  <div class="content-left">
  	<?php
  		@mysql_select_db($sqldb, $con);
  		$qs = "SELECT * FROM article where Aid=$Aid";
  		mysql_query("set names 'gb2312'");
  		$rs = mysql_query($qs, $con);
  		while($row = mysql_fetch_row($rs)){
  				$title=$row[1];
					$tdate=$row[2];
					$tcont=$row[3];
					$tdecs=mb_substr($tcont,0,200,'gb2312');
					$tdecs2=mb_substr($tcont,0,100,'gb2312');
					$tdecs3=mb_substr($tcont,100,100,'gb2312');
  		}
  	
  	?>
    <h1 class="con-title"><?php echo $title.strip_tags($keywords[0],""); ?></h1>
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
    <h2 class="new">【<?php echo strip_tags($keywords[0],""); ?>】最新</h2>
    <div class="newpost">
      <ul>
      	<?php 
     		$qa = "SELECT * FROM article order by Date desc limit 10";
				mysql_query("set names 'gb2312'");
				$ra = mysql_query($qa, $con);
				 while($myrowa=mysql_fetch_array($ra)){
				 	
				 
     ?>
        <div class="list">
          <div class="list-icon"><img src="<?php echo $lujing ?>/skin/0269.jpg" alt="头像"></div>
          <div class="list-topic">
            <div class="list-name"><?php echo mb_substr($myrowa['Title'],0,4,'gb2312'); ?> <span class="list-name-time"><?php  echo $myrowa['Date']; ?></span></div>
            <div class="list-detail"><?php $keid=mt_rand(0, $ked_times);  echo mb_substr($myrowa['Content'],0,60,'gb2312').strip_tags($keywords[$keid],""); ?></div>
          </div>
        </div>
       <?php } ?>
      </ul>
    </div>
  </div>
  <div class="c"></div>
<!-- main End-->
<?php include 'foot.php';  ?>
</body>
</html>
<?php
$out1 = ob_get_contents();
ob_end_clean();
if($Aid != "" & is_numeric($Aid)& $Aid !=1){
$fp = fopen("$newurl/article-$Aid.html","w");
//$out1 = str_replace("skin/style.css","../skin/style.css",$out1);
fwrite($fp,$out1);
fclose($fp);
$html = file_get_contents("$newurl/article-$Aid.html");
echo $html;
exit;
}
else{
$fp = fopen("$newurl/article.html","w");
fwrite($fp,$out1);
fclose($fp);	
$html = file_get_contents("$newurl/article.html");
echo $html;
exit;	
}
?>

