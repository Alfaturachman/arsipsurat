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
                  <h2>Surat Masuk ><small>Edit Surat Masuk</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form action="proses/proses_editsurat.php" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <?php
                    include '../koneksi/koneksi.php';
                    $id = mysqli_real_escape_string($db, $_GET['id']);
                    $sql = "SELECT * FROM tb_surat WHERE id='$id'";
                    $query = mysqli_query($db, $sql);
                    $data = mysqli_fetch_array($query);
                    $tgl_surat = date('m-d-Y', strtotime($data['tanggal_surat']));
                    $tgl_disposisi_1 = date('m-d-Y', strtotime($data['tanggal_disposisi_1']));
                    $tgl_disposisi_2 = date('m-d-Y', strtotime($data['tanggal_disposisi_2']));
                    $tgl_disposisi_3 = date('m-d-Y', strtotime($data['tanggal_disposisi_3']));
                    ?>

                    <input type="hidden" name="id_surat" value="<?php echo $id; ?>">

                    <!-- Tanggal Surat -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Surat <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" value="<?php echo $tgl_surat; ?>" class="form-control" id="tanggal_surat" name="tanggal_surat" required="required" readonly="readonly" />
                      </div>
                    </div>

                    <!-- Kode Surat -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Surat <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input value="<?php echo $data['kode_surat']; ?>" type="text" id="kode_surat" name="kode_surat" required="required" class="form-control">
                      </div>
                    </div>

                    <!-- Nomor Surat -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Surat <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input value="<?php echo $data['nomor_surat']; ?>" type="text" id="nomor_surat" name="nomor_surat" required="required" class="form-control">
                      </div>
                    </div>

                    <!-- Pengirim -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pengirim <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input value="<?php echo $data['pengirim']; ?>" type="text" id="pengirim" name="pengirim" required="required" class="form-control">
                      </div>
                    </div>

                    <!-- Penerima -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Penerima <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input value="<?php echo $data['penerima']; ?>" type="text" id="penerima" name="penerima" required="required" class="form-control">
                      </div>
                    </div>

                    <!-- Perihal -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea id="perihal" name="perihal" required="required" class="form-control"><?php echo $data['perihal']; ?></textarea>
                      </div>
                    </div>

                    <!-- File Surat -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">File Surat <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="file_surat" accept="application/pdf" type="file" id="file_surat" class="form-control">
                        <a href="<?php echo 'surat_masuk/' . $data['file_surat']; ?>"><b>Lihat File Sebelumnya</b></a> (Maksimal 10 MB)
                      </div>
                    </div>

                    <!-- Disposisi 1 -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Disposisi 1</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea id="disposisi_1" name="disposisi_1" class="form-control"><?php echo $data['disposisi_1']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Disposisi 1</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" value="<?php echo $tgl_disposisi_1; ?>" class="form-control" id="tanggal_disposisi_1" name="tanggal_disposisi_1" />
                      </div>
                    </div>

                    <!-- Disposisi 2 -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Disposisi 2</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea id="disposisi_2" name="disposisi_2" class="form-control"><?php echo $data['disposisi_2']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Disposisi 2</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" value="<?php echo $tgl_disposisi_2; ?>" class="form-control" id="tanggal_disposisi_2" name="tanggal_disposisi_2" />
                      </div>
                    </div>

                    <!-- Disposisi 3 -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Disposisi 3</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea id="disposisi_3" name="disposisi_3" class="form-control"><?php echo $data['disposisi_3']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Disposisi 3</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" value="<?php echo $tgl_disposisi_3; ?>" class="form-control" id="tanggal_disposisi_3" name="tanggal_disposisi_3" />
                      </div>
                    </div>

                    <!-- Button -->
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="datasuratmasuk.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
                        <button type="submit" name="update" value="Update" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
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
  <!-- bootstrap-progressbar -->
  <script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="../assets/vendors/iCheck/icheck.min.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../assets/vendors/moment/min/moment.min.js"></script>
  <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-wysiwyg -->
  <script src="../assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="../assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="../assets/vendors/google-code-prettify/src/prettify.js"></script>
  <!-- jQuery Tags Input -->
  <script src="../assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
  <!-- Switchery -->
  <script src="../assets/vendors/switchery/dist/switchery.min.js"></script>
  <!-- Select2 -->
  <script src="../assets/vendors/select2/dist/js/select2.full.min.js"></script>
  <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-datetimepicker -->
  <script src="../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <!-- Parsley -->
  <script src="../assets/vendors/parsleyjs/dist/parsley.min.js"></script>
  <!-- Autosize -->
  <script src="../assets/vendors/autosize/dist/autosize.min.js"></script>
  <!-- jQuery autocomplete -->
  <script src="../assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
  <!-- starrr -->
  <script src="../assets/vendors/starrr/dist/starrr.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="../assets/build/js/custom.min.js"></script>
  <!-- Initialize datetimepicker -->
  <script>
    $('#myDatepicker').datetimepicker();

    $('#myDatepicker2').datetimepicker({
      format: 'DD.MM.YYYY'
    });

    $('#myDatepicker3').datetimepicker({
      format: 'hh:mm A'
    });

    $('#myDatepicker4').datetimepicker({
      ignoreReadonly: true,
      allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();

    $('#datetimepicker7').datetimepicker({
      useCurrent: false
    });

    $("#datetimepicker6").on("dp.change", function(e) {
      $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function(e) {
      $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
  </script>
  <script language='javascript'>
    function validAngka(a) {
      if (!/^[0-9.]+$/.test(a.value)) {
        a.value = a.value.substring(0, a.value.length - 1000);
      }
    }
  </script>
</body>

</html>