<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header-section {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo-text {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {
            width: 80px;
            margin-right: 20px;
        }

        .diteruskan {
            font-size: 11px;
        }

        .diteruskan td {
            padding: 0px 0px;
            line-height: 1;
        }

        .checkbox-cell {
            width: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 1px;
            text-align: left;
        }

        .header-section {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .no-border {
            border: none;
        }

        .checkbox-cell {
            width: 10px;
            text-align: center;
        }

        .textarea {
            height: 100px;
        }

        /* CSS for printing in F4 paper size and landscape orientation */
        @page {
            size: 33cm 21.6cm;
            orientation: landscape;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<?php
include '../koneksi/koneksi.php';
// Mengambil data dari tabel
$id      = $_GET['id'];
$sql      = "SELECT * FROM tb_surat where id='" . $id . "'";
$query    = mysqli_query($db, $sql);
$data     = mysqli_fetch_array($query);
?>

<body>
    <div class="header-section">
        <div class="logo-text">
            <img src="../img/jawa_tengah.png" width="50px" alt="Logo" class="logo">
            <div class="text">
                PEMERINTAH PROVINSI JAWA TENGAH<br>
                DINAS PEKERJAAN UMUM<br>
                SUMBER DAYA AIR DAN PENATAAN RUANG<br>
                <span style="font-size: 14px;">Jl. Madukoro Blok. AA-BB Telp (024) 7608201 (Hunting) Fax. 7612334 Semarang 50144</span>
            </div>
        </div>
    </div>
    <td style="font-weight: bold;">Kode : <?php echo $data['kode_surat']; ?>/<?php echo $data['nomor_surat']; ?></td>

    <table>
        <tr>
            <td colspan="2" style="text-align: center; font-size: 16px; font-weight: bold;">LEMBAR DISPOSISI KEPALA DINAS</td>
            <td style="text-align: center; font-size: 16px; font-weight: bold;">ISI INTRUKSI / INFORMASI</td>
        </tr>
        <tr>
            <td style="width: 10%;">Tanggal Surat</td>
            <td>: <?php echo $data['tanggal_surat']; ?></td>
            <td rowspan="4">
                <input type="checkbox"> Tanggapan dan saran <br>
                <input type="checkbox"> Tanggapan lebih lanjut <br>
                <input type="checkbox"> Koordinasi / Konfirmasi <br>
                <input type="checkbox"> ........................................
            </td>
        </tr>
        <tr>
            <td>Nomor Surat</td>
            <td>: <?php echo $data['nomor_surat']; ?></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>: <?php echo $data['perihal']; ?></td>
        </tr>
        <tr>
            <td>Dari</td>
            <td>: <?php echo $data['pengirim']; ?></td>
        </tr>
    </table>

    <table class="diteruskan">
        <tr>
            <td colspan="2" style="text-align: center; font-size: 16px; font-weight: bold;">DITERUSKAN</td>
            <td style="text-align: center; font-size: 16px; font-weight: bold;">KETERANGAN</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Sekretaris</td>
            <td rowspan="25" style="text-align: center; vertical-align: top; font-size: 14px;">
                Sifat : Biasa / Penting Segera / Mendesak / Mendesak Sekali
                <p id="keterangan" style="display: none; font-weight: bold;">Sifat : Biasa / Penting Segera / Mendesak / Mendesak Sekali</p>
                <p id="keterangan" style="display: none; text-align: center; font-size: 14px;"></p>
            </td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Ka. Bid PPT</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Ka. Bid IAB</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Ka. Bid SBP</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Ka. Bid TARU</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Ka. Balai PSDA</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>BK / SLN / PBL / SC / PC / BS</td>
        </tr>
        <!-- <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>..............................</td>
        </tr> -->
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Kasubag Umpeg</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Kasubag Prorgram</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Kasubag Keuangan</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor SID</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor HSI</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor BANGGUNA</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor OP Bid. IAB</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor PR Bid. IAB</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Kasi KMA</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor OP Bid. SBP </td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor PR Bid SBP</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor PBP</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor RANTARU</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor MANRU</td>
        </tr>
        <tr>
            <td class="checkbox-cell"><input type="checkbox"></td>
            <td>Subkoor DALTARU</td>
        </tr>
    </table>

    <script>
        document.querySelectorAll('.checkbox-cell input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var keterangan = document.getElementById('keterangan');
                var selectedNames = [];

                // Loop untuk mengecek semua checkbox yang dicentang
                document.querySelectorAll('.checkbox-cell input[type="checkbox"]:checked').forEach(function(checkedCheckbox) {
                    // Ambil nama bagian yang sesuai
                    var row = checkedCheckbox.closest('tr');
                    var nameCell = row.querySelector('td:nth-child(2)'); // Ambil sel nama dari baris yang sama
                    selectedNames.push(nameCell.innerText); // Simpan nama bagian yang dicentang
                });

                // Tampilkan keterangan jika ada checkbox yang dicentang
                if (selectedNames.length > 0) {
                    // Gabungkan nama yang dicentang dengan penomoran
                    keterangan.innerText = 'Yth.\n' + selectedNames.map(function(name, index) {
                        return (index + 1) + '. ' + name; // Tambahkan penomoran
                    }).join('\n'); // Gunakan newline untuk menampilkan setiap item di baris baru

                    keterangan.style.display = 'block'; // Tampilkan keterangan
                } else {
                    keterangan.style.display = 'none'; // Sembunyikan keterangan
                }
            });
        });
    </script>

</body>

</html>