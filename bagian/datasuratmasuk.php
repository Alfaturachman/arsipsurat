<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
?>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Arsip Surat Kota Samarinda</title>

  <!-- Bootstrap -->
  <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="../img/icon.ico">
  <!-- Custom Theme Style -->
  <link href="../assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- Profile and Sidebarmenu -->
      <?php
      include("sidebarmenu.php");
      ?>
      <!-- /Profile and Sidebarmenu -->

      <!-- top navigation -->
      <?php
      include("header.php");
      ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_right">
              <h2>Surat Masuk > <small>Data Surat Masuk</small></h2>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data<small>Surat Masuk</small></h2>
                  <div class="clearfix"></div>
                </div>
                <form action="" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="col-md-2 col-sm-2 col-xs-6">
                    <select name="bulan" class="select2_single form-control" tabindex="-1">
                      <option value="">Pilih Bulan</option>
                      <option value="01">Januari</option>
                      <option value="02">Februari</option>
                      <option value="03">Maret</option>
                      <option value="04">April</option>
                      <option value="05">Mei</option>
                      <option value="06">Juni</option>
                      <option value="07">Juli</option>
                      <option value="08">Agustus</option>
                      <option value="09">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-6">
                    <select name="tahun" class="select2_single form-control" tabindex="-1">
                      <option value="">Pilih Tahun</option>
                      <?php
                      for ($tahun = 2017; $tahun <= 2022; $tahun++) {
                        echo '<option value="' . $tahun . '">' . $tahun . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                  <a href="inputsuratmasuk.php">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Surat Masuk</button>
                  </a>
                </form>
                <div class="x_content">
                  <?php
                  include '../koneksi/koneksi.php';

                  // Ambil data bulan dan tahun dari form
                  $bulan = isset($_POST['bulan']) ? $_POST['bulan'] : '';
                  $tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';

                  // Ambil id_bagian dan nama dari session
                  $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : '';
                  $id_bagian = isset($_SESSION['id_bagian']) ? $_SESSION['id_bagian'] : '';

                  // Query SQL dasar
                  $sql1 = "SELECT * FROM tb_surat WHERE";

                  // Tambahkan kondisi untuk kategori "Surat Masuk"
                  $conditions = [];
                  if ($bulan != '') {
                    $conditions[] = "MONTH(tanggal_surat) = '$bulan'";
                  }
                  if ($tahun != '') {
                    $conditions[] = "YEAR(tanggal_surat) = '$tahun'";
                  }
                  if ($id_bagian != '') {
                    $conditions[] = "id_bagian_pengirim = '$id_bagian'";
                  }

                  // Tambahkan logika untuk "Surat Masuk"
                  $conditionsMasuk = implode(' AND ', $conditions);
                  if (!empty($conditionsMasuk)) {
                    $conditionsMasuk = "kategori = 'Surat Masuk' AND ($conditionsMasuk OR pengirim = '$nama')";
                  } else {
                    $conditionsMasuk = "kategori = 'Surat Masuk' AND pengirim = '$nama'";
                  }

                  // Tambahkan logika untuk "Surat Keluar"
                  $conditionsKeluar = "kategori = 'Surat Keluar' AND penerima = '$nama'";

                  // Gabungkan kondisi "Surat Masuk" dan "Surat Keluar" dengan OR
                  $sql1 .= " ($conditionsMasuk) OR ($conditionsKeluar)";

                  // Tambahkan pengurutan
                  $sql1 .= " ORDER BY id ASC";

                  // Debug: Output query untuk memeriksa kesalahan
                  // echo $sql1; exit;

                  // Jalankan query
                  $query1 = mysqli_query($db, $sql1);

                  // Periksa apakah query berhasil
                  if (!$query1) {
                    die("Query Error: " . mysqli_error($db));
                  }

                  // Menghitung jumlah baris yang ditemukan
                  $total = mysqli_num_rows($query1);

                  // Jika tidak ada data, tampilkan pesan
                  if ($total == 0) {
                    echo "<center><h2>Belum Ada Data Surat Keluar</h2></center>";
                  } else { ?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No Urut</th>
                          <th>Tanggal</th>
                          <th>Kode Surat</th>
                          <th>Tanggal Surat</th>
                          <th>Nomor Surat</th>
                          <th>Perihal</th>
                          <th>Pengirim</th>
                          <th>Kepada</th>
                          <th>Disposisi 1</th>
                          <th>Disposisi 2</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        while ($data = mysqli_fetch_array($query1)) { ?>
                          <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['tanggal']; ?></td>
                            <td><?= $data['kode_surat']; ?></td>
                            <td><?= $data['tanggal_surat']; ?></td>
                            <td><?= $data['nomor_surat']; ?></td>
                            <td><?= $data['perihal']; ?></td>
                            <td><?= $data['pengirim']; ?></td>
                            <td><?= $data['penerima']; ?></td>
                            <td style="text-align:center;">
                              <a href="../cetak/disposisi.php?id=<?= $data['id'] ?>">
                                <button type="button" title="Unduh File" class="btn btn-success btn-xs">
                                  <i class="fa fa-file-text-o"></i>
                                </button>
                              </a>
                            </td>
                            <td style="text-align:center;">
                              <a href="../cetak/cetak.php?id=<?= $data['id'] ?>">
                                <button type="button" title="Unduh File" class="btn btn-success btn-xs">
                                  <i class="fa fa-file-text-o"></i>
                                </button>
                              </a>
                            </td>
                            <td style="text-align:center;">
                              <a href="../admin/surat_masuk/<?= $data['file_surat'] ?>" download>
                                <button type="button" title="Unduh File" class="btn btn-success btn-xs">
                                  <i class="fa fa-download"></i>
                                </button>
                              </a>
                              <a href="detail-suratmasuk.php?id=<?= $data['id']; ?>">
                                <button type="button" title="Detail" class="btn btn-info btn-xs">
                                  <i class="fa fa-file-image-o"></i>
                                </button>
                              </a>
                              <a href="editsuratmasuk.php?id=<?= $data['id']; ?>">
                                <button type="button" title="Edit" class="btn btn-default btn-xs">
                                  <i class="fa fa-edit"></i>
                                </button>
                              </a>
                              <a onclick="return konfirmasi()" href="proses/proses_hapus_surat.php?id=<?= $data['id']; ?>">
                                <button type="button" title="Hapus" class="btn btn-danger btn-xs">
                                  <i class="fa fa-trash-o"></i>
                                </button>
                              </a>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../assets/vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="../assets/vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../assets/vendors/jszip/dist/jszip.min.js"></script>
  <script src="../assets/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../assets/vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../assets/build/js/custom.min.js"></script>
  <script type="text/javascript" language="JavaScript">
    function konfirmasi() {
      tanya = confirm("Anda Yakin Akan Menghapus Data ?");
      if (tanya == true) return true;
      else return false;
    }
  </script>

</body>

</html>