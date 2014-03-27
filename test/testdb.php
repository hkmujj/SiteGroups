<?php
	$dbhost = $_POST["dbhost"];
	$dbuser = $_POST["dbuser"];
	$dbpasswd = $_POST["dbpasswd"];
	$dbr = $_POST['dbr'];
	$con = @mysql_connect($dbhost,$dbuser,$dbpasswd);
	if($con){
		echo "数据库连接成功\n";
	$eer = 0;
	$erro = array();
	if(is_array($dbr)){
	for($i=0;$i < count($dbr);$i++){
		$iff = @mysql_select_db($dbr[$i],$con);
		if($iff == 1){	
			++$eer;
			$erro[$i] = $dbr[$i];
		}
	}
}
else{
		$iff = @mysql_select_db($dbr,$con);
		if($iff == 1){
			++$eer;
			$erro[0] = $dbr;	
		}
}
	if($eer != 0){
		echo "以下数据库已存在，请确认其结构符合要求，否则将会创建失败！\n";
		print_r($erro);
		echo "\n";	
	}
	elseif($eer == 0){
		echo "数据库不存在，将新建数据库！";	
	}
	}
	else{
		echo "数据库连接失败,请检查数据库配置！\n";	
	}
?>