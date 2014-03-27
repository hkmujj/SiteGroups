<style>
	.nav {width: 100%;margin-top: 5px;margin-bottom: 5px;overflow: hidden;background: #efefef;}
	.nav_head {float: left;line-height: 24px;text-align: center;background: #efefef;padding: 0 20px;width: 80px;}
	.nav_a {font-size: 16px;color: #000;width: 47px;height: 20px;text-decoration: none;font-family:"Î¢ÈíÑÅºÚ","microsoft yahei";}
	.nav_a:hover{color:red;text-decoration:underline;}
</style>
<div id="logo">
  <h1><a href="<?php echo "http://".$weburl;?>"><?php if($ked_times >=2){ echo $webname.",".strip_tags($keywords[1],"");}else{echo $webname.",".strip_tags($keywords[0],"");} ?></a></h1>

<div class="nav">
	<li class="nav_head"><a class="nav_a" href="<?php echo "http://".$weburl;?>">Ê×Ò³</a></li>
<?php
  @mysql_select_db($sqldb, $con);
  $qsc = "SELECT * FROM channel limit 24";
  mysql_query("set names 'gb2312'");
  $rssc = mysql_query($qsc, $con);
  $numsc = mysql_num_rows($rssc);
  while($rowc = mysql_fetch_row($rssc)){
  	echo "<li class=\"nav_head\"><a class=\"nav_a\" href=\"channel.php?cid=$rowc[0]\">$rowc[1]</a></li>";	
  }
?>

</div>

</div>