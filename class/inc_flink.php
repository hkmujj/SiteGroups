<?php
/*********************  ԭ���������滻���룬��ȡ�ļ�����Ϊ��������*****************************************************/
	$flink_content = file_get_contents("flink.txt");
	$flink_array = explode("\n",$flink_content);
	for($fllo=0;$fllo < count($flink_array);$fllo++){
		$flink_unames = explode('{}',$flink_array[$fllo]);	
		if($flink_unames[0] != "" & $flink_unames[1] != ""){
			echo ' <li><a href="'.$flink_unames[1].'" target="_blank" >'.$flink_unames[0].'</a></li>';	
		}
		
	}
	/************************** �����������滻���룬�����ݿ�����ȡ*********************************************************/
	$qb = "SELECT * FROM flink where fpro=$fpro";
				mysql_query("set names 'gb2312'");
				$rb = mysql_query($qb, $con);
				 while($myrowb=mysql_fetch_array($rb)){	
				 	$fk_l = $myrowb['Furl'];
				 	$fk_n = $myrowb['Fname'];
				 	echo ' <li><a href="'.$fk_l.'" target="_blank" >'.$fk_n.'</a></li>';		
				 }


?>