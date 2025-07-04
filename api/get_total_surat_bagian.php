<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil data JSON dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Validasi parameter
if (!isset($data['id_user'])) {
    echo json_encode([
        "status" => false,
        "message" => "Parameter id_user diperlukan"
    ]);
    exit();
}

$id_user = $conn->real_escape_string($data['id_user']);

// Query total surat masuk (penerima adalah user)
$sqlSuratMasuk = "
    SELECT COUNT(*) AS total_masuk
    FROM tb_surat
    WHERE kategori = 'Surat Masuk' AND id_bagian_penerima = '$id_user' OR kategori = 'Surat Masuk' AND id_bagian_pengirim = '$id_user'
";

// Query total surat keluar (pengirim adalah user)
$sqlSuratKeluar = "
    SELECT COUNT(*) AS total_keluar
    FROM tb_surat
    WHERE kategori = 'Surat Keluar' AND id_bagian_pengirim = '$id_user'
";

// Eksekusi query surat masuk
$resultMasuk = $conn->query($sqlSuratMasuk);
$totalMasuk = 0;
if ($resultMasuk && $rowMasuk = $resultMasuk->fetch_assoc()) {
    $totalMasuk = (int)$rowMasuk['total_masuk'];
}

// Eksekusi query surat keluar
$resultKeluar = $conn->query($sqlSuratKeluar);
$totalKeluar = 0;
if ($resultKeluar && $rowKeluar = $resultKeluar->fetch_assoc()) {
    $totalKeluar = (int)$rowKeluar['total_keluar'];
}

// Kembalikan response JSON
echo json_encode([
    "status" => true,
    "message" => "Data jumlah surat ditemukan",
    "data" => [
        "total_surat_masuk" => $totalMasuk,
        "total_surat_keluar" => $totalKeluar
    ]
]);

$conn->close();
