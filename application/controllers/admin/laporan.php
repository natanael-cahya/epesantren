<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


		$this->load->model('m_guru');
		$this->load->model('m_kamar');
		$this->load->model('m_extra');
		$this->load->model('m_konsulat');
		$this->load->model('m_pelanggaran');
		$this->load->model('m_dsantri');
		$this->load->model('M_tahfidz');
		$this->load->model('m_kelas');
	}


	public function export_kamar()
	{
		$ur = $this->uri->segment(4);
		$this->db->where('tb_kamar.gender=', $ur);
		$kamar = $this->m_kamar->get_Akamar();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('WebDev-K')
			->setLastModifiedBy('WebDev-K')
			->setTitle('Office 2019 XLSX Test Document')
			->setSubject('Office 2019 XLSX Test Document')
			->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
			->setKeywords('office 2019 openxml php')
			->setCategory('Test result file');

		$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		$drawing->setName('logo');
		$drawing->setDescription('logo');
		$drawing->setPath('assets/img/logo.jpg'); // put your path and image here
		$drawing->setCoordinates('B2');
		$drawing->setWidthAndHeight(130, 130);
		//$drawing->setOffsetX(110);
		//$drawing->setRotation(25); untuk miringnye
		$drawing->getShadow()->setVisible(true);
		$drawing->getShadow()->setDirection(45);
		$drawing->setWorksheet($spreadsheet->getActiveSheet());
		$spreadsheet->getActiveSheet()->getStyle("C3:G3")->getFont()->setSize(20);
		$spreadsheet->getActiveSheet()->getStyle("C4:G4")->getFont()->setSize(14);
		$spreadsheet->getActiveSheet()->getStyle("A9:E9")->getFont()->setSize(15);
		$spreadsheet->getActiveSheet()->mergeCells("C3:G3");
		$spreadsheet->getActiveSheet()->mergeCells("C4:G4");
		$spreadsheet->getActiveSheet()->mergeCells("A9:E9");
		$spreadsheet->getActiveSheet()->getStyle('A9:G9')->getAlignment()->setHorizontal('center');
		$spreadsheet->getActiveSheet()->getStyle('A10:G10')->getAlignment()->setHorizontal('center');


		$spreadsheet->getActiveSheet()->getStyle('A10:E10')
			->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
		$spreadsheet->getActiveSheet()->getStyle('A9:E9')
			->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
		$spreadsheet->getActiveSheet()->getStyle('A10:E1')
			->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:E10')
			->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:E10')
			->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:E10')
			->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:E10')
			->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
		$spreadsheet->getActiveSheet()->getStyle('A9:E9')
			->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
		$spreadsheet->getActiveSheet()->getStyle('A10:E10')
			->getFill()->getStartColor()->setARGB('FFFF0000');
		$spreadsheet->getActiveSheet()->getStyle('A9:E9')
			->getFill()->getStartColor()->setARGB('FFFF0000');


		$spreadsheet->getSheet(0)->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getSheet(0)->getColumnDimension('B')->setWidth(25);
		$spreadsheet->getSheet(0)->getColumnDimension('C')->setWidth(20);
		$spreadsheet->getSheet(0)->getColumnDimension('D')->setWidth(30);
		$spreadsheet->getSheet(0)->getColumnDimension('E')->setWidth(30);

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('C3', 'PONDOK PESANTREN AL-MASHDUQIAH')
			->setCellValue('C4', 'Patokan , Kraksaan - PROBOLINGGO (67282)')

			->setCellValue('A9', 'Data Kamar Santri')
			->setCellValue('A10', 'No')
			->setCellValue('B10', 'Nama Santri')
			->setCellValue('C10', 'Wali Kamar')
			->setCellValue('D10', 'Ruang Kamar')
			->setCellValue('E10', 'Rayon');

		// Miscellaneous glyphs, UTF-8
		$i = 11;
		$urut = 1;
		foreach ($kamar as $kmr) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $i, $urut++)
				->setCellValue('B' . $i, $kmr->nama)
				->setCellValue('C' . $i, $kmr->wali_kamar)
				->setCellValue('D' . $i, $kmr->rayon . ' - ' . $kmr->ruang_kamar)
				->setCellValue('E' . $i, $kmr->rayon);

			$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		$dt = date('d-m-y H:i:s');
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Data Kamar ' . $dt . '.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function export_konsulat()
	{
		$kon = $this->m_konsulat->get_Akonsulat();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('WebDev-K')
			->setLastModifiedBy('WebDev-K')
			->setTitle('Office 2019 XLSX Test Document')
			->setSubject('Office 2019 XLSX Test Document')
			->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
			->setKeywords('office 2019 openxml php')
			->setCategory('Test result file');

		$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		$drawing->setName('logo');
		$drawing->setDescription('logo');
		$drawing->setPath('assets/img/logo.jpg'); // put your path and image here
		$drawing->setCoordinates('B2');
		$drawing->setWidthAndHeight(130, 130);
		//$drawing->setOffsetX(110);
		//$drawing->setRotation(25); untuk miringnye
		$drawing->getShadow()->setVisible(true);
		$drawing->getShadow()->setDirection(45);
		$drawing->setWorksheet($spreadsheet->getActiveSheet());
		$spreadsheet->getActiveSheet()->getStyle("C3:G3")->getFont()->setSize(20);
		$spreadsheet->getActiveSheet()->getStyle("C4:G4")->getFont()->setSize(14);
		$spreadsheet->getActiveSheet()->getStyle("A9:E9")->getFont()->setSize(15);
		$spreadsheet->getActiveSheet()->mergeCells("C3:G3");
		$spreadsheet->getActiveSheet()->mergeCells("C4:G4");
		$spreadsheet->getActiveSheet()->mergeCells("A9:E9");
		$spreadsheet->getActiveSheet()->getStyle('A9:G9')->getAlignment()->setHorizontal('center');
		$spreadsheet->getActiveSheet()->getStyle('A10:G10')->getAlignment()->setHorizontal('center');


		$spreadsheet->getActiveSheet()->getStyle('A10:D10')
			->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
		$spreadsheet->getActiveSheet()->getStyle('A10:D10')
			->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:D10')
			->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:D10')
			->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:D10')
			->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:D10')
			->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
		$spreadsheet->getActiveSheet()->getStyle('A10:D10')
			->getFill()->getStartColor()->setARGB('FFFF0000');


		$spreadsheet->getSheet(0)->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getSheet(0)->getColumnDimension('B')->setWidth(25);
		$spreadsheet->getSheet(0)->getColumnDimension('C')->setWidth(30);
		$spreadsheet->getSheet(0)->getColumnDimension('D')->setWidth(35);
		$spreadsheet->getSheet(0)->getColumnDimension('E')->setWidth(35);


		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('C3', 'PONDOK PESANTREN AL-MASHDUQIAH')
			->setCellValue('C4', 'Patokan , Kraksaan - PROBOLINGGO (67282)')
			->setCellValue('A10', 'No')
			->setCellValue('B10', 'Nama Santri')
			->setCellValue('C10', 'Pembimbing')
			->setCellValue('D10', 'Ketua Konsulat');

		// Miscellaneous glyphs, UTF-8
		$i = 11;
		$urut = 1;
		foreach ($kon as $kon) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $i, $urut++)
				->setCellValue('B' . $i, $kon->nama)
				->setCellValue('C' . $i, $kon->pembimbing)
				->setCellValue('D' . $i, $kon->ketua_konsulat);


			$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		$dt = date('d-m-y H:i:s');
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Data Konsulat ' . $dt . '.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function export_Apel()
	{
		$s = $this->uri->segment(4);
		if (empty($s)) {
			$pela = $this->m_pelanggaran->get_App();
		} else {
			$this->db->where("sort=", $s);
			$pela = $this->m_pelanggaran->get_App();
		}
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('WebDev-K')
			->setLastModifiedBy('WebDev-K')
			->setTitle('Office 2019 XLSX Test Document')
			->setSubject('Office 2019 XLSX Test Document')
			->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
			->setKeywords('office 2019 openxml php')
			->setCategory('Test result file');

		$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		$drawing->setName('logo');
		$drawing->setDescription('logo');
		$drawing->setPath('assets/img/logo.jpg'); // put your path and image here
		$drawing->setCoordinates('B2');
		$drawing->setWidthAndHeight(130, 130);
		//$drawing->setOffsetX(110);
		//$drawing->setRotation(25); untuk miringnye
		$drawing->getShadow()->setVisible(true);
		$drawing->getShadow()->setDirection(45);
		$drawing->setWorksheet($spreadsheet->getActiveSheet());
		$spreadsheet->getActiveSheet()->getStyle("C3:G3")->getFont()->setSize(26);
		$spreadsheet->getActiveSheet()->getStyle("C4:G4")->getFont()->setSize(20);
		$spreadsheet->getActiveSheet()->mergeCells("C3:G3");
		$spreadsheet->getActiveSheet()->mergeCells("C4:G4");


		$spreadsheet->getActiveSheet()->getStyle('A10:G10')
			->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
		$spreadsheet->getActiveSheet()->getStyle('A10:G10')
			->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:G10')
			->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:G10')
			->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:G10')
			->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('A10:G10')
			->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
		$spreadsheet->getActiveSheet()->getStyle('A10:G10')
			->getFill()->getStartColor()->setARGB('FFFF0000');


		$spreadsheet->getSheet(0)->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getSheet(0)->getColumnDimension('B')->setWidth(25);
		$spreadsheet->getSheet(0)->getColumnDimension('C')->setWidth(60);
		$spreadsheet->getSheet(0)->getColumnDimension('D')->setWidth(20);
		$spreadsheet->getSheet(0)->getColumnDimension('E')->setWidth(20);
		$spreadsheet->getSheet(0)->getColumnDimension('F')->setWidth(50);
		$spreadsheet->getSheet(0)->getColumnDimension('G')->setWidth(27);


		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('C3', 'PONDOK PESANTREN AL-MASHDUQIAH')
			->setCellValue('C4', 'Patokan , Kraksaan - PROBOLINGGO (67282)')

			->setCellValue('A10', 'No')
			->setCellValue('B10', 'Nama Santri')
			->setCellValue('C10', 'Pelanggaran')
			->setCellValue('D10', 'Hari & Tanggal')
			->setCellValue('E10', 'Waktu Kejadian')
			->setCellValue('F10', 'Sanksi')
			->setCellValue('G10', 'Kategori Pelanggaran');

		// Miscellaneous glyphs, UTF-8
		$i = 11;
		$urut = 1;
		foreach ($pela as $pela) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $i, $urut++)
				->setCellValue('B' . $i, $pela->nama)
				->setCellValue('C' . $i, $pela->pelanggaran)
				->setCellValue('D' . $i, $pela->hari . ' , ' . date("d-m-Y", strtotime($pela->tgl)))
				->setCellValue('E' . $i, $pela->waktu)
				->setCellValue('F' . $i, $pela->sanksi)
				->setCellValue('G' . $i, 'pelanggarann ' . $pela->sort);


			$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		$dt = date('d-m-y H:i:s');
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Data Pelanggaran ' . $dt . '.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function export_extra()
	{
		$ex = $this->m_extra->get_Aextra();
		if (empty($ex)) {
			echo "<script>alert('Belum ada data yang bisa di print');location='../admin'</script>";
		} else {
			$ex = $this->m_extra->get_Aextra();
			// Create new Spreadsheet object
			$spreadsheet = new Spreadsheet();

			// Set document properties
			$spreadsheet->getProperties()->setCreator('WebDev-K')
				->setLastModifiedBy('WebDev-K')
				->setTitle('Office 2019 XLSX Test Document')
				->setSubject('Office 2019 XLSX Test Document')
				->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
				->setKeywords('office 2019 openxml php')
				->setCategory('Test result file');

			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing->setName('logo');
			$drawing->setDescription('logo');
			$drawing->setPath('assets/img/logo.jpg'); // put your path and image here
			$drawing->setCoordinates('B2');
			$drawing->setWidthAndHeight(130, 130);
			//$drawing->setOffsetX(110);
			//$drawing->setRotation(25); untuk miringnye
			$drawing->getShadow()->setVisible(true);
			$drawing->getShadow()->setDirection(45);
			$drawing->setWorksheet($spreadsheet->getActiveSheet());
			$spreadsheet->getActiveSheet()->getStyle("C3:G3")->getFont()->setSize(24);
			$spreadsheet->getActiveSheet()->getStyle("C4:G4")->getFont()->setSize(20);
			$spreadsheet->getActiveSheet()->mergeCells("C3:G3");
			$spreadsheet->getActiveSheet()->mergeCells("C4:G4");


			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getFill()->getStartColor()->setARGB('FFFF0000');


			$spreadsheet->getSheet(0)->getColumnDimension('A')->setWidth(5);
			$spreadsheet->getSheet(0)->getColumnDimension('B')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('C')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('D')->setWidth(40);


			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('C3', 'PONDOK PESANTREN AL-MASHDUQIAH')
				->setCellValue('C4', 'Patokan , Kraksaan - PROBOLINGGO (67282)')

				->setCellValue('A10', 'No')
				->setCellValue('B10', 'Nama Santri')
				->setCellValue('C10', 'Nama Extrakurikuler')
				->setCellValue('D10', 'Pembimbing Extra');

			// Miscellaneous glyphs, UTF-8
			$i = 11;
			$urut = 1;
			foreach ($ex as $ex) {

				$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A' . $i, $urut++)
					->setCellValue('B' . $i, $ex->nama)
					->setCellValue('C' . $i, $ex->nama_extra)
					->setCellValue('D' . $i, $ex->nama_pembimbing);


				$i++;
			}

			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);
			$dt = date('d-m-y H:i:s');
			// Redirect output to a client’s web browser (Xlsx)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Laporan Data Extra ' . $dt . '.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit;
		}
	}

	public function export_data()
	{
		$ex = $this->m_dsantri->get_Asantri();
		if (empty($ex)) {
			echo "<script>alert('Belum ada data yang bisa di print');location='../admin'</script>";
		} else {
			$ex = $this->m_dsantri->get_Asantri();
			// Create new Spreadsheet object
			$spreadsheet = new Spreadsheet();

			// Set document properties
			$spreadsheet->getProperties()->setCreator('WebDev-K')
				->setLastModifiedBy('WebDev-K')
				->setTitle('Office 2019 XLSX Test Document')
				->setSubject('Office 2019 XLSX Test Document')
				->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
				->setKeywords('office 2019 openxml php')
				->setCategory('Test result file');

			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing->setName('logo');
			$drawing->setDescription('logo');
			$drawing->setPath('assets/img/logo.jpg'); // put your path and image here
			$drawing->setCoordinates('B2');
			$drawing->setWidthAndHeight(130, 130);
			//$drawing->setOffsetX(110);
			//$drawing->setRotation(25); untuk miringnye
			$drawing->getShadow()->setVisible(true);
			$drawing->getShadow()->setDirection(45);
			$drawing->setWorksheet($spreadsheet->getActiveSheet());
			$spreadsheet->getActiveSheet()->getStyle("C3:G3")->getFont()->setSize(24);
			$spreadsheet->getActiveSheet()->getStyle("C4:G4")->getFont()->setSize(20);
			$spreadsheet->getActiveSheet()->mergeCells("C3:G3");
			$spreadsheet->getActiveSheet()->mergeCells("C4:G4");


			$spreadsheet->getActiveSheet()->getStyle('A10:K10')
				->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
			$spreadsheet->getActiveSheet()->getStyle('A10:K10')
				->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:K10')
				->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:K10')
				->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:K10')
				->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:K10')
				->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$spreadsheet->getActiveSheet()->getStyle('A10:K10')
				->getFill()->getStartColor()->setARGB('FFFF0000');


			$spreadsheet->getSheet(0)->getColumnDimension('A')->setWidth(5);
			$spreadsheet->getSheet(0)->getColumnDimension('B')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('C')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('D')->setWidth(20);
			$spreadsheet->getSheet(0)->getColumnDimension('E')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('F')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('G')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('H')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('I')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('J')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('K')->setWidth(40);

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('C3', 'PONDOK PESANTREN AL-MASHDUQIAH')
				->setCellValue('C4', 'Patokan , Kraksaan - PROBOLINGGO (67282)')

				->setCellValue('A10', 'No')
				->setCellValue('B10', 'Nama Santri')
				->setCellValue('C10', 'Tempat Tgl Lahir')
				->setCellValue('D10', 'Jenis Kelamin')
				->setCellValue('E10', 'Alamat')
				->setCellValue('F10', 'Kelas')
				->setCellValue('G10', 'Kamar')
				->setCellValue('H10', 'Orang Tua')
				->setCellValue('I10', 'Pekerjaan Ortu')
				->setCellValue('J10', 'Gaji Ortu')
				->setCellValue('K10', 'No HP Ayah & Ibu');


			// Miscellaneous glyphs, UTF-8
			$i = 11;
			$urut = 1;
			foreach ($ex as $ex) {

				$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A' . $i, $urut++)
					->setCellValue('B' . $i, $ex->nama)
					->setCellValue('C' . $i, $ex->tempat_lahir . ' , ' . $ex->tgl_lahir)
					->setCellValue('D' . $i, $ex->jk)
					->setCellValue('E' . $i, $ex->alamat)
					->setCellValue('F' . $i, $ex->nama_kelas . ' - ' . $ex->no_kls . ' (' . $ex->kelass . ')')
					->setCellValue('G' . $i, $ex->rayon . ' - ' . $ex->ruang_kamar)
					->setCellValue('H' . $i, $ex->nama_ayah . ' & ' . $ex->nama_ibu)
					->setCellValue('I' . $i, $ex->pekerjaan_ayah . ' & ' . $ex->pekerjaan_ibu)
					->setCellValue('J' . $i, $ex->penghasilan_ayah . ' & ' . $ex->penghasilan_ibu)
					->setCellValue('K' . $i, $ex->no_hp_ayah . ' & ' . $ex->no_hp_ibu);


				$i++;
			}

			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);
			$dt = date('d-m-y H:i:s');
			// Redirect output to a client’s web browser (Xlsx)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Laporan Data Santri ' . $dt . '.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit;
		}
	}

	public function export_tahfizh()
	{
		$mulai = $this->input->post('ds');
		$selesai = $this->input->post('de');
		$this->db->where('tgl_input BETWEEN "' . date('Y-m-d', strtotime($mulai)) . '" and "' . date('Y-m-d', strtotime($selesai)) . '"');
		$exz = $this->M_tahfidz->get_tahfidz();
		if (empty($exz)) {
			echo "<script>alert('Belum ada data yang bisa di print');location='../tahfidz'</script>";
		} else {
			$mulai = $this->input->post('ds');
			$selesai = $this->input->post('de');
			$this->db->where('tgl_input BETWEEN "' . date('Y-m-d', strtotime($mulai)) . '" and "' . date('Y-m-d', strtotime($selesai)) . '"');
			$exz = $this->M_tahfidz->get_tahfidz();
			// Create new Spreadsheet object
			$spreadsheet = new Spreadsheet();

			// Set document properties
			$spreadsheet->getProperties()->setCreator('WebDev-K')
				->setLastModifiedBy('WebDev-K')
				->setTitle('Office 2019 XLSX Test Document')
				->setSubject('Office 2019 XLSX Test Document')
				->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
				->setKeywords('office 2019 openxml php')
				->setCategory('Test result file');

			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing->setName('logo');
			$drawing->setDescription('logo');
			$drawing->setPath('assets/img/logo.jpg'); // put your path and image here
			$drawing->setCoordinates('B2');
			$drawing->setWidthAndHeight(130, 130);
			//$drawing->setOffsetX(110);
			//$drawing->setRotation(25); untuk miringnye
			$drawing->getShadow()->setVisible(true);
			$drawing->getShadow()->setDirection(45);
			$drawing->setWorksheet($spreadsheet->getActiveSheet());
			$spreadsheet->getActiveSheet()->getStyle("C3:G3")->getFont()->setSize(24);
			$spreadsheet->getActiveSheet()->getStyle("C4:G4")->getFont()->setSize(20);
			$spreadsheet->getActiveSheet()->mergeCells("C3:G3");
			$spreadsheet->getActiveSheet()->mergeCells("C4:G4");


			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getFill()->getStartColor()->setARGB('FFFF0000');


			$spreadsheet->getSheet(0)->getColumnDimension('A')->setWidth(5);
			$spreadsheet->getSheet(0)->getColumnDimension('B')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('C')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('D')->setWidth(20);
			$spreadsheet->getSheet(0)->getColumnDimension('E')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('F')->setWidth(40);

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('C3', 'PONDOK PESANTREN AL-MASHDUQIAH')
				->setCellValue('C4', 'Patokan , Kraksaan - PROBOLINGGO (67282)')

				->setCellValue('A10', 'No')
				->setCellValue('B10', 'Nama Santri')
				->setCellValue('C10', 'Status')
				->setCellValue('D10', 'Ayat')
				->setCellValue('E10', 'Surat')
				->setCellValue('F10', 'Juz');


			// Miscellaneous glyphs, UTF-8
			$i = 11;
			$urut = 1;
			foreach ($exz as $ex) {

				$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A' . $i, $urut++)
					->setCellValue('B' . $i, $ex->nama)
					->setCellValue('C' . $i, $ex->status_tahfidz)
					->setCellValue('D' . $i, $ex->ayat . " Ayat")
					->setCellValue('E' . $i, $ex->surat . " Surat")
					->setCellValue('F' . $i, $ex->juz . " Juz");


				$i++;
			}

			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);
			$dt = date('d-m-y H:i:s');
			// Redirect output to a client’s web browser (Xlsx)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Laporan Tahfizh ' . $dt . '.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit;
		}
	}

	public function export_prestasi()
	{
		$this->load->model('M_prestasi');
		$mulai = $this->input->post('ds');
		$selesai = $this->input->post('de');
		$this->db->where('tgl BETWEEN "' . date('Y-m-d', strtotime($mulai)) . '" and "' . date('Y-m-d', strtotime($selesai)) . '"');
		$exz = $this->M_prestasi->get_prestasi();
		if (empty($exz)) {
			echo "<script>alert('Belum ada data yang bisa di print');location='../prestasi'</script>";
		} else {
			$mulai = $this->input->post('ds');
			$selesai = $this->input->post('de');
			$this->db->where('tgl BETWEEN "' . date('Y-m-d', strtotime($mulai)) . '" and "' . date('Y-m-d', strtotime($selesai)) . '"');
			$exz = $this->M_prestasi->get_prestasi();
			// Create new Spreadsheet object
			$spreadsheet = new Spreadsheet();

			// Set document properties
			$spreadsheet->getProperties()->setCreator('WebDev-K')
				->setLastModifiedBy('WebDev-K')
				->setTitle('Office 2019 XLSX Test Document')
				->setSubject('Office 2019 XLSX Test Document')
				->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
				->setKeywords('office 2019 openxml php')
				->setCategory('Test result file');

			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing->setName('logo');
			$drawing->setDescription('logo');
			$drawing->setPath('assets/img/logo.jpg'); // put your path and image here
			$drawing->setCoordinates('B2');
			$drawing->setWidthAndHeight(130, 130);
			//$drawing->setOffsetX(110);
			//$drawing->setRotation(25); untuk miringnye
			$drawing->getShadow()->setVisible(true);
			$drawing->getShadow()->setDirection(45);
			$drawing->setWorksheet($spreadsheet->getActiveSheet());
			$spreadsheet->getActiveSheet()->getStyle("C3:G3")->getFont()->setSize(24);
			$spreadsheet->getActiveSheet()->getStyle("C4:G4")->getFont()->setSize(20);
			$spreadsheet->getActiveSheet()->mergeCells("C3:G3");
			$spreadsheet->getActiveSheet()->mergeCells("C4:G4");


			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$spreadsheet->getActiveSheet()->getStyle('A10:D10')
				->getFill()->getStartColor()->setARGB('FFFF0000');


			$spreadsheet->getSheet(0)->getColumnDimension('A')->setWidth(5);
			$spreadsheet->getSheet(0)->getColumnDimension('B')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('C')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('D')->setWidth(20);
			$spreadsheet->getSheet(0)->getColumnDimension('E')->setWidth(40);
			$spreadsheet->getSheet(0)->getColumnDimension('F')->setWidth(40);

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('C3', 'PONDOK PESANTREN AL-MASHDUQIAH')
				->setCellValue('C4', 'Patokan , Kraksaan - PROBOLINGGO (67282)')

				->setCellValue('A10', 'No')
				->setCellValue('B10', 'Nama Santri')
				->setCellValue('C10', 'Prestasi')
				->setCellValue('D10', 'Tanggal Input');


			// Miscellaneous glyphs, UTF-8
			$i = 11;
			$urut = 1;
			foreach ($exz as $ex) {

				$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A' . $i, $urut++)
					->setCellValue('B' . $i, $ex->nama)
					->setCellValue('C' . $i, $ex->prestasi)
					->setCellValue('D' . $i, $ex->tgl);


				$i++;
			}

			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);
			$dt = date('d-m-y H:i:s');
			// Redirect output to a client’s web browser (Xlsx)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Laporan Data Prestasi ' . $dt . '.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit;
		}
	}


	public function export_perizinan()
	{
		$this->load->model('M_perizinan');
		$mulai = $this->input->post('ds');
		$selesai = $this->input->post('de');
		$this->db->where('tgl_mulai BETWEEN "' . date('Y-m-d', strtotime($mulai)) . '" and "' . date('Y-m-d', strtotime($selesai)) . '"');
		$exz = $this->M_perizinan->get_perizinan();
		if (empty($exz)) {
			echo "<script>alert('Belum ada data yang bisa di print');location='../perizinan'</script>";
		} else {
			$mulai = $this->input->post('ds');
			$selesai = $this->input->post('de');
			$this->db->where('tgl_mulai BETWEEN "' . date('Y-m-d', strtotime($mulai)) . '" and "' . date('Y-m-d', strtotime($selesai)) . '"');
			$exz = $this->M_perizinan->get_perizinan();
			// Create new Spreadsheet object
			$spreadsheet = new Spreadsheet();

			// Set document properties
			$spreadsheet->getProperties()->setCreator('WebDev-K')
				->setLastModifiedBy('WebDev-K')
				->setTitle('Office 2019 XLSX Test Document')
				->setSubject('Office 2019 XLSX Test Document')
				->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
				->setKeywords('office 2019 openxml php')
				->setCategory('Test result file');

			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing->setName('logo');
			$drawing->setDescription('logo');
			$drawing->setPath('assets/img/logo.jpg'); // put your path and image here
			$drawing->setCoordinates('B2');
			$drawing->setWidthAndHeight(130, 130);
			//$drawing->setOffsetX(110);
			//$drawing->setRotation(25); untuk miringnye
			$drawing->getShadow()->setVisible(true);
			$drawing->getShadow()->setDirection(45);
			$drawing->setWorksheet($spreadsheet->getActiveSheet());
			$spreadsheet->getActiveSheet()->getStyle("C3:G3")->getFont()->setSize(24);
			$spreadsheet->getActiveSheet()->getStyle("C4:G4")->getFont()->setSize(20);
			$spreadsheet->getActiveSheet()->mergeCells("C3:G3");
			$spreadsheet->getActiveSheet()->mergeCells("C4:G4");


			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$spreadsheet->getActiveSheet()->getStyle('A10:F10')
				->getFill()->getStartColor()->setARGB('FFFF0000');


			$spreadsheet->getSheet(0)->getColumnDimension('A')->setWidth(5);
			$spreadsheet->getSheet(0)->getColumnDimension('B')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('C')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('D')->setWidth(50);
			$spreadsheet->getSheet(0)->getColumnDimension('E')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('F')->setWidth(25);

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('C3', 'PONDOK PESANTREN AL-MASHDUQIAH')
				->setCellValue('C4', 'Patokan , Kraksaan - PROBOLINGGO (67282)')

				->setCellValue('A10', 'No')
				->setCellValue('B10', 'Nama Santri')
				->setCellValue('C10', 'Status Perizinan')
				->setCellValue('D10', 'Keterangan izin')
				->setCellValue('E10', 'Tanggal Mulai')
				->setCellValue('F10', 'Tanggal Selesai');


			// Miscellaneous glyphs, UTF-8
			$i = 11;
			$urut = 1;
			foreach ($exz as $ex) {

				$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A' . $i, $urut++)
					->setCellValue('B' . $i, $ex->nama)
					->setCellValue('C' . $i, $ex->status_perizinan)
					->setCellValue('D' . $i, $ex->keterangan_izin)
					->setCellValue('E' . $i, $ex->tgl_mulai)
					->setCellValue('F' . $i, $ex->tgl_selesai);


				$i++;
			}

			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);
			$dt = date('d-m-y H:i:s');
			// Redirect output to a client’s web browser (Xlsx)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Laporan Data Perizinan ' . $dt . '.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit;
		}
	}

	public function export_kelas()
	{

		$exz = $this->m_kelas->get_Akelas();
		if (empty($exz)) {
			echo "<script>alert('Belum ada data yang bisa di print');location='../kelas_s'</script>";
		} else {
			$par = $this->uri->segment(4);
			$this->db->where('tb_kelas.gender=', $par);
			$exz = $this->m_kelas->get_Akelas();
			// Create new Spreadsheet object
			$spreadsheet = new Spreadsheet();

			// Set document properties
			$spreadsheet->getProperties()->setCreator('WebDev-K')
				->setLastModifiedBy('WebDev-K')
				->setTitle('Office 2019 XLSX Test Document')
				->setSubject('Office 2019 XLSX Test Document')
				->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
				->setKeywords('office 2019 openxml php')
				->setCategory('Test result file');

			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing->setName('logo');
			$drawing->setDescription('logo');
			$drawing->setPath('assets/img/logo.jpg'); // put your path and image here
			$drawing->setCoordinates('B2');
			$drawing->setWidthAndHeight(130, 130);
			//$drawing->setOffsetX(110);
			//$drawing->setRotation(25); untuk miringnye
			$drawing->getShadow()->setVisible(true);
			$drawing->getShadow()->setDirection(45);
			$drawing->setWorksheet($spreadsheet->getActiveSheet());
			$spreadsheet->getActiveSheet()->getStyle("C3:G3")->getFont()->setSize(24);
			$spreadsheet->getActiveSheet()->getStyle("C4:G4")->getFont()->setSize(20);
			$spreadsheet->getActiveSheet()->mergeCells("C3:G3");
			$spreadsheet->getActiveSheet()->mergeCells("C4:G4");


			$spreadsheet->getActiveSheet()->getStyle('A10:H10')
				->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
			$spreadsheet->getActiveSheet()->getStyle('A10:H10')
				->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:H10')
				->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:H10')
				->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:H10')
				->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:H10')
				->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$spreadsheet->getActiveSheet()->getStyle('A10:H10')
				->getFill()->getStartColor()->setARGB('FFFF0000');


			$spreadsheet->getSheet(0)->getColumnDimension('A')->setWidth(5);
			$spreadsheet->getSheet(0)->getColumnDimension('B')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('C')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('D')->setWidth(50);
			$spreadsheet->getSheet(0)->getColumnDimension('E')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('F')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('G')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('H')->setWidth(25);

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('C3', 'PONDOK PESANTREN AL-MASHDUQIAH')
				->setCellValue('C4', 'Patokan , Kraksaan - PROBOLINGGO (67282)')

				->setCellValue('A10', 'No')
				->setCellValue('B10', 'Nama Santri')
				->setCellValue('C10', 'Kelas')
				->setCellValue('D10', 'Wali Kelas')
				->setCellValue('E10', 'Gedung Kelas')
				->setCellValue('F10', 'Lembaga')
				->setCellValue('G10', 'Marhalah')
				->setCellValue('H10', 'Asisten');


			// Miscellaneous glyphs, UTF-8
			$i = 11;
			$urut = 1;
			foreach ($exz as $ex) {

				$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A' . $i, $urut++)
					->setCellValue('B' . $i, $ex->nama)
					->setCellValue('C' . $i, $ex->kelass)
					->setCellValue('D' . $i, $ex->wali_kelas)
					->setCellValue('E' . $i, $ex->nama_kelas)
					->setCellValue('F' . $i, $ex->lembagaa)
					->setCellValue('G' . $i, $ex->marhalah)
					->setCellValue('H' . $i, $ex->asisten);


				$i++;
			}

			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);
			$dt = date('d-m-y H:i:s');
			// Redirect output to a client’s web browser (Xlsx)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Laporan Data Kelas ' . $dt . '.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit;
		}
	}


	public function export_santrii()
	{

		$exz = $this->m_dsantri->get_Asantri();
		if (empty($exz)) {
			echo "<script>alert('Belum ada data yang bisa di print');location='../kelas_s'</script>";
		} else {
			$this->db->where('tb_dsantri.code_kamar!=', '-');
			$exz = $this->m_dsantri->get_Asantri();
			// Create new Spreadsheet object
			$spreadsheet = new Spreadsheet();

			// Set document properties
			$spreadsheet->getProperties()->setCreator('WebDev-K')
				->setLastModifiedBy('WebDev-K')
				->setTitle('Office 2019 XLSX Test Document')
				->setSubject('Office 2019 XLSX Test Document')
				->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
				->setKeywords('office 2019 openxml php')
				->setCategory('Test result file');

			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing->setName('logo');
			$drawing->setDescription('logo');
			$drawing->setPath('assets/img/logo.jpg'); // put your path and image here
			$drawing->setCoordinates('B2');
			$drawing->setWidthAndHeight(130, 130);
			//$drawing->setOffsetX(110);
			//$drawing->setRotation(25); untuk miringnye
			$drawing->getShadow()->setVisible(true);
			$drawing->getShadow()->setDirection(45);
			$drawing->setWorksheet($spreadsheet->getActiveSheet());
			$spreadsheet->getActiveSheet()->getStyle("C3:G3")->getFont()->setSize(24);
			$spreadsheet->getActiveSheet()->getStyle("C4:G4")->getFont()->setSize(20);
			$spreadsheet->getActiveSheet()->mergeCells("C3:G3");
			$spreadsheet->getActiveSheet()->mergeCells("C4:G4");


			$spreadsheet->getActiveSheet()->getStyle('A10:J10')
				->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
			$spreadsheet->getActiveSheet()->getStyle('A10:J10')
				->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:J10')
				->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:J10')
				->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:J10')
				->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A10:J10')
				->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$spreadsheet->getActiveSheet()->getStyle('A10:J10')
				->getFill()->getStartColor()->setARGB('FFFF0000');


			$spreadsheet->getSheet(0)->getColumnDimension('A')->setWidth(5);
			$spreadsheet->getSheet(0)->getColumnDimension('B')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('C')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('D')->setWidth(50);
			$spreadsheet->getSheet(0)->getColumnDimension('E')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('F')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('G')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('H')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('I')->setWidth(25);
			$spreadsheet->getSheet(0)->getColumnDimension('J')->setWidth(25);

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('C3', 'PONDOK PESANTREN AL-MASHDUQIAH')
				->setCellValue('C4', 'Patokan , Kraksaan - PROBOLINGGO (67282)')

				->setCellValue('A10', 'No')
				->setCellValue('B10', 'Nama Santri')
				->setCellValue('C10', 'Tempat Tgl Lahir')
				->setCellValue('D10', 'Jenis Kelamin')
				->setCellValue('E10', 'Alamat')
				->setCellValue('F10', 'Kelas')
				->setCellValue('G10', 'Kamar')
				->setCellValue('H10', 'Orang Tua')
				->setCellValue('I10', 'Pekerjaan Orang Tua')
				->setCellValue('J10', 'Gaji Ayah')
				->setCellValue('J10', 'Gaji Ibu');


			// Miscellaneous glyphs, UTF-8
			$i = 11;
			$urut = 1;
			foreach ($exz as $ex) {

				$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A' . $i, $urut++)
					->setCellValue('B' . $i, $ex->nama)
					->setCellValue('C' . $i, date("d-m-Y", strtotime($ex->tgl_lahir)))
					->setCellValue('D' . $i, $ex->jk)
					->setCellValue('E' . $i, $ex->alamat)
					->setCellValue('F' . $i, $ex->nama_kelas . $ex->kelass . $ex->no_kls)
					->setCellValue('G' . $i, $ex->rayon . $ex->ruang_kamar)
					->setCellValue('H' . $i, $ex->nama_ayah . '&' . $ex->nama_ibu)
					->setCellValue('I' . $i, $ex->pekerjaan_ayah . '&' . $ex->pekerjaan_ayah)
					->setCellValue('J' . $i, $ex->penghasilan_ayah + $ex->penghasilan_ibu);



				$i++;
			}

			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);
			$dt = date('d-m-y H:i:s');
			// Redirect output to a client’s web browser (Xlsx)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Laporan Data Santri ' . $dt . '.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit;
		}
	}


	function l_dsantri()
	{
		$data['san'] = $this->m_dsantri->get_Asantri();
		$this->load->view("admin/report/l_santri", $data);
	}
	public function l_pel()
	{

		$a = $this->uri->segment(4);
		if (empty($a)) {
			$data['pel'] = $this->m_pelanggaran->get_App();
			$this->load->view("admin/report/l_pel", $data);
		} else {
			$this->db->where("sort=", $a);
			$data['pel'] = $this->m_pelanggaran->get_App();
			$this->load->view("admin/report/l_pel", $data);
		}
	}
	public function l_tf()
	{
		$this->load->model('M_tahfidz');
		$mulai = $this->input->post('ds');
		$selesai = $this->input->post('de');
		$this->db->where('tgl_input BETWEEN "' . date('Y-m-d', strtotime($mulai)) . '" and "' . date(
			'Y-m-d',
			strtotime($selesai)
		) . '"');
		$data['pel'] = $this->M_tahfidz->get_tahfidz();
		if (empty($data['pel'])) {
			echo "<script>
alert('Belum ada data yang bisa di print');
location = '../tahfidz'
</script>";
		} else {
			$data['pel'] = $this->M_tahfidz->get_tahfidz();
			$this->load->view("admin/report/l_tahfizh", $data);
		}
	}
	public function l_ps()
	{
		$this->load->model('M_prestasi');
		$mulai = $this->input->post('ds');
		$selesai = $this->input->post('de');
		$this->db->where('tgl BETWEEN "' . date('Y-m-d', strtotime($mulai)) . '" and "' . date('Y-m-d', strtotime($selesai)) .
			'"');
		$data['pel'] = $this->M_prestasi->get_prestasi();
		if (empty($data['pel'])) {
			echo "<script>
alert('Belum ada data yang bisa di print');
location = '../prestasi'
</script>";
		} else {
			$data['pel'] = $this->M_prestasi->get_prestasi();
			$this->load->view("admin/report/l_prestasi", $data);
		}
	}
	public function l_pz()
	{
		$this->load->model('M_perizinan');

		$mulai = $this->input->post('ds');
		$selesai = $this->input->post('de');
		$this->db->where('tgl_mulai BETWEEN "' . date('Y-m-d', strtotime($mulai)) . '" and "' . date(
			'Y-m-d',
			strtotime($selesai)
		) . '"');
		$data['pel'] = $this->M_perizinan->get_perizinan();
		if (empty($data['pel'])) {
			echo "<script>
alert('Belum ada data yang bisa di print');
location = '../perizinan'
</script>";
		} else {
			$this->load->view("admin/report/l_perizinan", $data);
		}
	}
	function l_extraS()
	{
		$data['ext'] = $this->m_extra->te();
		$this->load->view("admin/report/l_santriExt", $data);
	}
	function l_konsulat()
	{
		$data['kon'] = $this->m_konsulat->get_Akonsulat();
		$this->load->view("admin/report/l_kons", $data);
	}
	function l_kamarS()
	{
		$ur = $this->uri->segment(4);
		$this->db->where('tb_kamar.gender=', $ur);
		$data['km'] = $this->m_kamar->get_Akamar();
		$this->load->view("admin/report/l_kamarS", $data);
	}
	function l_kelass()
	{
		$ur = $this->uri->segment(4);
		$this->db->where('tb_kelas.gender=', $ur);
		$data['km'] = $this->m_kelas->get_Akelas();
		$this->load->view("admin/report/l_kelas", $data);
	}
}