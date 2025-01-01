<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Inisialisasi Dompdf
$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);

// Mengambil HTML dari file template
ob_start();  // Mulai output buffering
include 'disposisi.php';  // Menyertakan file HTML
$html = ob_get_clean();  // Mengambil konten HTML dari buffer

// Memasukkan HTML ke Dompdf
$dompdf->loadHtml($html);

// Mengatur ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');

// Render HTML ke PDF
$dompdf->render();

// Mengunduh file PDF
$dompdf->stream("contoh_pdf.pdf", ["Attachment" => true]);
