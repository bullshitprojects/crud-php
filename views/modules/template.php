<?php

require '../../lib/fpdf/fpdf.php';

class PDF extends FPDF
{
  function Header()
  {
    $this->SetFont("Arial", "B", 12);
    $this->Cell(25);
    $this->Cell(140, 5, utf8_decode("Reporte de Usuarios"), 0, 0, "C");
    $this->SetFont("Arial", "", 10);
    $this->Cell(25, 5, "Fecha: " . date("d/m/Y"), 0, 1, "C");
    $this->Ln(10);
  }

  function Footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
  }
}
