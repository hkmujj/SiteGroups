<?
//error_reporting(0);
set_time_limit(0);
ob_end_flush();
//header("Content-Type:text/htm;charset=utf-8");
require_once("../class/class_db.php");
require_once("../class/class_judge.php");
require_once("../class/class_write_html.php");
require_once("../class/rank_css.php");
require_once("../class/class_copy_dir.php");
require_once('../PHPExcel/Classes/PHPExcel.php');
require_once ('../PHPExcel/reader.php');
require_once('../PHPExcel/Classes/PHPExcel/IOFactory.php');
//接收数据
$step = $_GET['step'];
//echo "<body style=\"font-size:12px;\">";
if($step == 1){
$dbhost = $_POST['dbhost'];
$dbuser = $_POST['dbuser'];
$dbpasswd = $_POST['dbpasswd'];
$nums = $_POST['nums'];
$urls = $_POST['urls'];
$keywords = $_POST['keywords'];
$wname = $_POST['wname'];
$wip = $_POST['wip'];
$urltype = $_POST['urltype'];
$seotype = $_POST['seotype'];
$wstyle = $_POST['wstyle'];
$rewrites = $_POST['rewrites'];
$rewrite_h = $_POST['rewrite_h'];
$rewrite_f = $_POST['rewrite_f'];
$fanyus = $_POST['fanyus'];
$wjs = $_POST['wjs'];
$wsub = $_POST['wsub'];
$wfked = $_POST['wfked'];
$dbr = $_POST['dbr'];
$wdir = $_POST['wdir'];
$channel = $_POST['channel'];
//设置数据
$judge = new JDDATA;
if($fanyus == 0){
	$urltype="";
	$fanyus="CLOSE";	
}
elseif($fanyus == 1){
		$urltype = $judge->judge_add($urltype,$nums);
		$fanyus="OPEN";

}
if($rewrites == 0){
	$rewrite_h = "";
	$rewrite_f = "";
	$rewrites="CLOSE";	
}
elseif($rewrites == 1){
	$rewrite_h = $judge->judge_add($rewrite_h,$nums);
	$rewrite_f = $judge->judge_add($rewrite_f,$nums);	
	$rewrites="OPEN";
}
$seotype = $judge->judge_add($seotype,$nums);
$keywords = $judge->judge_add($keywords,$nums);
for($sens=0;$sens < $nums;$sens++){
	$seotype[$sens]=str_replace("({})",$keywords[$sens],$seotype[$sens]);
}
if(count($wstyle < $nums)){
	$wsn = count($wstyle);
	$wsl = $nums-$wsn;
	for($ws=$wsn;$ws <= $wsl;$ws++){
		$wstyle[$ws] = rand(1,10);	
	}	
}
$wjs = $judge->judge_add($wjs,$nums);
$wsub = $judge->judge_add($wsub,$nums);
$wfked = $judge->judge_add($wfked,$nums);
$dbr = $judge->judge_add($dbr,$nums);
$wname = $judge->judge_add($wname,$nums);
$urls = $judge->judge_add($urls,$nums);
$dbhost = $judge->judge_add($dbhost,$nums);
$dbuser = $judge->judge_add($dbuser,$nums);
$dbr = $judge->judge_add($dbr,$nums);
$dbpasswd = $judge->judge_add($dbpasswd,$nums);
$wdir = $judge->judge_add($wdir,$nums);
$channel = $judge->judge_add($channel,count($channel));
//print_r($seotype);
// 创建一个处理对象实例
$objExcel = new PHPExcel();
// 创建文件格式写入对象实例, uncomment
$objWriter = new PHPExcel_Writer_Excel5($objExcel);    // 用于其他版本格式
//$objWriter = new PHPExcel_Writer_Excel2007($objExcel); // 用于 2007 格式
//$objWriter->setOffice2003Compatibility(true);
//*************************************
//设置文档基本属性
$objProps = $objExcel->getProperties();
$objProps->setCreator("admin");//创建者
$objProps->setLastModifiedBy("test");//最后修改者
$objProps->setTitle("test");
$objProps->setSubject("test");
$objProps->setDescription("test");
$objProps->setKeywords("test");
$objProps->setCategory("test");

//*************************************
//设置当前的sheet索引，用于后续的内容操作。
//一般只有在使用多个sheet的时候才需要显示调用。
//缺省情况下，PHPExcel会自动创建第一个sheet被设置SheetIndex=0
$objExcel->setActiveSheetIndex(0);
$objActSheet = $objExcel->getActiveSheet();
//设置当前活动sheet的名称
$objActSheet->setTitle('Web_config');
//*************************************
//设置单元格内容
//设置标题
$cells_name=array('F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T');
//赋值
$objActSheet->setCellValue('A1', 'WEBDIR');
$objActSheet->setCellValue('B1', 'URL');
$objActSheet->setCellValue('C1', 'IP');
$objActSheet->setCellValue('D1', 'NAME');
$objActSheet->setCellValue('E1', 'SEO');
$objActSheet->setCellValue('F1', 'KEYWORD');
$objActSheet->setCellValue('G1', 'MYSQLUSER');
$objActSheet->setCellValue('H1', 'MYSQLHOST');
$objActSheet->setCellValue('I1', 'MYSQLDB');
$objActSheet->setCellValue('J1', 'MYSQLPASSWD');
$objActSheet->setCellValue('K1', 'STYLE');
$objActSheet->setCellValue('L1', 'REWRITE');
$objActSheet->setCellValue('M1', 'RE_H');
$objActSheet->setCellValue('N1', 'RE_F');
$objActSheet->setCellValue('O1', 'JS');
$objActSheet->setCellValue('P1', 'SUB');
$objActSheet->setCellValue('Q1', 'FLINKEY');
$objActSheet->setCellValue('R1', 'APACHE');
$objActSheet->setCellValue('S1', 'APACHE_');
$objActSheet->setCellValue('T1', 'Channel');

//设置宽度
$objActSheet->getColumnDimension('A')->setWidth(15);
$objActSheet->getColumnDimension('B')->setWidth(15);
$objActSheet->getColumnDimension('C')->setWidth(15);
$objActSheet->getColumnDimension('D')->setWidth(15);
$objActSheet->getColumnDimension('E')->setWidth(15);
$objActSheet->getColumnDimension('F')->setWidth(10);
$objActSheet->getColumnDimension('G')->setWidth(15);
$objActSheet->getColumnDimension('H')->setWidth(15);
$objActSheet->getColumnDimension('I')->setWidth(15);
$objActSheet->getColumnDimension('J')->setWidth(15);
$objActSheet->getColumnDimension('K')->setWidth(15);
$objActSheet->getColumnDimension('L')->setWidth(15);
$objActSheet->getColumnDimension('M')->setWidth(15);
$objActSheet->getColumnDimension('N')->setWidth(10);
$objActSheet->getColumnDimension('O')->setWidth(15);
$objActSheet->getColumnDimension('P')->setWidth(15);
$objActSheet->getColumnDimension('Q')->setWidth(15);
$objActSheet->getColumnDimension('R')->setWidth(15);
$objActSheet->getColumnDimension('S')->setWidth(10);
$objActSheet->getColumnDimension('T')->setWidth(80);

//设置边框
$objStyleA1 = $objActSheet->getStyle('A1');
$objBorderA1 = $objStyleA1->getBorders();  
$objBorderA1->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);  
$objBorderA1->getTop()->getColor()->setARGB('#000000'); // color  
$objBorderA1->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objBorderA1->getBottom()->getColor()->setARGB('#000000'); // color   
$objBorderA1->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objBorderA1->getLeft()->getColor()->setARGB('#000000'); // color    
$objBorderA1->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objBorderA1->getRight()->getColor()->setARGB('#000000'); // color
//$ns=$n1+1;
//$objActSheet->duplicateStyle($objStyleA1,'A1:'.$men.$ns);

