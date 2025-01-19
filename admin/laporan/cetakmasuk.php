<?php
include '../../koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Surat Masuk</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
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

        table th, table td {
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
    $stmt = $db->prepare("
        SELECT 
            nomor_urut,
            tanggal,
            kode_surat,
            tanggal_surat,
            pengirim,
            nomor_surat,
            penerima,
            perihal,
            kategori
        FROM tb_surat
        WHERE kategori = 'Surat Keluar'
        ORDER BY tanggal ASC
    ");
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<div class='center'>";
    echo "<b>Laporan Cetak Semua Surat</b>";
    echo "</div>";

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

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['nomor_urut']) . '</td>';
            echo '<td>' . date('d-m-Y', strtotime($row['tanggal'])) . '</td>';
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
