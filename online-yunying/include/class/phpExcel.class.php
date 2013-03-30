<?
	$filename=date("YmdGis");
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment;filename=".$filename.".xls");
	header("Expires:0");

	require_once("../PHPExcel.php");
	require_once("../PHPExcel/IOFactory.php");

	// 
	$objPHPExcel=new PHPExcel();

	$objPHPExcel->getProperties()->setCreator("Jason");
	$objPHPExcel->getProperites()->setLastModifiedBy($_SESSION['username']);

	$objPHPExcel->createSheet();
	$objPHPExcel->setActiveSheetIndex(0);

	// getActiveSheet
	$objActSheet=$objPHPExcel->getActiveSheet();

	$objActSheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	$objActSheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
	$objActSheet->getHeaderFooter()->setOddFooter( '&C &P /&N');
	$objActSheet->getDefaultStyle()->getFont()->setName('宋体');

	$objActSheet->getColumnDimension('F')->setWidth(20);
	$objActSheet->getColumnDimension('G')->setWidth(20);

	$objActSheet->setCellValue('A1',iconv('gbk','utf-8','姓名'));
	$objActSheet->setCellValue('B1',iconv('gbk','utf-8','年龄'));
	$objActSheet->setCellValue('C1',iconv('gbk','utf-8','生日'));
	$objActSheet->setCellValue('D1',iconv('gbk','utf-8','性别'));
	$objActSheet->setCellValue('E1',iconv('gbk','utf-8','邮箱'));
	$objActSheet->setCellValue('F1',iconv('gbk','utf-8','手机'));
	$objActSheet->setCellValue('G1',iconv('gbk','utf-8','学号'));
	$objActSheet->setCellValue('H1',iconv('gbk','utf-8','校区'));
	$objActSheet->setCellValue('I1',iconv('gbk','utf-8','学院'));
	$objActSheet->setCellValue('J1',iconv('gbk','utf-8','单位'));
	$objActSheet->setCellValue('K1',iconv('gbk','utf-8','团队'));
	$objActSheet->setCellValue('L1',iconv('gbk','utf-8','部门'));
	$objActSheet->setCellValue('M1',iconv('gbk','utf-8','职务组'));
?>
