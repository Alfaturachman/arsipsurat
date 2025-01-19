<?php
include '../../koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Surat Keluar</title>
    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
        }

        .header b {
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #4caaf9;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <b>PEMERINTAH PROVINSI JAWA TENGAH</b><br>
        DINAS PEKERJAAN UMUM SUMBER DAYA AIR DAN PENATAAN RUANG<br>
        Jl. Madukoro Blok AA-BB, Telp. 7608391, Semarang 50144<br>
        Email: pusdataru@jatengprov.go.id
    </div>
    <hr>
    <?php
    // Menentukan nama bulan dalam format Indonesia
    $nama_bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    // Mengambil semua data surat keluar
    $stmt = $db->prepare("
        SELECT 
            id_suratkeluar AS nomor_urut,
            tanggalkeluar_suratkeluar AS tanggal_keluar,
            kode_suratkeluar AS kode_surat,
            tanggalsurat_suratkeluar AS tanggal_surat,
            nama_bagian AS pengirim,
            nomor_suratkeluar AS nomor_surat,
            kepada_suratkeluar AS penerima,
            perihal_suratkeluar AS perihal
        FROM tb_suratkeluar
        ORDER BY tanggalkeluar_suratkeluar ASC
    ");
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<div class='center'>";
    echo "<b>Laporan Cetak Surat Keluar (Semua Data)</b>";
    echo "</div>";

    // Memeriksa apakah ada data surat keluar
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<thead>';
        echo '<tr>
                <th>No Urut</th>
                <th>Tanggal Keluar</th>
                <th>Kode Surat</th>
                <th>Tanggal Surat</th>
                <th>Pengirim</th>
                <th>Nomor Surat</th>
                <th>Kepada</th>
                <th>Perihal</th>
              </tr>';
        echo '</thead>';
        echo '<tbody>';

        // Menampilkan data dalam tabel
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['nomor_urut']) . '</td>';
            echo '<td>' . date('d-m-Y', strtotime($row['tanggal_keluar'])) . '</td>';
            echo '<td>' . htmlspecialchars($row['kode_surat']) . '</td>';
            echo '<td>' . date('d-m-Y', strtotime($row['tanggal_surat'])) . '</td>';
            echo '<td>' . htmlspecialchars($row['pengirim']) . '</td>';
            echo '<td>' . htmlspecialchars($row['nomor_surat']) . '</td>';
            echo '<td>' . htmlspecialchars($row['penerima']) . '</td>';
            echo '<td>' . htmlspecialchars($row['perihal']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "<p class='center'><b>Tidak ada data surat keluar.</b></p>";
    }
    ?>
    <script>
        window.print();
    </script>
</body>

</html>
