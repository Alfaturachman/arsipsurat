<?php
session_start();
include "login/ceksession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Arsip Surat Kota Semarang </title>

  <!-- Bootstrap -->
  <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="../assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link href="../assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="../assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- bootstrap-datetimepicker -->
  <link href="../assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
  <!-- starrr -->
  <link href="../assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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
            <div class="title_left">
              <h3>Surat Masuk</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Surat Masuk <small>Detail Surat Masuk</small></h2>
                  <div class="clearfix"></div>
                </div>
                <?php
                include '../koneksi/koneksi.php';

                // Ambil data berdasarkan ID dari URL
                $id = mysqli_real_escape_string($db, $_GET['id']);
                $sql = "SELECT * FROM tb_surat WHERE id = '$id'";
                $query = mysqli_query($db, $sql);

                if (!$query || mysqli_num_rows($query) == 0) {
                  echo "Data tidak ditemukan.";
                  exit;
                }

                $data = mysqli_fetch_array($query);

                // Proses update status jika ada permintaan POST
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
                  $id = intval($_POST['id']);
                  $status = mysqli_real_escape_string($db, $_POST['status']);

                  $updateQuery = "UPDATE tb_surat SET status = '$status' WHERE id = $id";
                  if (mysqli_query($db, $updateQuery)) {
                    echo "Status berhasil diperbarui.";
                  } else {
                    echo "Gagal memperbarui status: " . mysqli_error($db);
                  }
                  exit;
                }
                ?>
                <div class="x_content">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2>Detail Surat</h2>
                      </div>
                    </div>
                    <div class="x_content">
                    </div>
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td width="40%">Tanggal Surat</td>
                          <td><?php echo $data['tanggal_surat']; ?></td>
                        </tr>
                        <tr>
                          <td>Kode Surat</td>
                          <td><?php echo $data['kode_surat']; ?></td>
                        </tr>
                        <tr>
                          <td>Nomor Surat</td>
                          <td><?php echo $data['nomor_surat']; ?></td>
                        </tr>
                        <tr>
                          <td>Penerima</td>
                          <td><?php echo $data['penerima']; ?></td>
                        </tr>
                        <tr>
                          <td>Pengirim</td>
                          <td><?php echo $data['pengirim']; ?></td>
                        </tr>
                        <tr>
                          <td>Perihal</td>
                          <td><?php echo $data['perihal']; ?></td>
                        </tr>
                        <tr>
                          <td>Kategori</td>
                          <td><?php echo $data['kategori']; ?></td>
                        </tr>
                        <tr>
                          <td>File Surat</td>
                          <td>
                            <?php if ($data['file_surat'] != '') { ?>
                              <a href="<?php echo '../admin/surat_masuk/' . $data['file_surat']; ?>"><b>Unduh File</b></a>
                            <?php } else { ?>
                              <span>Tidak ada file</span>
                            <?php } ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Disposisi 1</td>
                          <td><?php echo $data['disposisi_1']; ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Disposisi 1</td>
                          <td><?php echo $data['tanggal_disposisi_1']; ?></td>
                        </tr>
                        <tr>
                          <td>Disposisi 2</td>
                          <td><?php echo $data['disposisi_2']; ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Disposisi 2</td>
                          <td><?php echo $data['tanggal_disposisi_2']; ?></td>
                        </tr>
                        <tr>
                          <td>Disposisi 3</td>
                          <td><?php echo $data['disposisi_3']; ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Disposisi 3</td>
                          <td><?php echo $data['tanggal_disposisi_3']; ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Entry</td>
                          <td><?php echo $data['created_at']; ?></td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td>
                            <select name="status" onchange="updateStatus(<?php echo $id; ?>, this.value)">
                              <option value="Diproses" <?php echo ($data['status'] == 'Diproses') ? 'selected' : ''; ?>>Diproses</option>
                              <option value="Disetujui" <?php echo ($data['status'] == 'Disetujui') ? 'selected' : ''; ?>>Disetujui</option>
                              <option value="Ditolak" <?php echo ($data['status'] == 'Ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="text-right">
                      <a href="datasuratkeluar.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                    </div>
                  </div>
                </div>
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
  <!-- morris.js -->
  <script src="../assets/vendors/raphael/raphael.min.js"></script>
  <script src="../assets/vendors/morris.js/morris.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../assets/vendors/moment/min/moment.min.js"></script>
  <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../assets/build/js/custom.min.js"></script>
  <script>
    function updateStatus(id, status) {
      // Membuat permintaan AJAX
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      // Kirim data ID dan status ke server
      xhr.send("id=" + id + "&status=" + status);

      xhr.onload = function() {
        if (xhr.status === 200) {
          alert("Berhasil ganti status");
        } else {
          alert("Gagal memperbarui status.");
        }
      };
    }
  </script>
</body>

</html>