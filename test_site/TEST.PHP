<?PHP
	require_once("fuzhi.php");
	$c = new COPYDIR;
	$file1 = "imgs";
	$file2 = "imgs2";
	$f = $c->copy_dir($file1, $file2, 1);
	echo $f;
?>