<?php

include '../../koneksi/koneksi.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arsip Surat Kota Samarinda</title>
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

</html>