<?php
session_start();
include '../../koneksi/koneksi.php';

$id = mysqli_real_escape_string($db, $_POST['id_surat']);
$tanggal_surat = mysqli_real_escape_string($db, $_POST['tanggal_surat']);
$kode_surat = mysqli_real_escape_string($db, $_POST['kode_surat']);
$nomor_surat = mysqli_real_escape_string($db, $_POST['nomor_surat']);
$pengirim = mysqli_real_escape_string($db, $_POST['pengirim']);
$penerima = mysqli_real_escape_string($db, $_POST['penerima']);
$perihal = mysqli_real_escape_string($db, $_POST['perihal']);
$disposisi_1 = mysqli_real_escape_string($db, $_POST['disposisi_1']);
$tanggal_disposisi_1 = mysqli_real_escape_string($db, $_POST['tanggal_disposisi_1']);
$disposisi_2 = mysqli_real_escape_string($db, $_POST['disposisi_2']);
$tanggal_disposisi_2 = mysqli_real_escape_string($db, $_POST['tanggal_disposisi_2']);
$disposisi_3 = mysqli_real_escape_string($db, $_POST['disposisi_3']);
$tanggal_disposisi_3 = mysqli_real_escape_string($db, $_POST['tanggal_disposisi_3']);

$file_surat = $_FILES['file_surat']['name'];
$file_tmp = $_FILES['file_surat']['tmp_name'];
$file_type = $_FILES['file_surat']['type'];
$file_size = $_FILES['file_surat']['size'];

date_default_timezone_set('Asia/Jakarta');
$tanggal_entry = date("Y-m-d H:i:s");
$thnNow = date("Y");
$tgl_surat = date('Y-m-d', strtotime($tanggal_surat));
$tgl_disp1 = date('Y-m-d H:i:s', strtotime($tanggal_disposisi_1));
$tgl_disp2 = date('Y-m-d H:i:s', strtotime($tanggal_disposisi_2));
$tgl_disp3 = date('Y-m-d H:i:s', strtotime($tanggal_disposisi_3));

$sql = "SELECT * FROM tb_surat WHERE id='$id'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_array($query);

// Process file if it is uploaded
if ($file_surat == '') {
	// If no new file, retain the existing file name
	$nama_baru = $data['file_surat'];  // Keep the old file name

	// Update database without changing the file
	$sql = "UPDATE tb_surat SET 
                tanggal_surat = '$tgl_surat',
                kode_surat = '$kode_surat',
                nomor_surat = '$nomor_surat',
                pengirim = '$pengirim',
                penerima = '$penerima',
                perihal = '$perihal',
                disposisi_1 = '$disposisi_1',
                tanggal_disposisi_1 = '$tgl_disp1',
                disposisi_2 = '$disposisi_2',
                tanggal_disposisi_2 = '$tgl_disp2',
                disposisi_3 = '$disposisi_3',
                tanggal_disposisi_3 = '$tgl_disp3',
                file_surat = '$nama_baru'
            WHERE id = '$id'";

	$execute = mysqli_query($db, $sql);

	if (!$execute) {
		echo "Error updating record: " . mysqli_error($db);
	} else {
		echo "<Center><h2><br>Data Surat Telah Diubah</h2></center>
    <meta http-equiv='refresh' content='2;url=../detail-surat.php?id=" . $id . "'>";
	}
} else {
	// Validate file type and size before uploading
	if (($file_type == "application/pdf") && ($file_size <= 10340000)) {
		// Delete old file if it exists
		if (file_exists("../../admin/surat_keluar/" . $data['file_surat'])) {
			unlink("../../admin/surat_keluar/" . $data['file_surat']);
		}

		// Upload the new file
		$ext_file = substr($file_surat, strripos($file_surat, '.'));
		$nama_baru = $thnNow . '-' . $kode_surat . $ext_file;
		$path = "../../admin/surat_keluar/" . $nama_baru;
		move_uploaded_file($file_tmp, $path);

		// Update database with new file
		$sql = "UPDATE tb_surat SET 
                    tanggal_surat = '$tgl_surat',
                    kode_surat = '$kode_surat',
                    nomor_surat = '$nomor_surat',
                    pengirim = '$pengirim',
                    penerima = '$penerima',
                    perihal = '$perihal',
                    disposisi_1 = '$disposisi_1',
                    tanggal_disposisi_1 = '$tgl_disp1',
                    disposisi_2 = '$disposisi_2',
                    tanggal_disposisi_2 = '$tgl_disp2',
                    disposisi_3 = '$disposisi_3',
                    tanggal_disposisi_3 = '$tgl_disp3',
                    file_surat = '$nama_baru'
                WHERE id = '$id'";

		$execute = mysqli_query($db, $sql);

		echo "<Center><h2><br>Data Surat Telah Diubah</h2></center>
        <meta http-equiv='refresh' content='2;url=../detail-surat.php?id=" . $id . "'>";
	} else {
		echo "<Center><h2><br>File yang Anda masukkan tidak sesuai ketentuan. Silakan ulangi.</h2></center>
        <meta http-equiv='refresh' content='2;url=../editsurat.php?id=" . $id . "'>";
	}
}
