<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Memo</title>

    <style>
        /* Mengatur orientasi kertas A4 landscape untuk cetak */
        @media print {
            @page {
                size: A4 landscape;
                margin: 10mm 10mm 10mm 10mm;
                /* Margin lebih besar di kanan untuk posisi konten di kiri */
            }

            /* Mengatur lebar penuh saat dicetak dalam mode landscape */
            .container {
                width: 100%;
                max-width: none;
                padding: 20px;
                margin-left: 0;
                /* Mengatur posisi konten di paling kiri */
            }
        }

        .container {
            width: 50%;
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid black;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            font-weight: bold;
            line-height: 1.0;
        }

        .logo {
            width: 50px;
            float: left;
            margin-right: 10px;
        }

        .memo-title {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
            font-weight: bold;
        }

        .field-group {
            margin: 10px 0;
        }

        .checkbox-group label {
            display: block;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }

        .sign {
            text-align: center;
            margin-top: 40px;
            font-weight: bold;
        }

        .textarea {
            width: 100%;
            height: 200px;
        }
    </style>
</head>

<?php
include '../koneksi/koneksi.php';
// Mengambil data dari tabel
$id      = $_GET['id_suratmasuk'];
$sql      = "SELECT * FROM tb_suratmasuk where id_suratmasuk='" . $id . "'";
$query    = mysqli_query($db, $sql);
$data     = mysqli_fetch_array($query);
?>

<body>

    <div class="container">
        <!-- Bagian Header -->
        <div class="header">
            <img src="logo.png" alt="Logo" class="logo"> <!-- Ganti logo.png dengan logo instansi -->
            PEMERINTAH PROVINSI JAWA TENGAH<br>
            DINAS PEKERJAAN UMUM<br>
            SUMBER DAYA AIR DAN PENATAAN RUANG<br>
            Jl. Madukoro Blok AA-BB TELP. 7608391, 7608374, 7608371 FAX. 7612524 SEMARANG 50144<br>
            Email: pusdataru@jatengprov.go.id, dpusdataru@jatengprov.go.id
        </div>
        <div>
            <tr>
                <td style="font-weight: bold;">Kode :
                    <?php echo $data['kode_suratmasuk']; ?>/<?php echo $data['nomorurut_suratmasuk']; ?></td>
            </tr>
            <tr>
                <td> / Tanggal Masuk</td>
                <td>: <?php echo $data['tanggalmasuk_suratmasuk']; ?></td>
            </tr>
        </div>

        <div>
            <tr>
                <td>Nomor Surat</td>
                <td>: <?php echo $data['nomor_suratmasuk']; ?></td>
            </tr>
            <tr>
                <td> / Tanggal Surat</td>
                <td>: <?php echo $data['tanggalsurat_suratmasuk']; ?></td>
            </tr>
        </div>
        <div>
            <tr>
                <td>Perihal</td>
                <td>: <?php echo $data['perihal_suratmasuk']; ?></td>
            </tr>
        </div>
        <div>
            <tr>
                <td>Dari</td>
                <td>: <?php echo $data['pengirim']; ?></td>
            </tr>
        </div>

        <!-- Judul Memo -->
        <div class="memo-title">DISPOSISI</div>

        <!-- Form Memo -->
        <form action="simpan_memo.php" method="post">
            <!-- Input Isi Memo -->
            <div class="field-group">
                <label for="isi_memo">Isi Memo:</label>
                <textarea name="isi_memo" id="isi_memo" class="textarea" placeholder="Masukkan isi memo di sini..."
                    <td> <?php echo $data['perihal_suratmasuk']; ?>  </textarea>


            </div>

            <!-- Bidang PPT -->
            <div class="field-group">
                <label>Bidang PPT:</label>
                <div class="checkbox-group">
                    <td class="checkbox-cell">
                        <input type="checkbox" id="bangguna" name="bidang_ppt[]" value="Bangguna">
                    </td>
                    <label for="bangguna">Bangguna</label>
                    <input type="checkbox" id="hidrosisda" name="bidang_ppt[]" value="Hidrosisda">
                    <label for="hidrosisda">Hidrosisda</label>
                    <input type="checkbox" id="sid" name="bidang_ppt[]" value="SID">
                    <label for="sid">SID</label>

                    <table class="diteruskan">
                        <tr>
                            <td colspan="2" style="text-align: center; font-size: 16px; font-weight: bold;">DITERUSKAN
                            </td>
                            <td style="text-align: center; font-size: 16px; font-weight: bold;">KETERANGAN</td>
                        </tr>
                        <tr>
                            <td class="checkbox-cell"><input type="checkbox"></td>
                            <td>Sekretaris</td>
                            <td rowspan="25" style="text-align: center; vertical-align: top; font-size: 14px;">
                                Sifat : Biasa / Penting Segera / Mendesak / Mendesak Sekali
                                <p id="keterangan" style="display: none; font-weight: bold;">Sifat : Biasa / Penting
                                    Segera / Mendesak / Mendesak Sekali</p>
                                <p id="keterangan" style="display: none; text-align: center; font-size: 14px;"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="checkbox-cell"><input type="checkbox" id="bangguna" name="bidang_ppt[]"
                                    value="Bangguna"></td>
                            <td>Ka. BANGGUNA</td>
                        </tr>
                        <tr>
                            <td class="checkbox-cell"><input type="checkbox" id="hidrosisda" name="bidang_ppt[]"
                                    value="Hidrosisda"></td>
                            <td>Ka. HIDROSISDA</td>
                        </tr>
                        <tr>
                            <td class="checkbox-cell"><input type="checkbox" id="sid" name="bidang_ppt[]" value="SID">
                            </td>
                            <td>Ka. SID</td>

                        </tr>

                    </table>


                </div>
            </div>

            <!-- Footer Memo -->
            <div class="footer">
                Kepala Bidang Pengembangan dan Pembinaan Teknis
            </div>

            <!-- Tanda Tangan -->
            <div class="sign">
                Agung Prihantono, ST. M.Tech<br>
                NIP. 19680612 198811 1 002
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" name="submit">Simpan Memo</button>
        </form>



    </div>

    <script>
        document.querySelectorAll('.checkbox-cell input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var keterangan = document.getElementById('keterangan');
                var selectedNames = [];

                // Loop untuk mengecek semua checkbox yang dicentang
                document.querySelectorAll('.checkbox-cell input[type="checkbox"]:checked').forEach(function(
                    checkedCheckbox) {
                    // Ambil nama bagian yang sesuai
                    var row = checkedCheckbox.closest('tr');
                    var nameCell = row.querySelector(
                        'td:nth-child(2)'); // Ambil sel nama dari baris yang sama
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