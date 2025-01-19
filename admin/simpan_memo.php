<?php
// Sertakan file koneksi
define('BASEPATH', true);
include '../../koneksi/koneksi.php';

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $isi_memo = isset($_POST['isi_memo']) ? $conn->real_escape_string($_POST['isi_memo']) : '';
    $bidang_ppt = isset($_POST['bidang_ppt']) ? $_POST['bidang_ppt'] : [];

    // Validasi data
    if (empty($isi_memo)) {
        echo "Isi memo tidak boleh kosong.";
        exit;
    }

    // Konversi array bidang_ppt ke string (jika ada)
    $bidang_ppt_str = implode(", ", $bidang_ppt);

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO memo (isi_memo, bidang_ppt) VALUES ('$isi_memo', '$bidang_ppt_str')";

    if ($conn->query($sql) === TRUE) {
        echo "Data memo berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
