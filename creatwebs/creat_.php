<?
//error_reporting(0);
header("Content-Type:text/htm;charset=utf-8");
require_once("../class/class_db.php");
require_once("../class/class_judge.php");
require_once('../PHPExcel/Classes/PHPExcel.php');
require_once('../PHPExcel/Classes/PHPExcel/IOFactory.php');
//接收数据
$dbhost = $_POST['dbhost'];
$dbuser = $_POST['dbuser'];
$dbpasswd = $_POST['dbpasswd'];
$nums = $_POST['nums'];
$urls = $_POST['urls'];
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
echo "正在处理数据......";
//设置数据
$judge = new JDDATA;
if($fanyus == 0){
	$urltype="";	
}
elseif($fanyus == 1){
		$urltype = $judge->judge_add($urltype,$nums);

}
if($rewrites == 0){
	$rewrite_h = "";
	$rewrite_f = "";	
}
elseif($rewrites == 1){
	$rewrite_h = $judge->judge_add($rewrite_h,$nums);
	$rewrite_f = $judge->judge_add($rewrite_f,$nums);	
}
$seotype = $judge->judge_add($seotype,$nums);
$wstyle = $judge->judge_add($wstyle,$nums);
$wjs = $judge->judge_add($wjs,$nums);
$wsub = $judge->judge_add($wsub,$nums);
$wfked = $judge->judge_add($wfked,$nums);
$dbr = $judge->judge_add($dbr,$nums);
$keywords = $judge->judge_add($keywords,$nums);
$urls = $judge->judge_add($urls,$nums);
$dbhost = $judge->judge_add($dbhost,$nums);
$dbuser = $judge->judge_add($dbuser,$nums);
$dbr = $judge->judge_add($dbr,$nums);
$dbpasswd = $judge->judge_add($dbpasswd,$nums);
echo "正在设置数据.........";
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
echo "正在创建EXCEL属性.....";

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
echo "正在写入数据......";
//写入数据
$p=2;
for($i=1;$i < $nums;$i++){
	$ii = $i - 1;
		$objActSheet->setCellValue('A'.$p, $wdir[$ii]);
		$objActSheet->setCellValue('B'.$p, $urls[$ii]);
		$objActSheet->setCellValue('C'.$p, $wip[$ii]);
		$objActSheet->setCellValue('D'.$p, $wname[$ii]);
		$objActSheet->setCellValue('E'.$p, $seotype[$ii]);
		$objActSheet->setCellValue('F'.$p, $keywords[$ii]);
		$objActSheet->setCellValue('G'.$p, $dbuser[$ii]);
		$objActSheet->setCellValue('H'.$p, $dbhost[$ii]);
		$objActSheet->setCellValue('I'.$p, $dbr[$ii]);
		$objActSheet->setCellValue('J'.$p, $dbpasswd[$ii]);
		$objActSheet->setCellValue('K'.$p, $wstyle[$ii]);
		$objActSheet->setCellValue('L'.$p, $rewrite_h[$ii]);
		$objActSheet->setCellValue('M'.$p, $rewrite_f[$ii]);
		$objActSheet->setCellValue('N'.$p, $rewrites);
		$objActSheet->setCellValue('O'.$p, $wjs[$ii]);
		$objActSheet->setCellValue('P'.$p, $wsub[$ii]);
		$objActSheet->setCellValue('Q'.$p, $fked[$ii]);
		$objActSheet->setCellValue('R'.$p, $fanyus);
		$objActSheet->setCellValue('S'.$p, $urltype[$ii]);
		$p++;
}
//导出
//header('Content-Type: application/vnd.ms-excel; charset=utf-8');  
//header("Content-Disposition: attachment;filename=$outputFileName");  
//header('Cache-Control: max-age=0');  
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
//$objWriter->save('php://output');  
$file = 'excel.xls';
$objWriter->save($file);
echo "创建EXCEL成功";
exit; 
?>
