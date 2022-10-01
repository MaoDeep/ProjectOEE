<?php
date_default_timezone_set("Asia/Bangkok");
session_start();
include "config.php";

require("fpdf182/fpdf.php");
ob_end_clean();
ob_start();
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo

        // Arial bold 15
        $this->AddFont('THSarabun', 'B', 'THSarabun Bold.php');
        $this->SetFont('THSarabun', 'B', 20);



        // Move to the right
        $this->Cell(5);
        // Title
        $this->Image('img/logo.png', 20, 10, 40, 0, 'PNG');
        $this->Cell(265, 45, iconv('UTF-8', 'cp874', 'รายงานผลผลิตประจำวัน'), 0, 0, 'C');

        $this->AddFont('THSarabun', '', 'THSarabun Bold.php');
        $this->SetFont('THSarabun', '', 15);
        $this->Cell(1, 45, iconv('UTF-8', 'cp874', 'วันที่ : ' . date("d/m/Y H:i:s")), 0, 0, 'R');
        $this->Ln(0);
        $this->Cell(251, 60, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["user"]), 0, 0, 'R');
        // Line break
        $this->Ln(35);

        $this->SetFillColor(255, 218, 185);
        $this->SetDrawColor(50, 50, 100);


        $this->Cell(7);


        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $this->Cell(35, 10, iconv('UTF-8', 'cp874', 'ผู้บันทึก'), 1, 0, 'C', true);
        $this->Cell(32, 10, iconv('UTF-8', 'cp874', 'รหัสเครื่อง'), 1, 0, 'C', true);
        $this->Cell(25, 10, iconv('UTF-8', 'cp874', 'ชิ้นงานที่ได้'), 1, 0, 'C', true);
        $this->Cell(22, 10, iconv('UTF-8', 'cp874', 'ชิ้นงานที่เสีย'), 1, 0, 'C', true);
        $this->Cell(60, 10, iconv('UTF-8', 'cp874', 'รุ่นที่ผลิต'), 1, 0, 'C', true);
        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'เวลาเข้างาน'), 1, 0, 'C', true);
        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'เวลาเลิกงาน'), 1, 0, 'C', true);
        $this->Ln();
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->AddFont('THSarabun', '', 'THSarabun.php');
        $this->SetFont('THSarabun', '', 14);
        // Page number
        $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF('L');


$title = 'บันทึกผลผลิต';

$pdf->SetTitle($title, true);


$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->AddFont('THSarabun', '', 'THSarabun.php');
$pdf->SetFont('THSarabun', '', 14);

if (isset($_GET["d1"]) && isset($_GET["d2"])) {
    if ($_GET["d1"] !== "" && $_GET["d2"] !== "") {
        $sql = "SELECT * FROM `employee` WHERE DATE BETWEEN '" . $_GET["d1"] . "' AND '" . $_GET["d2"] . "'; ";
    } else {
        $sql = "SELECT * FROM `employee` INNER JOIN machinemaster ON machinemaster.id = employee.Nmac INNER JOIN brand ON brand.b_id = machinemaster.b_id INNER JOIN machine ON machine.mac_id = machinemaster.mac_id; ";
    }
}


$result = mysqli_query($conn, $sql);
while ($array = mysqli_fetch_assoc($result)) {
    $d = date_create($array['DATE']);
    $E_id = $array['E_id'];
    $DATE = date_format($d, "d/m/Y");
    $EName = $array['EName'];
    $Nmac = $array['mac_name'];
    $Econ = number_format($array['Econ']) . " ชิ้น";
    $Edel = number_format($array['Edel']) . " ชิ้น";
    $Epro = $array['b_name'];
    $Etime = $array['Etime'] . " น.";
    $Etimet = $array['Etimet'] . " น.";



    $pdf->Cell(7);

    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $DATE), 1, 0, 'C');
    $pdf->Cell(35, 10, iconv('UTF-8', 'cp874', $EName), 1, 0, 'C');
    $pdf->Cell(32, 10, iconv('UTF-8', 'cp874', $Nmac), 1, 0, 'C');
    $pdf->Cell(25, 10, iconv('UTF-8', 'cp874', $Econ), 1, 0, 'C');
    $pdf->Cell(22, 10, iconv('UTF-8', 'cp874', $Edel), 1, 0, 'C');
    $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $Epro), 1, 0, 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $Etime), 1, 0, 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $Etimet), 1, 0, 'C');
    $pdf->Ln();
}



$pdf->Output();
ob_end_flush();
