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
	$objActSheet->getDefaultStyle()->getFont()->setName('����');

	$objActSheet->getColumnDimension('F')->setWidth(20);
	$objActSheet->getColumnDimension('G')->setWidth(20);

	$objActSheet->setCellValue('A1',iconv('gbk','utf-8','����'));
	$objActSheet->setCellValue('B1',iconv('gbk','utf-8','����'));
	$objActSheet->setCellValue('C1',iconv('gbk','utf-8','����'));
	$objActSheet->setCellValue('D1',iconv('gbk','utf-8','�Ա�'));
	$objActSheet->setCellValue('E1',iconv('gbk','utf-8','����'));
	$objActSheet->setCellValue('F1',iconv('gbk','utf-8','�ֻ�'));
	$objActSheet->setCellValue('G1',iconv('gbk','utf-8','ѧ��'));
	$objActSheet->setCellValue('H1',iconv('gbk','utf-8','У��'));
	$objActSheet->setCellValue('I1',iconv('gbk','utf-8','ѧԺ'));
	$objActSheet->setCellValue('J1',iconv('gbk','utf-8','��λ'));
	$objActSheet->setCellValue('K1',iconv('gbk','utf-8','�Ŷ�'));
	$objActSheet->setCellValue('L1',iconv('gbk','utf-8','����'));
	$objActSheet->setCellValue('M1',iconv('gbk','utf-8','ְ����'));
?>
