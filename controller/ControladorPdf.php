<?php

session_start();
require "../lib/fpdf.php";

require_once 'controller/controller.php';


class ControladorPdf extends Controller
{

    public function run()
    {
        switch ($_GET['action']) {

            case 'factura':
                $this->generarFactura(null);
                break;
        }
    }

    private function generarFactura($productos) {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Algodoncito de fresa!');
        $pdf->Output();
    }


}