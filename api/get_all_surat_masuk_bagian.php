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

$id_bagian_penerima = $conn->real_escape_string($data['id_user']);

// Query untuk mengambil semua data surat dengan filter id_bagian_penerima dan kategori = 'Surat Masuk'
$sql = "SELECT s.*, 
               bp.nama_bagian AS nama_bagian_penerima,
               bg.nama_bagian AS nama_bagian_pengirim
        FROM tb_surat s
        LEFT JOIN tb_bagian bp ON s.id_bagian_penerima = bp.id_bagian
        LEFT JOIN tb_bagian bg ON s.id_bagian_pengirim = bg.id_bagian
        WHERE s.id_bagian_penerima = '$id_bagian_penerima'
        AND s.kategori = 'Surat Masuk'
        ORDER BY s.tanggal DESC";

$result = $conn->query($sql);

// Cek hasil query
if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode([
        "status" => true,
        "message" => "Data ditemukan",
        "data" => $data
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Tidak ada data surat masuk untuk bagian penerima ini"
    ]);
}

$conn->close();
