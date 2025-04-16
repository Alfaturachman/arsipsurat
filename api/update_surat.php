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

$id_surat = $conn->real_escape_string($data['id_surat']);

// Ambil data yang akan diperbarui
$fields = [];
if (isset($data['kode_surat'])) $fields[] = "kode_surat = '" . $conn->real_escape_string($data['kode_surat']) . "'";
if (isset($data['nomor_surat'])) $fields[] = "nomor_surat = '" . $conn->real_escape_string($data['nomor_surat']) . "'";
if (isset($data['nomor_urut'])) $fields[] = "nomor_urut = '" . $conn->real_escape_string($data['nomor_urut']) . "'";
if (isset($data['tanggal_surat'])) $fields[] = "tanggal_surat = '" . $conn->real_escape_string($data['tanggal_surat']) . "'";
if (isset($data['penerima'])) $fields[] = "penerima = '" . $conn->real_escape_string($data['penerima']) . "'";
if (isset($data['pengirim'])) $fields[] = "pengirim = '" . $conn->real_escape_string($data['pengirim']) . "'";
if (isset($data['perihal'])) $fields[] = "perihal = '" . $conn->real_escape_string($data['perihal']) . "'";
if (isset($data['kategori'])) $fields[] = "kategori = '" . $conn->real_escape_string($data['kategori']) . "'";
if (isset($data['status'])) $fields[] = "status = '" . $conn->real_escape_string($data['status']) . "'";
if (isset($data['file_surat'])) $fields[] = "file_surat = '" . $conn->real_escape_string($data['file_surat']) . "'";
if (isset($data['id_bagian_pengirim'])) $fields[] = "id_bagian_pengirim = " . intval($data['id_bagian_pengirim']);
if (isset($data['id_bagian_penerima'])) $fields[] = "id_bagian_penerima = " . intval($data['id_bagian_penerima']);
if (isset($data['disposisi_1'])) $fields[] = "disposisi_1 = '" . $conn->real_escape_string($data['disposisi_1']) . "'";
if (isset($data['tanggal_disposisi_1'])) $fields[] = "tanggal_disposisi_1 = '" . $conn->real_escape_string($data['tanggal_disposisi_1']) . "'";
if (isset($data['disposisi_2'])) $fields[] = "disposisi_2 = '" . $conn->real_escape_string($data['disposisi_2']) . "'";
if (isset($data['tanggal_disposisi_2'])) $fields[] = "tanggal_disposisi_2 = '" . $conn->real_escape_string($data['tanggal_disposisi_2']) . "'";
if (isset($data['disposisi_3'])) $fields[] = "disposisi_3 = '" . $conn->real_escape_string($data['disposisi_3']) . "'";
if (isset($data['tanggal_disposisi_3'])) $fields[] = "tanggal_disposisi_3 = '" . $conn->real_escape_string($data['tanggal_disposisi_3']) . "'";

// Jika tidak ada field yang diperbarui, hentikan eksekusi
if (empty($fields)) {
    echo json_encode([
        "status" => false,
        "message" => "Tidak ada data yang diperbarui"
    ]);
    exit();
}

// Buat query update
$sql = "UPDATE tb_surat SET " . implode(", ", $fields) . " WHERE id = '$id_surat'";

// Eksekusi query
if ($conn->query($sql) === TRUE) {
    echo json_encode([
        "status" => true,
        "message" => "Data berhasil diperbarui"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Gagal memperbarui data: " . $conn->error
    ]);
}

// Tutup koneksi database
$conn->close();
