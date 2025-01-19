<?php
session_start();
include '../../koneksi/koneksi.php';

// Check if the necessary POST keys exist to avoid undefined index warnings
$kode_surat = isset($_POST['kode_surat']) ? mysqli_real_escape_string($db, $_POST['kode_surat']) : '';
$nomor_urut = isset($_POST['nomor_urut']) ? mysqli_real_escape_string($db, $_POST['nomor_urut']) : '';
$nomor_surat = isset($_POST['nomor_surat']) ? mysqli_real_escape_string($db, $_POST['nomor_surat']) : '';
$tanggal = isset($_POST['tanggal']) ? mysqli_real_escape_string($db, $_POST['tanggal']) : '';
$tanggal_surat = isset($_POST['tanggal_surat']) ? mysqli_real_escape_string($db, $_POST['tanggal_surat']) : '';
$pengirim = isset($_POST['pengirim']) ? mysqli_real_escape_string($db, $_POST['pengirim']) : '';
$penerima = isset($_POST['nama_bagian_penerima']) ? mysqli_real_escape_string($db, $_POST['nama_bagian_penerima']) : '';
$id_bagian_pengirim = isset($_POST['id_bagian_pengirim']) ? mysqli_real_escape_string($db, $_POST['id_bagian_pengirim']) : '';
$id_bagian_penerima = isset($_POST['id_bagian_penerima']) ? mysqli_real_escape_string($db, $_POST['id_bagian_penerima']) : '';
$perihal = isset($_POST['perihal']) ? mysqli_real_escape_string($db, $_POST['perihal']) : '';
$kategori = isset($_POST['kategori']) ? mysqli_real_escape_string($db, $_POST['kategori']) : '';

// Mengambil nilai disposisi dan tanggal disposisi
$disposisi1 = !empty($_POST['disposisi1']) ? mysqli_real_escape_string($db, $_POST['disposisi1']) : NULL;
$tanggal_disposisi1 = !empty($_POST['tanggal_disposisi1']) ? mysqli_real_escape_string($db, $_POST['tanggal_disposisi1']) : NULL;
$disposisi2 = !empty($_POST['disposisi2']) ? mysqli_real_escape_string($db, $_POST['disposisi2']) : NULL;
$tanggal_disposisi2 = !empty($_POST['tanggal_disposisi2']) ? mysqli_real_escape_string($db, $_POST['tanggal_disposisi2']) : NULL;
$disposisi3 = !empty($_POST['disposisi3']) ? mysqli_real_escape_string($db, $_POST['disposisi3']) : NULL;
$tanggal_disposisi3 = !empty($_POST['tanggal_disposisi3']) ? mysqli_real_escape_string($db, $_POST['tanggal_disposisi3']) : NULL;

// Pengecekan dan pemformatan untuk tanggal surat dan disposisi
$tanggal = $_POST['tanggal'] ?? NULL;
$tanggal_surat = $_POST['tanggal_surat'] ?? NULL;
$tanggal_disposisi1 = $_POST['tanggal_disposisi1'] ?? NULL;
$tanggal_disposisi2 = $_POST['tanggal_disposisi2'] ?? NULL;
$tanggal_disposisi3 = $_POST['tanggal_disposisi3'] ?? NULL;

// Validate the required fields
if (
	!empty($kode_surat) && !empty($nomor_urut) && !empty($nomor_surat) && !empty($tanggal_surat) && !empty($pengirim) &&
	!empty($penerima) && !empty($perihal) && !empty($kategori) && !empty($tanggal) &&
	($_FILES['file_surat']['type'] == "application/pdf") && ($_FILES['file_surat']['size'] <= 10340000)
) {

	// Handle file upload
	$nama_file_lengkap = $_FILES['file_surat']['name'];
	$nama_file = substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file = substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tmp_file = $_FILES['file_surat']['tmp_name'];

	// Gabungkan menjadi satu string
	$tanggal_file = date("YmdHis");
	$nama_baru = $tanggal_file . '-' . $nomor_surat . $ext_file;
	$path = "../../admin/surat_keluar/" . $nama_baru;

	// Ensure the directory exists
	if (!file_exists("../../admin/surat_keluar")) {
		mkdir("../../admin/surat_keluar", 0777, true);
	}

	// Attempt to move the uploaded file
	if (move_uploaded_file($tmp_file, $path)) {

		$sql = "INSERT INTO tb_surat 
        (kode_surat, nomor_urut, nomor_surat, tanggal, tanggal_surat, pengirim, penerima, perihal, kategori, file_surat, 
        id_bagian_pengirim, id_bagian_penerima, created_at, disposisi_1, tanggal_disposisi_1, disposisi_2, tanggal_disposisi_2, 
        disposisi_3, tanggal_disposisi_3) 
        VALUES 
        ('$kode_surat', '$nomor_urut', '$nomor_surat', '$tanggal', '$tanggal_surat', '$pengirim', '$penerima', '$perihal', 
        '$kategori', '$nama_baru', '$id_bagian_pengirim', '$id_bagian_penerima', CURRENT_TIMESTAMP, '$disposisi1', 
        " . (is_null($tanggal_disposisi1) ? "NULL" : "'$tanggal_disposisi1'") . ", '$disposisi2', 
        " . (is_null($tanggal_disposisi2) ? "NULL" : "'$tanggal_disposisi2'") . ", '$disposisi3', 
        " . (is_null($tanggal_disposisi3) ? "NULL" : "'$tanggal_disposisi3'") . ")";

		// Execute the query
		if (mysqli_query($db, $sql)) {
			echo "<Center><h2><br>Terima Kasih<br>Surat Telah Dimasukkan</h2></center>
          <meta http-equiv='refresh' content='2;url=../datasuratkeluar.php'>";
		} else {
			// Print SQL error if the query fails
			echo "<Center><h2>Error SQL: " . mysqli_error($db) . "</h2></center>";
			echo "Kode Surat: $kode_surat<br>";
			echo "Nomor Urut: $nomor_urut<br>";
			echo "Nomor Surat: $nomor_surat<br>";
			echo "Tanggal: $tanggal<br>";
			echo "Tanggal Surat: $tanggal_surat<br>";
			echo "Pengirim: $pengirim<br>";
			echo "Penerima: $penerima<br>";
			echo "ID Pengirim: $id_bagian_pengirim<br>";
			echo "ID Penerima: $id_bagian_penerima<br>";
			echo "Perihal: $perihal<br>";
			echo "Kategori: $kategori<br>";
			echo "Disposisi 1: $disposisi1<br>";
			echo "Tanggal Disposisi 1: $tanggal_disposisi1<br>";
			echo "Disposisi 2: $disposisi2<br>";
			echo "Tanggal Disposisi 2: $tanggal_disposisi2<br>";
			echo "Disposisi 3: $disposisi3<br>";
			echo "Tanggal Disposisi 3: $tanggal_disposisi3<br>";
		}
	} else {
		// Print file upload error
		echo "<Center><h2>Gagal meng-upload file. Pastikan folder tujuan dapat diakses.<br> Error: " . $_FILES['file_surat']['error'] . "</h2></center>";
	}
} else {
	echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
          <meta http-equiv='refresh' content='2;url=../inputsuratkeluar.php'>";
}
