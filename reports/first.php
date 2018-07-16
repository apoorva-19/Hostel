<?php
	require_once('../fpdf.php');
		
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../images/Pict_logo.png',10,6,20);
			$this->SetFont('Arial', 'B', 15);
			$this->Cell(80);
			$this->Cell(30,10,'PUNE INSTITUTE OF COMUPTER TECHNOLOGY',0,0,'C');
			$this->SetFont('Arial','',10);
			$this->Cell(-27,20,'Survey No. 27, Near Trimurti Chowk, Dhankawadi, Pune, Maharashtra - 411043.',0,0, 'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,5,date("Y-m-d H:m:s"),0,0);
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
		
		function ReportTitle($report_title)
		{
			$this->SetFont('Times','B',12);
			$this->Line(10, 27, 210-10, 27);
			$this->SetFillColor(200,220,255);
			$this->Ln(4);
			$this->Cell(0,6,$report_title,0,1,'L',true);
			$this->Ln(4);
		}
		
		function ImprovedTable($w, $header, $data)
		{
			//$w - width of the each column
			//$header - column header for the table
			//$data - data to be printed in the table.
		  for($i=0;$i<count($header);$i++)
		      $this->Cell($w[$i],7,$header[$i],1,0,'C');
		  $this->Ln();
		  foreach($data as $row)
		  {
		      $this->Cell($w[0],6,$row[0],'LR');
		      $this->Cell($w[1],6,$row[1],'LR');
		      $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		      $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		      $this->Ln();
		  }
		  $this->Cell(array_sum($w),0,'','T');
		}
	}

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	$pdf->ReportTitle("Night Out Record");
	$pdf->Output();
	
?>
			
