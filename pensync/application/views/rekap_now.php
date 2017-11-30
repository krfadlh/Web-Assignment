<?php
if (isset($monthly_request)){
	require('fpdf/fpdf.php');
	$month = array('Januar1', 'Februar1', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember')[date('m', strtotime($monthly_request[0]->event_date)) - 1];
	
	class PDF extends FPDF{
		// Load data
	
		function FancyTable($header, $monthly_request, $title, $date){
			// Colors, line width and bold font
			// $this->Image( "pens.png", 40, 10, 100 );
			$this->settitle($title);
			$this->setauthor("PENSync");
			$this->Cell(290,30,$title,0,0,'C');
			$this->Ln(30);
			$this->SetFillColor(231,76,60);
			$this->SetTextColor(0);
			$this->SetFont('');
			$this->SetXY(1, 40);
			
			// Header
			$w = array(40, 50, 40, 60, 55, 50);
			$hari = array(
				'Sunday' => 'Minggu',
				'Monday' => 'Senin',
				'Tuesday' => 'Selasa',
				'Wednesday' => 'Rabu',
				'Thursday' => 'Kamis',
				'Friday' => 'Jumat',
				'Saturday' => 'Sabtu'
			);
			// Closing line
			// $this->Cell(23,0,array_sum($w),0,'','T');
			
			foreach ($date as $day) {
				$this->SetX(1);
				for($i=0;$i<count($header);$i++) {
					$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
				}
				$this->Ln();
				
				$i = 0;
				foreach ($monthly_request as $request) {
					if ($request->event_date == $day->event_date) {
						$i++;
					}
				}
				$j = 0;
				foreach ($monthly_request as $request) {
					if ($request->event_date == $day->event_date) {
						$this->SetX(1);
						if ($i == 1) {
							$this->Cell($w[0], 6, substr($hari[date('l', strtotime($request->event_date))], 0, 3).','.date('d-m-Y', strtotime($request->event_date)), 1, 0, 'C');
						} else if ($i == 2) {
							if ($j == 0) {
								$this->Cell($w[0], 6, $hari[date('l', strtotime($request->event_date))].',', 'LTR', 0, 'C');
							} else {
								$this->Cell($w[0], 6, date('d-m-Y', strtotime($request->event_date)), 'LBR', 0, 'C');
							}
						} else if ($i == 3) {
							if ($j == 0) {
								$this->Cell($w[0], 6, $hari[date('l', strtotime($request->event_date))].',', 'LTR', 0, 'C');
							} else if ($j == 1) {
								$this->Cell($w[0], 6, date('d-m-Y', strtotime($request->event_date)), 'LR', 0, 'C');
							} else {
								$this->Cell($w[0], 6, '', 'LBR', 0, 'C');
							}
						} else {
							if ($j == 0){
								$this->Cell($w[0], 6, '', 'LTR', 0, 'C');
							} else if ($j == $i - 1) {
								$this->Cell($w[0], 6, '', 'LBR', 0, 'C');
							} else if ($j == (integer)($i / 2) - 1) {
								$this->Cell($w[0], 6, $hari[date('l', strtotime($request->event_date))].',', 'LR', 0, 'C');
							} else if ($j == (integer)($i / 2)) {
								$this->Cell($w[0], 6, date('d-m-Y', strtotime($request->event_date)), 'LR', 0, 'C');
							} else {
								$this->Cell($w[0], 6, '', 'LR', 0, 'C');
							}
						}
						$this->Cell($w[1], 6, $request->nama, 1, 0, 'C');
						$this->Cell($w[2], 6, substr($request->start_time, 0, 5).' - '.substr($request->finish_time, 0, 5), 1, 0, 'C');
						$this->Cell($w[3], 6, $request->event, 1, 0, 'C');
						$this->Cell($w[4], 6, $request->name, 1, 0, 'C');
						$this->Cell($w[5], 6, $request->verif_code, 1, 0, 'C');
						$this->Ln();
						$j++;
					}
				}
				$this->Ln();
			}
		}
	}
	
	//Memanggil Class PDF
	$pdf = new PDF('L');
	$judul = "LAPORAN PEMINJAMAN RUANGAN BULAN ".strtoupper($month);
	
	//Inisialisasi Header Tabel
	$header = array('Tanggal', 'Tempat', 'Waktu', 'Acara', 'Penyelenggara', 'Kode Verifikasi');
	//Deklarasi Body Tabel
	$pdf->SetFont('Arial','',14);
	$pdf->AddPage();
	$pdf->FancyTable($header, $monthly_request, $judul, $date);
	$pdf->Ln();
	$pdf->Output();
}
?>