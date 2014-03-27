<?php
require_once("../class/class_judge.php");
$iis = $_POST['iis_a'];
//print_r($iis);
$nums = count($iis)-1;
$judge = new JDDATA;
$iis = $judge->judge_add($iis,$nums);
//print_r($iis);
//$write_bat = "iisweb /delete ";
$num = count($iis);
//echo $num;
if($num > 50){
$loop = intval($num/50);
if($num%50 != 0){
	++$loop;	
}
}
//echo $loop;
$write_bat=ARRAY();
$i = 1;
while($i <= $loop){
	$a = ($i-1)*50;
	//echo "a=".$a."\n";
	$ab =$i*50-1;
	//echo "ab=".$ab."\n";
	for($j=$a;$j <= $ab;$j++){
	$write_bat[$i] .= "\"$iis[$j]\" "; 
}	
$i = $i + 1;
}
//print_r($write_bat);
$loop_nums = count($write_bat);
//创建bat文件
for($ii=1;$ii <= $loop_nums;$ii++){
if($write_bat[$ii] !=""){
$file = fopen("../IISBAT/deliis$ii.bat","w");
$write_bat2 = "iisweb /delete ".$write_bat[$ii];
fwrite($file,$write_bat2);
fclose($file);
}
}
for($ii = 1;$ii <= $loop_nums;$ii++){
$writec .= "deliis$ii.bat &&";
}
$filebat = fopen("../IISBAT/deliis.bat","w");
fwrite($filebat,$writec);
fclose($filebat);
echo "请执行deliis.bat";
//@exec("../IISBAT/deliis.bat",$re);
//@echo $re[2]."<br>";
//@echo $re[3]."<br>";
?>