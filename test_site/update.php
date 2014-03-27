<?php
set_time_limit(0);
	$con = mysql_connect("localhost","root","rong");
	mysql_select_db("test22", $con);
	mysql_query("set names 'GB2312'",$con); 
	$result = mysql_query("SELECT * FROM article");
	while($row = mysql_fetch_array($result))
  {
  	$tcont = $row['Content'];
  	//$contents = str_replace('{<ked>}','',$tcont);

  	$ked_times = 1;
  	$keywords = "{<ked>}";
  	$strlen = mb_strlen($tcont, "gb2312"); 
  	$in = mt_rand(0, $strlen); 
  	$str_new = mb_substr($tcont, 0, $in, "gb2312").$keywords.mb_substr($tcont, $in, $strlen-$in, "gb2312"); 
  	$tcont=$str_new;
  	
  	$id = $row['Aid'];
  	echo $tcont;
  	mysql_query("UPDATE article SET Content='$tcont' WHERE Aid=$id");
  	//mysql_query("DELETE FROM article  WHERE Aid=$id");
  }

mysql_close($con);
?>