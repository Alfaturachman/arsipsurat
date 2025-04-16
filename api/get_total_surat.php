<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Query untuk menghitung jumlah surat berdasarkan kategori
$sql = "SELECT 
            SUM(CASE WHEN kategori = 'Surat Masuk' THEN 1 ELSE 0 END) AS total_surat_masuk,
            SUM(CASE WHEN kategori = 'Surat Keluar' THEN 1 ELSE 0 END) AS total_surat_keluar
        FROM tb_surat";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Menyusun data dalam array
    $data = [
        "total_surat_masuk" => $row['total_surat_masuk'],
        "total_surat_keluar" => $row['total_surat_keluar']
    ];

    echo json_encode([
        "status" => true,
        "message" => "Data ditemukan",
        "data" => $data
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Tidak ada data yang ditemukan",
        "data" => [
            "total_surat_masuk" => 0,
            "total_surat_keluar" => 0
        ]
    ]);
}

$conn->close();
