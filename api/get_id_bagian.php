<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil data dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Validasi input
if (!isset($data['id_bagian'])) {
    echo json_encode([
        "status" => false,
        "message" => "Parameter 'id_bagian' wajib diisi"
    ]);
    exit();
}

$id_bagian = intval($data['id_bagian']);

// Query ambil data berdasarkan id_bagian
$sql = "SELECT * FROM tb_bagian WHERE id_bagian = $id_bagian";
$result = $conn->query($sql);

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
        "message" => "Data dengan id_bagian tersebut tidak ditemukan"
    ]);
}

$conn->close();
