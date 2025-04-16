<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil data dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Validasi parameter id_surat
if (!isset($data['id_surat']) || empty($data['id_surat'])) {
    echo json_encode([
        "status" => false,
        "message" => "ID surat harus diisi"
    ]);
    exit();
}

// Ambil nilai id_surat dari JSON
$id_surat = $conn->real_escape_string($data['id_surat']);

// Query untuk mengambil data berdasarkan ID Surat
$sql = "SELECT * FROM tb_surat WHERE id = '$id_surat'";
$result = $conn->query($sql);

// Cek apakah query berhasil dieksekusi
if ($result === false) {
    echo json_encode([
        "status" => false,
        "message" => "Query gagal dieksekusi: " . $conn->error
    ]);
    exit();
}

// Cek apakah data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        "status" => true,
        "message" => "Data ditemukan",
        "data" => $row
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Data tidak ditemukan"
    ]);
}

// Tutup koneksi database
$conn->close();
