<?php
require '../../models/connection.php';
require 'template.php';

$query = Connection::connect()->prepare('SELECT id, name, lastname, city, inscription_date, email FROM users');
$query->execute();

$results = $query->fetchAll();

$pdf = new PDF("P", "mm", "letter");
$pdf->AliasNbPages();
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

$pdf->SetFont("Arial", "B", 9);

$pdf->Cell(10, 5, "Id", 1, 0, "C");
$pdf->Cell(30, 5, "Nombre", 1, 0, "C");
$pdf->Cell(30, 5, "Apellido", 1, 0, "C");
$pdf->Cell(30, 5, "Ciudad", 1, 0, "C");
$pdf->Cell(40, 5, "Fecha de Inscripcion", 1, 0, "C");
$pdf->Cell(60, 5, "Email", 1, 0, "C");
$pdf->Ln();

$pdf->SetFont("Arial", "", 9);

foreach ($results as $key => $item) {

  $pdf->Cell(10, 5, $item['id'], 1, 0, "C");
  $pdf->Cell(30, 5, $item['name'], 1, 0, "C");
  $pdf->Cell(30, 5, $item['lastname'], 1, 0, "C");
  $pdf->Cell(30, 5, $item['city'], 1, 0, "C");
  $pdf->Cell(40, 5, $item['inscription_date'], 1, 0, "C");
  $pdf->Cell(60, 5, $item['email'], 1, 0, "C");
  $pdf->Ln();
}

$pdf->Output();
$query->closeCursor();