//设置字体  
$objFontA1 = $objStyleA1->getFont();  
$objFontA1->setName('微软雅黑');  
$objFontA1->setSize(10);  
$objFontA1->setBold(true);  
//设置单元格样式
$objAlignA1 = $objStyleA1->getAlignment(); 
$objAlignA1->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);  
$objAlignA1->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
//从指定的单元格复制样式信息. 
$objActSheet->duplicateStyle($objStyleA1, 'A1:I1');
//$objActSheet1->duplicateStyle($objStyleA11, 'A1:'.$men."2");
//表格颜色填充
$objStyleD3 = $objActSheet->getStyle('B2');
$objFillD3 = $objStyleD3->getFill();  
$objFillD3->setFillType(PHPExcel_Style_Fill::FILL_SOLID);  
$objFillD3->getStartColor()->setARGB('50C6EFCE');
$objActSheet->duplicateStyle($objStyleD3, 'B2:B'.$nums);
$objStyleE3 = $objActSheet->getStyle('E2');
$objFillE3 = $objStyleE3->getFill();  
$objFillE3->setFillType(PHPExcel_Style_Fill::FILL_SOLID);  
$objFillE3->getStartColor()->setARGB('50EAF1DD');
$objActSheet->duplicateStyle($objStyleE3, 'E2:E'.$nums);
$objStyleF3 = $objActSheet->getStyle('F2');
$objFillF3 = $objStyleE3->getFill();  
$objFillF3->setFillType(PHPExcel_Style_Fill::FILL_SOLID);  
$objFillF3->getStartColor()->setARGB('#FFEB9C');
$objActSheet->duplicateStyle($objStyleE3, 'F2:F'.$nums);
$objStyleF3 = $objActSheet->getStyle('G2');
$objFillG3 = $objStyleE3->getFill();  
$objFillG3->setFillType(PHPExcel_Style_Fill::FILL_SOLID);  
$objFillG3->getStartColor()->setARGB('50C6EFCE');
$objActSheet->duplicateStyle($objStyleE3, 'G2:G'.$nums);
//*************************************
//写入数据
$p=2;
$channell =	implode(',',$channel);
$objActSheet->setCellValue('T'.$p, $channell);
for($i=1;$i <= $nums;$i++){
	$ii = $i - 1;
		$objActSheet->setCellValue('A'.$p, $wdir[$ii]);
		if($urltype[$ii] != ""){
		$objActSheet->setCellValue('B'.$p, $urltype[$ii].".".$urls[$ii]);
	}
	else{$objActSheet->setCellValue('B'.$p, $urls[$ii]);}
		$objActSheet->setCellValue('C'.$p, $wip[$ii]);
		$objActSheet->setCellValue('D'.$p, $wname[$ii]);
		$objActSheet->setCellValue('E'.$p, $seotype[$ii]);
		$objActSheet->setCellValue('F'.$p, $keywords[$ii]);
		$objActSheet->setCellValue('G'.$p, $dbuser[$ii]);
		$objActSheet->setCellValue('H'.$p, $dbhost[$ii]);
		$objActSheet->setCellValue('I'.$p, $dbr[$ii]);
		$objActSheet->setCellValue('J'.$p, $dbpasswd[$ii]);
		$objActSheet->setCellValue('K'.$p, $wstyle[$ii]);
		$objActSheet->setCellValue('L'.$p, $rewrites);
		$objActSheet->setCellValue('M'.$p, $rewrite_h[$ii]);
		$objActSheet->setCellValue('N'.$p, $rewrite_f[$ii]);
		$objActSheet->setCellValue('O'.$p, $wjs[$ii]);
		$objActSheet->setCellValue('P'.$p, $wsub[$ii]);
		$objActSheet->setCellValue('Q'.$p, $fked[$ii]);
		$objActSheet->setCellValue('R'.$p, $fanyus);
		$objActSheet->setCellValue('S'.$p, $urltype[$ii]);
		$p++;
}
$file = "../EXCEL/"; 
if(!file_exists($file)){
	mkdir($file);	
}
$file = '../EXCEL/'. date("YmdGis").'.xls';
$objWriter->save($file);
echo "创建EXCEL($file)成功,点击确认开始创建网站，创建网站的配置已全部写入该EXCEL文件中，创建完成后请删除EXCEL目录下的所有文件，如有需要请手动备份该EXCEL文件";
flush();
}
//创建网站代码开始
//2014-03-03修改加入进度条
if($step == 2){
	echo '<script src="../js/jquery-1.10.2.min.js"></script><style>.out_side{width:630px;height:108px;border:#A8A8A6 solid 1px;}.out_side h1{width:100%;height:20px;font-size:15px;text-align:center;background:#A8A8A6;margin-top:0px;font-family:"Microsoft YaHei";}#loading{width:20%;background:blue;height:20px;}.load_table{font-size:13px;font-family:"Microsoft YaHei";}#loading_det{width:100%;height:auto;}</style><div class="out_side"><h1>创建进度</h1><div id="loading"></div><table class="load_table"><tr><td>进度信息：</td><td id="loading_jiuxu">就绪</td></tr><tr><td colspan="2"><div id="loading_det">详细进度</div></td></tr></table></div>';
	flush();
	$exclefile = $_GET['file'];
	$nums = $_GET['nums'];
	$exclefile = "../EXCEL/".$exclefile;
	//echo $nums;
	//EchoJQ("loading","0",2);
	echo '<script>$("#loading").css("width","0%");</script>';
  flush();
	$fpro = 0;
	for($i=1;$i <= $nums;$i++){
     //从文档中取值
     echo '<script>$("#loading_jiuxu").html("正在从文档中提取第'.$i.'个网站数据");</script>';
     flush();
	   $data = new Spreadsheet_Excel_Reader();
     $data->setOutputEncoding('gb2312');
     $data->read($exclefile);
     $xy=$i+1;
	  $data2=$data->sheets[0]['cells'][$xy];
	  $wurl=$data2[2];
	  $wurl=str_replace("http://","",$wurl);
	  $wwip=$data2[3];
	  $wname=$data2[4];
	  $wseo=$data2[5];
	  $wked=$data2[6];
	  $wuser=$data2[7];
	  $wsql=$data2[8];
	  $wsqlb=$data2[9];
	  $mima=$data2[10];
	  $wstyle=$data2[11];
	  $wjtq=$data2[13];
	  $wjth=$data2[14];
	  $wjtk=$data2[12];
	  if($wjtk == "OPEN"){
	    $wjtk = 1;
	  }
	  else{
	  	$wjtk =0;	
	  }
	  $jsaddr=$data2[15];
	  $wsub=$data2[16];
	  $flinkey=$data2[17];
	  $channel=$data2[20];
	  $apaches=$data2[18];
	  $apache=$data2[19];
	  $wdir_root = $data2[1];
	  $wdir=$data2[1]."/".$wurl."/";
	  $wdir=str_replace("//","/",$wdir);
	  $wdir=str_replace("///","/",$wdir);
	  $iiswdir=str_replace("/","\\",$wdir);
	  $loading = ($i/$nums)*90;
	  echo '<script>$("#loading").css("width","'.$loading.'%");</script>';
	 	echo '<script>$("#loading_jiuxu").html("正在创建第'.$i.'个网站目录");</script>';
     flush();
	//创建目录
	  if(mkdir($wdir,0777,true)){
	  	if(mkdir($wdir."/skin/",0777,true)){
		      echo '<script>$("#loading_jiuxu").html("创建第'.$i.'个网站目录--成功");</script>';
		      flush();
		      if(!is_writable($wdir)){
  				echo '<script>$("#loading_jiuxu").html("目录不可写，网站目录创建失败");</script>';
  				flush();
  			}	
  			else{
  			//创建网站文件
  			$loading = ($i/$nums)*92;
	  		echo '<script>$("#loading").css("width","'.$loading.'%");</script>';
  			echo '<script>$("#loading_jiuxu").html("正在分配第'.$i.'个网站文件");</script>';
  			flush();
  			$code = '../code/';
  			$wconfig=$wdir."/skin/config.php";
  			$wjt_file=$wdir."/httpd.ini";
  			$wwcss=$wdir."/skin/style.css";
  			$wwindex=$wdir."/index.php";
  			$wlogo=$code."logo.jpg";
  			$wbanner=$code."banner.jpg";
  			$wwlogo=$wdir."/skin/logo.jpg";
  			$wwbanner=$wdir."/skin/banner.jpg";
  			$wwbanner2=$wdir."/skin/templatemo_header.png";
  			$wwtouxiang=$wdir."/skin/0269.jpg";
  			//绑定IIS
  			$loading = ($i/$nums)*93;
	  		echo '<script>$("#loading").css("width","'.$loading.'%");</script>';
  			echo '<script>$("#loading_jiuxu").html("正在分配第'.$i.'个IIS内容");</script>';
  			flush();
  			
  			//向文件写入内容
  			//判断写入内容
  			echo '<script>$("#loading_jiuxu").html("正在判断并写入第'.$i.'个网站内容");</script>';
  			flush();
  			if(!empty($wname)){
  		  	$wwname=$wname;	
  		  }
  		  else{
  		  	$wwname="默认名称";
  		  	echo '<script>$("#loading_det").html("第'.$i.'使用默认名称，请在目录'.$wdir.'/skin/下的配置文件中手动写入");</script>';
  		  	flush();	
  		  }
  			if(!empty($wstyle)){
  			$wcss=$code."style".$wstyle.".css";
  		 }
  		  else{
  			$wcss=$code."style1.css";	
  		 }
  		 //伪静态前缀
  		 if(!empty($wjtq)){
  			$wwjtq=$wjtq;
  		 }
  		  else{
  			$wwjtq="ylc";	
  		 }
  		  //伪静态后缀
  		 if(!empty($wjth)){
  			$wwjth=$wjth;
  		 }
  		  else{
  			$wwjth="yule";	
  		 }
  		  //是否开启伪静态
  		  if(!empty($wjtk)){
  			$wwjtk=$wjtk;
	  			if($wwjtk="OPEN"){
	  				$wwjtk = 1;
	  			}
	  			else{
	  				echo 	'<script>$("#loading_det").html("第'.$i.'网站设定关闭伪静态,请在'.$wdir.'/skin/下的配置文件中手动更改");</script>';	
	  				flush();
	  			}
  		 }
  		  else{
  			$wwjtk=0;	
  			echo 	'<script>$("#loading_det").html("第'.$i.'网站设定关闭伪静态,请在'.$wdir.'/skin/下的配置文件中手动更改");</script>';	
	  		flush();
  		 }
  		 	$loading = ($i/$nums)*95;
	  		echo '<script>$("#loading").css("width","'.$loading.'%");</script>';
	  		flush();
  		 //JS网址
  		 if(!empty($jsaddr)){
  		  	$wjsaddr="<script language=javascript src=".$jsaddr."></script>";	
  		  }
  		  else{
  		  	$wjsaddr="<script language=javascript src= ></script>";
  		  }
  		 //友情链接
  		 if(!empty($flinkey)){
  		  	$wflinkey=$flinkey;	
  		  }
  		  else{
  		  	$wflinkey="娱乐城";
  		  }
  		  
  		  if(!empty($wuser)){
  		  	$wwuser=$wuser;	
  		  }
  		  else{
  		  	$wwuser="root";
  		  }
  		  if(!empty($wsql)){
  		  	$wwsql=$wsql;	
  		  }
  		  else{
  		  	$wwsql="localhost";
  		  }
  		  if(!empty($mima)){
  		  	$wmima=$mima;	
  		  }
  		  else{
  		  	$wmima="";
  		  }
  		 if(!empty($wked)){
  		  	$wwked=$wked;
         }
         else{
         	$wwked="默认关键字";
  		  }
  		  if(!empty($wsqlb)){
  		  	$wwsqlb=$wsqlb;	
  		  }
  		  else{
  		  	$wwsqlb="_wweb";
  		  }
  		  //链接数据库写入友情链接
  		  echo 	'<script>$("#loading_det").html("第'.$i.'网站准备写入友情链接库");</script>';	
	  		flush();
  		  $consql = mysql_connect($wwsql,$wwuser,$wmima);
  		  if (!$consql){
  		  	echo '<script>$("#loading_det").html("第'.$i.'网站数据库连接出错");</script>';
  		  	flush();	
  		  }
  		  else{
  		  	//判断是否存在数据库
  		  $loading = ($i/$nums)*96;
	  		echo '<script>$("#loading").css("width","'.$loading.'%");</script>';
	  		flush();
  		  	$ttt = mysql_select_db($wwsqlb, $consql);
  		  	if($ttt != 1){
  		    //创建数据库
  		  	echo '<script>$("#loading_det").html("正在创建数据库");</script>';
  		  	flush();
  		  	if (mysql_query("CREATE DATABASE $wwsqlb",$consql)){
  		  		echo '<script>$("#loading_det").html("数据库'.$wwsqlb.'");</script>';
					  flush();
					//创建数据库表
					echo '<script>$("#loading_det").html("正在创建数据表");</script>';
					flush();
					mysql_select_db($wwsqlb, $consql); //ALTER TABLE `dede_arcmulti` ADD UNIQUE (`ordersql` );

					$sql = "CREATE TABLE Article (
						Aid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
						Title varchar(200) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL,
						Date DATE,
						Content mediumtext CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL,
						Channel_id int
						)";
						mysql_query($sql);
							$sql = "CREATE TABLE Flink 
						(
						Fid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
						Fname varchar(100) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL,
						Furl varchar(200) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL,
						Keywords char(100) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL,
						Fpro int
						)";
						mysql_query($sql,$consql);
						$sql = "CREATE TABLE Channel 
						(
						Cid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
						Cname varchar(100) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL
						)";
						mysql_query($sql,$consql);
						echo '<script>$("#loading_det").html("数据表创建成功");</script>';
						flush();
				}
					else{
					  echo '<script>$("#loading_det").html("创建数据库'.$wwsqlb.'失败");</script>';
					   flush();
				}	  		 
  		  }
  		  $loading = ($i/$nums)*98;
	  		echo '<script>$("#loading").css("width","'.$loading.'%");</script>';
	  		flush();
  		  if($i%8 == 0){
  		  	++$fpro;	
  		  }
  		  mysql_select_db($wwsqlb, $consql);
  		  	$furl="http://".$wurl;
  		  	mysql_query("SET NAMES gb2312");
  		  	mysql_query("insert into flink(Fid,Fname,Furl,Keywords,Fpro) values(null,'$wwname','$furl','$wwked',$fpro)");
  		  mysql_close($consql);
  		}
  		  if(!empty($wseo)){
  		  	$wwseo=$wseo;	
  		  }
  		  else{
  		  	$wwseo=$wwked."默认";
  		  }
  		  if(!empty($wsub)){
  		  	$wwsub=$wsub;	
  		  }
  		  else{
  		  	echo '<script>$("#loading_det").html("第'.$i.'个网站无统计代码，请在配置文件中更改");</script>';
  		  	flush();
  		  }
  			//写配置文件
  			$file_con="<?php \$wjtqz=\"$wwjtq\";\$fpro=$fpro;\$wjthz=\"$wwjth\";\$wjtk=\"$wwjtk\";\$webjs=\"$wjsaddr\";\$wflinkeys=\"$wflinkey\"; \$keywords=\"$wwked\";	\$webname=\"$wwname\";	\$weburl=\"$wurl\";	\$webhost=\"$wdir\";	\$sqluser=\"$wwuser\";	\$sqlmima=\"$wmima\";	\$sqlhost=\"$wwsql\";	\$webstyle=\"$wcss\";	\$webseo=\"$wwseo\";	\$websub=\"$wwsub\";	\$sqldb=\"$wwsqlb\"; \$xulie=$i;	\$con = mysql_connect(\"$wwsql\",\"$wwuser\",\"$wmima\");?>";
  			//echo "正在创建首页......";
  			//flush();
  			include("../class/inc_replace_code.php");
  			$write = new WHTML;
  			$ornot = $write->write($index_file_content,$wwindex,"GB2312");	
  			if($ornot)
  			echo '<script>$("#loading_det").html("第'.$i.'个网站正在创建首页--成功");</script>';
  			else
  				echo '<script>$("#loading_det").html("第'.$i.'个网站正在创建首页--失败");</script>';
  			flush();
  			echo '<script>$("#loading_det").html("第'.$i.'个网站正在创建样式表");</script>';
  			flush();
  			$file_of_css =$wdir."/".$replace_css_file;
  			$ornot_css = $write->write($css_file,$file_of_css,"GB2312");
  			if($ornot_css)
  			echo '<script>$("#loading_det").html("第'.$i.'个网站正在创建样式表--成功");</script>';
  			else
  				echo '<script>$("#loading_det").html("第'.$i.'个网站正在创建首页--失败");</script>';	
  			flush();
  			//echo "正在创建友情链接TXT文件......<br>";
  			//flush();
  			$flink_txt = $wdir."flink.txt";
  			if(fopen($flink_txt,'w'))
  			echo '<script>$("#loading_det").html("第'.$i.'个网站正在创建友情链接TXT文本--成功");</script>';
  			else
  			echo '<script>$("#loading_det").html("第'.$i.'个网站正在创建友情链接TXT文本--失败");</script>';
  			flush();
  			fclose($flink_txt);
  			
  			if(copy($wlogo,$wwlogo)){
  				echo '<script>$("#loading_det").html("第'.$i.'个网站LOGO创建成功");</script>';
  				flush();
  			}
  			else{
  				echo '<script>$("#loading_det").html("第'.$i.'个网站LOGO创建失败");</script>';
  				flush();
  			}
  			if(copy($wbanner,$wwbanner)){
  				echo '<script>$("#loading_det").html("第'.$i.'个网站BANNER创建成功");</script>';
  				flush();
  			}
  			else{
  				echo '<script>$("#loading_det").html("第'.$i.'个网站LOGO创建失败");</script>';
  				flush();
  			}
  			$file_config = fopen($wconfig,"w");
  			echo '<script>$("#loading_det").html("第'.$i.'个网站配置文件创建成功");</script>';
  			flush();
  		  flock($file_config,LOCK_EX);
  		  fwrite($file_config,$file_con);
  		  flock($file_config,LOCK_UN);
  		  fclose($file_config);
  		  
  		  
  		  	//写入伪静态文件
  			$wjt_cont="[ISAPI_Rewrite]\n RepeatLimit 32\n RewriteRule ^/$wwjtq-(.+)\\$wwjth\\?*(.*)\$ /index\\.php\\?page=\$1";
  			$file_wjt = fopen($wjt_file,"w");
  			//echo "√ 网站".$i."(".$wwname.")伪静态文件创建成功<br><br>";
  			flush();
  		  flock($file_wjt,LOCK_EX);
  		  fwrite($file_wjt,$wjt_cont);
  		  flock($file_wjt,LOCK_UN);
  		  fclose($file_wjt);
  		  $cd = new COPYDIR;
  		  $f = $cd->copy_dir($file_so, $file_to, 1);
  			 //绑定IIS
  			//服务器不兼容，改为cscript.exe adsutil.vbs
  			 $iis_contents .= "@echo off\n iisweb /create $iiswdir \"$wurl\" /d $wurl | findstr \"W3SVC\" > log.log\n for /f \"tokens=2 delims=/\" %%a in (log.log) do (\n set c1=%%a\n )\n echo %c1%\n \nc: & cd C:\\Inetpub\\AdminScripts\n cscript.exe adsutil.vbs set  w3svc/%c1%/enabledefaultdoc true\n cscript.exe adsutil.vbs set  w3svc/%c1%/defaultdoc index.php\n cscript.exe adsutil.vbs set w3svc/%c1%/root/accessread true\n cscript.exe adsutil.vbs set w3svc/%c1%/root/enabledefaultdoc true\n cscript.exe adsutil.vbs set w3svc/%c1%/root/accessscript true\n cscript.exe adsutil.vbs set w3svc/%c1%/root/ip address $wwip\n cscript.exe adsutil.vbs set w3svc/%c1%/root/appfriendlyName \"DefaultAppPool\"\n cscript.exe adsutil.vbs //Nologo //T:60 set W3SVC/%c1%/Root/AuthFlags 5\n";
  		  }
	     }
	     else{
	     	  echo '<script>$("#loading_det").html("第'.$i.'个网站图片文件夹创建失败");</script>';
	     	  flush();
	     	}
	  }else{
		echo '<script>$("#loading_det").html("第'.$i.'个网站创建失败");</script>';
		flush();
	 }
	 //复制头像文件夹
	 			 $loading = ($i/$nums)*99;
	  		echo '<script>$("#loading").css("width","'.$loading.'%");</script>';
  		  echo '<script>$("#loading_det").html("正在复制第'.$i.'个网站图片文件夹");</script>';
  			 flush();
  		  $file_so = "../img/imgs";
  		  $file_to = $wdir."/imgs";
  		  //$imgs_root = fopen($file_to,'w');
  		  $f = $cd->copy_dir($file_so, $file_to, 1);
  		  if($f)
  		  echo '<script>$("#loading_det").html("正在复制第'.$i.'个网站图片文件夹--成功");</script>';
  		  else
  		 echo '<script>$("#loading_det").html("正在复制第'.$i.'个网站图片文件夹--失败");</script>';
  		  $loading = ($i/$nums)*100;
	  		echo '<script>$("#loading").css("width","'.$loading.'%");</script>';
  		  flush();
}	
//主循环结束
  		  //copy("../test/index.php",$wdir_root."/index.php");泛站支持
  		   echo '<script>$("#loading_det").html("正在创建BAT文件");</script>';
  			 flush();
$iis_file_name = "../IISBAT/creat".date("YmdGis").".bat";
  			 //$iis_file = fopen($iis_file_name,'w');
  			 //fclose($iis_file);
  			 $iis_file = fopen($iis_file_name,'a');
  			 fwrite($iis_file,$iis_contents);
  			 echo '<script>$("#loading_det").html("BAT文件创建完成");</script>';
  			 flush();
 echo '<script>$("#loading_det").html("全部网站创建完成");</script>';
 echo '<script>$("#loading_jiuxu").html("全部网站创建完成");</script>';
flush();
}
?>
