<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Periksa apakah request adalah POST dengan multipart/form-data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Periksa apakah ada file yang diunggah
    if (!isset($_FILES['file_surat']) || $_FILES['file_surat']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode([
            "status" => false,
            "message" => "File tidak ditemukan atau gagal diunggah"
        ]);
        exit();
    }

    // Ambil data dari form-data
    $kode_surat = isset($_POST['kode_surat']) ? $conn->real_escape_string($_POST['kode_surat']) : null;
    $nomor_surat = isset($_POST['nomor_surat']) ? $conn->real_escape_string($_POST['nomor_surat']) : null;
    $nomor_urut = isset($_POST['nomor_urut']) ? $conn->real_escape_string($_POST['nomor_urut']) : null;
    $penerima = isset($_POST['kepada']) ? $conn->real_escape_string($_POST['kepada']) : null;
    $pengirim = isset($_POST['pengirim']) ? $conn->real_escape_string($_POST['pengirim']) : null;
    $perihal = isset($_POST['perihal']) ? $conn->real_escape_string($_POST['perihal']) : null;
    $id_bagian_pengirim = isset($_POST['id_bagian_pengirim']) ? intval($_POST['id_bagian_pengirim']) : null;
    $id_bagian_penerima = isset($_POST['id_bagian_penerima']) ? intval($_POST['id_bagian_penerima']) : null;
    $disposisi1 = isset($_POST['disposisi1']) ? $conn->real_escape_string($_POST['disposisi1']) : null;
    $disposisi2 = isset($_POST['disposisi2']) ? $conn->real_escape_string($_POST['disposisi2']) : null;
    $disposisi3 = isset($_POST['disposisi3']) ? $conn->real_escape_string($_POST['disposisi3']) : null;

    $tanggal_masuk = (!empty($_POST['tanggal_masuk'])) ? date("Y-m-d H:i:s", strtotime($_POST['tanggal_masuk'])) : null;
    $tanggal_surat = (!empty($_POST['tanggal_surat'])) ? date("Y-m-d", strtotime($_POST['tanggal_surat'])) : null;
    $tanggal_disposisi1 = (!empty($_POST['tanggal_disposisi1'])) ? date("Y-m-d H:i:s", strtotime($_POST['tanggal_disposisi1'])) : null;
    $tanggal_disposisi2 = (!empty($_POST['tanggal_disposisi2'])) ? date("Y-m-d H:i:s", strtotime($_POST['tanggal_disposisi2'])) : null;
    $tanggal_disposisi3 = (!empty($_POST['tanggal_disposisi3'])) ? date("Y-m-d H:i:s", strtotime($_POST['tanggal_disposisi3'])) : null;

    // Simpan file ke server
    $upload_dir = "../bagian/surat_keluar/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Ambil ekstensi file dan buat nama baru
    $file_ext = pathinfo($_FILES['file_surat']['name'], PATHINFO_EXTENSION);
    $file_name = time() . "." . $file_ext;
    $file_path = $upload_dir . $file_name;

    if (move_uploaded_file($_FILES['file_surat']['tmp_name'], $file_path)) {
        $file_surat = $file_name;
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Gagal menyimpan file"
        ]);
        exit();
    }

    // Query simpan ke database
    $sql = "INSERT INTO tb_surat (kode_surat, nomor_surat, nomor_urut, tanggal, tanggal_surat, penerima, pengirim, perihal, kategori, file_surat, id_bagian_pengirim, id_bagian_penerima, disposisi_1, tanggal_disposisi_1, disposisi_2, tanggal_disposisi_2, disposisi_3, tanggal_disposisi_3) 
        VALUES (
            '$kode_surat', 
            '$nomor_surat', 
            " . ($nomor_urut !== null ? "'$nomor_urut'" : "NULL") . ", 
            " . ($tanggal_masuk !== null ? "'$tanggal_masuk'" : "NULL") . ", 
            " . ($tanggal_surat !== null ? "'$tanggal_surat'" : "NULL") . ", 
            " . ($penerima !== null ? "'$penerima'" : "NULL") . ", 
            " . ($pengirim !== null ? "'$pengirim'" : "NULL") . ", 
            " . ($perihal !== null ? "'$perihal'" : "NULL") . ", 
            'Surat Keluar', 
            '$file_surat', 
            " . ($id_bagian_pengirim !== null ? "$id_bagian_pengirim" : "NULL") . ", 
            " . ($id_bagian_penerima !== null ? "$id_bagian_penerima" : "NULL") . ", 
            " . ($disposisi1 !== null ? "'$disposisi1'" : "NULL") . ", 
            " . ($tanggal_disposisi1 !== null ? "'$tanggal_disposisi1'" : "NULL") . ", 
            " . ($disposisi2 !== null ? "'$disposisi2'" : "NULL") . ", 
            " . ($tanggal_disposisi2 !== null ? "'$tanggal_disposisi2'" : "NULL") . ", 
            " . ($disposisi3 !== null ? "'$disposisi3'" : "NULL") . ", 
            " . ($tanggal_disposisi3 !== null ? "'$tanggal_disposisi3'" : "NULL") . "
        )";

    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            "status" => true,
            "message" => "Data surat berhasil dikirim"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Gagal menyimpan data: " . $conn->error
        ]);
    }
} else {
    echo json_encode([
        "status" => false,
        "message" => "Metode request tidak valid"
    ]);
}

$conn->close();
