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
            <TABLE WIDTH="100%">
                <TR>
                    <TD ALIGN="CENTER" WIDTH="60%">
                        <FONT SIZE="5">
                            <B>PEMERINTAH PROVINSI JAWA TENGAH</B>
                            <br>
                            DINAS PEKERJAAN UMUM<br> SUMBER DAYA AIR DAN PENATAAN RUANG<br>
                            Jl. Madukoro Blok AA-BB TELP. 7608391, 7608374, 7608371 FAX, <BR>
                            7612524 SEMARANG 50144,
                            <BR>

                            <FONT SIZE="4">
                                Email: pusdataru@jatengprov.go.id, dpusdataru@jatengprov.go.id
                            </FONT>
                    </TD>
                </TR>
            </TABLE>
            <hr style="border: 2px solid;">
            <br>
            <?php
            $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', strtotime($_GET['bulan']));
            if (isset($_GET['bulan']) && $_GET['tahun']) {
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $no = 1;
                $sql1 = mysqli_query($db, "SELECT * FROM tb_suratkeluar WHERE MONTH(tanggalkeluar_suratkeluar)='$bulan' AND YEAR(tanggalkeluar_suratkeluar)='$tahun'") or die($db->error);
                $suratmasuk = mysqli_fetch_array($sql1);
            ?>
                <FONT SIZE="5">
                    <center><B>Laporan Cetak Surat Keluar<br> <?php echo $nama_bulan[$_GET['bulan']]; ?>&nbsp;
                            <?php echo $_GET['tahun']; ?><br /></b>
                </FONT>
                <br><br>
                <table width="100%" align="center" cellspacing="0" cellpadding="2" border="1px" class="style1">
                    <tr>

                        <th>Nomor Surat</th>
                        <th>Tanggal Keluar</th>
                        <th>Kode Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Bagian</th>
                        <th>Kepada</th>
                        <th>Perihal</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', strtotime($_GET['bulan']));
                        if (isset($_GET['bulan']) && $_GET['tahun']) {
                            $bulan = $_GET['bulan'];
                            $tahun = $_GET['tahun'];
                            $no = 1;
                            $sql1 = mysqli_query($db, "SELECT * FROM tb_suratkeluar WHERE MONTH(tanggalkeluar_suratkeluar)='$bulan' AND YEAR(tanggalkeluar_suratkeluar)='$tahun'") or die($db->error);
                            while ($suratmasukk = mysqli_fetch_array($sql1)) {
                        ?>
                                <tr>
                                    <td>
                                        <center><?php echo $suratmasukk['nomor_suratkeluar']; ?>
                                    </td>
                                    <td>
                                        <center><?php echo $suratmasukk['tanggalkeluar_suratkeluar']; ?>
                                    </td>
                                    <td>
                                        <center><?php echo $suratmasukk['kode_suratkeluar']; ?>
                                    </td>
                                    <td>
                                        <center><?php echo $suratmasukk['tanggalsurat_suratkeluar']; ?>
                                    </td>
                                    <td>
                                        <center><?php echo $suratmasukk['nama_bagian']; ?>
                                    </td>
                                    <td>
                                        <center><?php echo $suratmasukk['kepada_suratkeluar']; ?>
                                    </td>
                                    <td>
                                        <center><?php echo $suratmasukk['perihal_suratkeluar']; ?>
                                    </td>
                                    
                                </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                <?php
                        }
                ?>
            <?php
            }
            ?>
                </table>
        </div><!-- col-lg-12-->
    </div><!-- /row -->
    <script>
        window.print()
    </script>
</body>

</html>