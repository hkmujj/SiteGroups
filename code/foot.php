<div class="link c">
  <p class="link_tit">友情链接</p>
  <ul>
    <?php  
    	$qb = "SELECT * FROM flink where fpro=$fpro";
				mysql_query("set names 'gb2312'");
				$rb = mysql_query($qb, $con);
				 while($myrowb=mysql_fetch_array($rb)){
    	?>
      <li><a href="<?php  echo $myrowb['Furl'];    ?>" target='_black'><?php echo $myrowb['Fname'];  ?></a></li>
      <?php  } ?>
      
      <?php  //随机选取
    	$qb = "SELECT * FROM flink where Keywords Like '%".$keywords."%' limit 3";
				mysql_query("set names 'gb2312'");
				$rb = mysql_query($qb, $con);
				 while($myrowb=mysql_fetch_array($rb)){
    	?>
      <li><a href="<?php  echo $myrowb['Furl'];    ?>" target='_black'><?php echo $myrowb['Fname'];  ?></a></li>
      <?php  } ?>
  </ul>
</div>
<!-- Foot Start-->
<div id="footer">
  <p>Copyright  2013 <?php echo $weburl; ?> All Rights Reserved.</p>
  <p><?php echo $websub; ?></p>
</div>