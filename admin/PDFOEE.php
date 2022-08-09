<?php
date_default_timezone_set("Asia/Bangkok");
session_start();
include "config.php";

require("C:/xampp/htdocs/admin/fpdf182/fpdf.php");
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
        $this->Cell(182, 45, iconv('UTF-8', 'cp874', 'สรุปผลรวมOEE'), 0, 0, 'C');

        $this->AddFont('THSarabun', '', 'THSarabun Bold.php');
        $this->SetFont('THSarabun', '', 13);
        $this->Cell(2, 45, iconv('UTF-8', 'cp874', 'วันที่ : ' . date("d/m/Y h:i:s")), 0, 0, 'R');
        $this->Ln(0);
        $this->Cell(166, 60, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["user"]), 0, 0, 'R');
        // Line break
        $this->Ln(35);

        $this->SetFillColor(255, 218, 185);
        $this->SetDrawColor(50, 50, 100);


        $this->Cell(7);

        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'ชื่อผู้บันทึก'), 1, 0, 'C', true);
        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'อัตราการเดินเครื่อง'), 1, 0, 'C', true);
        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'ประสิทธิภาพเครื่องจักร'), 1, 0, 'C', true);
        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'อัตราคุณภาพ'), 1, 0, 'C', true);
        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'ผลรวมOEE'), 1, 0, 'C', true);
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
$pdf = new PDF();


$title = 'บันทึกผลผลิต';

$pdf->SetTitle($title, true);


$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->AddFont('THSarabun', '', 'THSarabun.php');
$pdf->SetFont('THSarabun', '', 14);

if (isset($_GET["d1"]) && isset($_GET["d2"])) {
    if ($_GET["d1"] !== "" && $_GET["d2"] !== "") {
        $sql = "SELECT * FROM `report` INNER JOIN users ON users.u_id = report.u_id WHERE DATE BETWEEN '" . $_GET["d1"] . "' AND '" . $_GET["d2"] . "'; ";
    } else {
        $sql = "SELECT * FROM `report` INNER JOIN users ON users.u_id = report.u_id ";
    }
}


$result = mysqli_query($conn, $sql);
while ($array = mysqli_fetch_assoc($result)) {
    $d = date_create($array['date']);
    $user = $array['u_usersname'];
    $date = date_format($d, "d/m/Y");
    $TR = $array['TR'] . " %";
    $TS = $array['TS'] . " %" ;
    $NT = $array['NT'] . " %";
    $EU = $array['EU'] . " %";
    



    $pdf->Cell(7);

    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $date), 1, 0, 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $user), 1, 0, 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $TR), 1, 0, 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $TS), 1, 0, 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $NT), 1, 0, 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $EU), 1, 0, 'C');
    $pdf->Ln();
}



$pdf->Output();
ob_end_flush();
