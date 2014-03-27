<?php
error_reporting(0);
require_once "../class/class_creat_str.php";
$rand_type = $_POST['rand_type'];
$rand_url = $_POST['rand_url'];
$nums = $_POST['nums'];
$main_url = $_POST['main_url'];
if($main_url == ""){
	echo "ÇëÌîÈëÖ÷Óò";
	return;	
}
$test = new RAND_STR;
$need = $test->rand_creat($rand_type,$rand_url,$nums);
for($i=0;$i < count($need);$i++){
	$need[$i] = $need[$i].'.'.$main_url;	
}
$nees = implode("\n", $need);  
echo $nees;
?>