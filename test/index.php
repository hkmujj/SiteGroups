<?php
	//ศกำ๒ร๛ฃฌลไึรอ๘ีพ
  $newurl =  $_SERVER["HTTP_HOST"];
	$newurl = str_replace("http://","",$newurl);
	$newurl = str_replace("/","",$newurl);
	$urls = explode(".",$newurl);
	$nums = count($urls);
	//echo $newurl;
	$url = "http://a.".$urls[($nums-2)].".".$urls[($nums-1)]."/".$newurl;
	$html = file_get_contents($url);
	echo $html;


?>