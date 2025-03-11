<?php
require_once '../../tcpdf/tcpdf.php';

$patientName = $_GET['patientName'] ?? '';
$medicines = $_GET['medicines'] ?? '';
$instructions = $_GET['instructions'] ?? '';

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Prescription for ' . $patientName);
$pdf->SetSubject('Prescription');
$pdf->SetKeywords('Prescription, Medicine, Instructions');
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);
$html = '<h1 style="text-align: center; margin-bottom: 20px;">Ordanance</h1>';
$html .= '<div style="margin-bottom: 10px;"><strong>Patient Name:</strong> ' . htmlspecialchars($patientName) . '</div>';
$html .= '<div style="margin-bottom: 10px;"><strong>Medicines:</strong><br>' . htmlspecialchars($medicines) . '</div>';
$html .= '<div style="margin-bottom: 10px;"><strong>Instructions:</strong></div>';
$html .= '<div style="margin-bottom: 20px;">' . nl2br(htmlspecialchars($instructions)) . '</div>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('prescription.pdf', 'D');
?>
