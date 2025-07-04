<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil data dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Validasi input
if (!isset($data['id_surat']) || !isset($data['status'])) {
    echo json_encode([
        "status" => false,
        "message" => "Parameter 'id_surat' dan 'status' wajib diisi"
    ]);
    exit();
}

$id_surat = intval($data['id_surat']);
$status = $conn->real_escape_string($data['status']);

// Validasi nilai status (opsional)
$allowed_statuses = ['Diproses', 'Disetujui', 'Ditolak'];
if (!in_array($status, $allowed_statuses)) {
    echo json_encode([
        "status" => false,
        "message" => "Status tidak valid. Harus: Diproses, Disetujui, atau Ditolak."
    ]);
    exit();
}

// Query update
$sql = "UPDATE tb_surat SET status = '$status' WHERE id = $id_surat";

if ($conn->query($sql) === TRUE) {
    echo json_encode([
        "status" => true,
        "message" => "Status surat berhasil diperbarui"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Gagal memperbarui status surat: " . $conn->error
    ]);
}

$conn->close();
