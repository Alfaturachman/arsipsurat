<?php

include '../../koneksi/koneksi.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arsip Surat Kota Semarang</title>
    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
</head>

<body>
    <div class="col-md-12">
        <div class="panel panel-default">
            <table width="100%">
                <tr>
                    <td align="center" width="60%">
                        <font size="5">
                            <b>PEMERINTAH PROVINSI JAWA TENGAH</b><br>
                            DINAS PEKERJAAN UMUM<br> SUMBER DAYA AIR DAN PENATAAN RUANG<br>
                            Jl. Madukoro Blok AA-BB TELP. 7608391, 7608374, 7608371 FAX,<br>
                            7612524 SEMARANG 50144,<br>
                        </font>
                        <font size="4">
                            Email: pusdataru@jatengprov.go.id, dpusdataru@jatengprov.go.id
                        </font>
                    </td>
                </tr>
            </table>
            <hr style="border: 2px solid;">
            <br>
            <?php
            $nama_bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            if (!empty($_GET['bulan']) && !empty($_GET['tahun'])) {
                $bulan = intval($_GET['bulan']);
                $tahun = intval($_GET['tahun']);
                $no = 1;

                $stmt = $db->prepare("SELECT * FROM tb_surat WHERE MONTH(tanggal) = ? AND YEAR(tanggal) = ? AND kategori = 'Surat Keluar'");
                $stmt->bind_param('ii', $bulan, $tahun);
                $stmt->execute();
                $result = $stmt->get_result();
            ?>
                <font size="5">
                    <center>
                        <b>Laporan Cetak Surat Keluar<br> <?= $nama_bulan[$bulan]; ?>&nbsp;<?= $tahun; ?><br></b>
                    </center>
                </font>
                <br><br>
                <table width="100%" align="center" cellspacing="0" cellpadding="2" border="1px" class="style1">
                    <thead>
                        <tr>
                            <th>No Urut</th>
                            <th>Tanggal Keluar</th>
                            <th>Kode Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Pengirim</th>
                            <th>Nomor Surat</th>
                            <th>Kepada</th>
                            <th>Perihal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td align="center"><?= htmlspecialchars($row['nomor_urut']); ?></td>
                                <td align="center"><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                                <td align="center"><?= htmlspecialchars($row['kode_surat']); ?></td>
                                <td align="center"><?= date('d-m-Y', strtotime($row['tanggal_surat'])); ?></td>
                                <td align="center"><?= htmlspecialchars($row['pengirim']); ?></td>
                                <td align="center"><?= htmlspecialchars($row['nomor_surat']); ?></td>
                                <td align="center"><?= htmlspecialchars($row['penerima']); ?></td>
                                <td align="center"><?= htmlspecialchars($row['perihal']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php
            } else {
                echo "<center><b>Silakan pilih bulan dan tahun untuk mencetak laporan.</b></center>";
            }
            ?>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html><?php
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
