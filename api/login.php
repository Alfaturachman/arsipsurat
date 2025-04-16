<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil raw data JSON dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Validasi input
if (!isset($data['username']) || !isset($data['password'])) {
    echo json_encode(["status" => false, "error" => "Username and password are required"]);
    exit();
}

$username = $conn->real_escape_string($data['username']);
$password = sha1($conn->real_escape_string($data['password']));

$response = ["status" => false, "error" => "Invalid username or password"];

// Cek di tabel tb_admin
$sql_admin = "SELECT * FROM `tb_admin` WHERE `username_admin` = '$username' LIMIT 1";
$result_admin = $conn->query($sql_admin);

if ($result_admin->num_rows > 0) {
    $admin = $result_admin->fetch_assoc();
    if ($password === $admin['password']) {
        $response = [
            "status" => true,
            "message" => "Login successful",
            "level" => "admin",
            "user_details" => [
                "id" => $admin['id_admin'],
                "nama" => $admin['nama_admin'],
                "username" => $admin['username_admin'],
                "gambar" => $admin['gambar']
            ]
        ];
    }
} else {
    // Cek di tabel tb_bagian
    $sql_bagian = "SELECT * FROM `tb_bagian` WHERE `username_admin_bagian` = '$username' LIMIT 1";
    $result_bagian = $conn->query($sql_bagian);

    if ($result_bagian->num_rows > 0) {
        $bagian = $result_bagian->fetch_assoc();
        if ($password === $bagian['password_bagian']) {
            $response = [
                "status" => true,
                "message" => "Login successful",
                "level" => "bagian",
                "user_details" => [
                    "id" => $bagian['id_bagian'],
                    "nama" => $bagian['nama_bagian'],
                    "username" => $bagian['username_admin_bagian'],
                    "gambar" => $bagian['gambar']
                ]
            ];
        }
    }
}

// Kirimkan respons
echo json_encode($response);
$conn->close();
