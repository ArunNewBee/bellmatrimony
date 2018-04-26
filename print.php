<?php


require('fpdf17/fpdf.php');

//Connect to your database
include_once("php_includes/db_conx.php");

//Create new pdf file
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf->Cell(30,6,'ID',1,0,'L',1);
$pdf->Cell(100,6,'NAME',1,0,'L',1);
$pdf->Cell(30,6,'PRICE',1,0,'R',1);



//Select the Products you want to show in your PDF file

$sql = "select * from users";
$result = mysqli_query($db_conx, $sql);
//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;
$y_axis = $y_axis + $row_height;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	//If the current row is the last one, create new page and print column title
	if ($i == $max)
	{
		$pdf->AddPage();

		//print column titles for the current page
		$pdf->SetY($y_axis_initial);
		$pdf->SetX(25);
		$pdf->Cell(30,6,'ID',1,0,'L',1);
		$pdf->Cell(100,6,'NAME',1,0,'L',1);
		$pdf->Cell(30,6,'PRICE',1,0,'R',1);
		
		//Go to next row
		$y_axis = $y_axis + $row_height;
		
		//Set $i variable to 0 (first row)
		$i = 0;
	}

	$code = $row['id'];
	$price = $row['username'];
	$name = $row['email'];

	$pdf->SetY($y_axis);
	$pdf->SetX(25);
	$pdf->Cell(30,6,$code,1,0,'L',1);
	$pdf->Cell(100,6,$name,1,0,'L',1);
	$pdf->Cell(30,6,$price,1,0,'R',1);

	//Go to next row
	$y_axis = $y_axis + $row_height;
	$i = $i + 1;
}

mysqli_close($db_conx);

//Send file
$pdf->Output();
?>