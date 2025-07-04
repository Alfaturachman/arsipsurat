<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil data dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Validasi ID wajib ada
if (!isset($data['id_bagian'])) {
    echo json_encode([
        "status" => false,
        "message" => "Parameter 'id_bagian' wajib diisi"
    ]);
    exit();
}

$id_bagian = intval($data['id_bagian']);

// Kolom yang diperbolehkan untuk diupdate
$allowed_fields = [
    'nama_bagian',
    'password_bagian',
    'nama_lengkap',
    'tanggal_lahir_bagian',
    'alamat',
    'no_hp_bagian',
    'gambar'
];

$update_fields = [];

// Loop untuk menyusun bagian query SET hanya untuk field yang dikirim
foreach ($allowed_fields as $field) {
    if (isset($data[$field]) && $data[$field] !== '') {
        if ($field === 'password_bagian') {
            // Enkripsi password
            $hashed_password = sha1($conn->real_escape_string($data[$field]));
            $update_fields[] = "$field = '$hashed_password'";
        } else {
            $escaped_value = $conn->real_escape_string($data[$field]);
            $update_fields[] = "$field = '$escaped_value'";
        }
    }
}

if (count($update_fields) === 0) {
    echo json_encode([
        "status" => false,
        "message" => "Tidak ada data yang dikirim untuk diperbarui"
    ]);
    exit();
}

// Susun query update
$set_clause = implode(", ", $update_fields);
$sql = "UPDATE tb_bagian SET $set_clause WHERE id_bagian = $id_bagian";

// Eksekusi query
if ($conn->query($sql) === TRUE) {
    echo json_encode([
        "status" => true,
        "message" => "Data bagian berhasil diperbarui"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Gagal memperbarui data: " . $conn->error
    ]);
}

$conn->close();
