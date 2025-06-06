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
                  <h2>Surat Masuk ><small>Tambah Surat Masuk</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form action="proses/proses_inputsurat.php" name="formsuratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kategori">Kategori <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="kategori" name="kategori" value="Surat Masuk" required="required" maxlength="35" placeholder="Masukkan kategori" class="form-control col-md-7 col-xs-12" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Masuk <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker4'>
                          <input type='text' id="tanggal" name="tanggal" required="required" class="form-control" required="required" readonly="readonly" />
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kode Surat <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" onkeyup="validAngka(this)" id="kode_surat" name="kode_surat" required="required" maxlength="100" placeholder="Masukkan Kode Surat" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <?php
                    include '../koneksi/koneksi.php';
                    // Fetch the last 'nomorurut_suratmasuk' and generate the next number
                    $sql2 = "SELECT nomor_urut FROM tb_surat ORDER BY id DESC LIMIT 1";
                    $query2 = mysqli_query($db, $sql2);
                    $data = mysqli_fetch_array($query2);
                    $jumlah = mysqli_num_rows($query2);
                    $nomor = $data['nomor_urut'];

                    if ($jumlah == 0) {
                      $nomorbaru = "0001";
                    } else {
                      $nomormax = substr($nomor, 0, 4);
                      $nomorbaru = intval($nomormax) + 1;
                    }
                    ?>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Urut <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input value="<?php echo "$nomorbaru"; ?>" type="text" onkeyup="validAngka(this)" id="nomor_urut" name="nomor_urut" required="required" maxlength="4" placeholder="Masukkan Nomor Urut Surat" class="form-control col-md-7 col-xs-12">
                        <br>Nomor Urut harus 4 Digit (Pastikan Lihat Nomor Sebelumnya)</br>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Surat <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="nomor_surat" name="nomor_surat" required="required" maxlength="35" placeholder="Masukkan Nomor Surat" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Surat <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <input type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggal_surat" placeholder="Tanggal Surat" aria-describedby="inputSuccess2Status3" required="required" readonly="readonly">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pengirim </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input value="<?php echo $_SESSION['nama']; ?>" type="text" id="pengirim" name="pengirim" readonly="readonly" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <!-- Hidden input untuk id_bagian_pengirim -->
                    <input type="hidden" id="id_bagian_pengirim" name="id_bagian_pengirim" value="<?php echo $_SESSION['id']; ?>">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kepada <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="penerima" id="penerima" class="select2_single form-control" tabindex="-1">
                          <option value="">- Pilih Kepada -</option>
                          <?php
                          $sql = "SELECT id_bagian, nama_bagian FROM tb_bagian";
                          $query = mysqli_query($db, $sql);
                          while ($data = mysqli_fetch_array($query)) {
                            echo '<option value="' . $data['id_bagian'] . '">' . $data['nama_bagian'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <!-- Hidden input untuk menyimpan id_bagian_penerima dan nama_bagian -->
                    <input type="hidden" id="id_bagian_penerima" name="id_bagian_penerima" value="">
                    <input type="hidden" id="nama_bagian_penerima" name="nama_bagian_penerima" value="">

                    <script>
                      // JavaScript untuk mengupdate nilai id_bagian_penerima dan nama_bagian_penerima
                      document.getElementById('penerima').addEventListener('change', function() {
                        var penerimaId = this.value;
                        // Set value dari input hidden sesuai dengan id penerima yang dipilih
                        document.getElementById('id_bagian_penerima').value = penerimaId;

                        // Menambahkan nama bagian penerima ke input tersembunyi
                        var selectedOption = this.options[this.selectedIndex];
                        var namaBagian = selectedOption.text;
                        document.getElementById('nama_bagian_penerima').value = namaBagian;
                      });
                    </script>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea id="perihal" name="perihal" required="required" class="form-control" rows="3" placeholder="Masukkan Perihal Surat"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">File <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="file_surat" accept="application/pdf" type="file" id="file_surat" class="form-control" autocomplete="off" /> *max 10mb
                      </div>
                    </div>

                    <!-- <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Operator </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input value="<?php echo $_SESSION['nama']; ?>" type="text" id="operator" name="operator" readonly="readonly" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div> -->

                    <!-- Disposisi 1 -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Disposisi 1 </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="disposisi1" class="select2_single form-control" tabindex="-1">
                          <option></option>
                          <?php
                          $sql = "SELECT nama_bagian FROM tb_bagian";
                          $query = mysqli_query($db, $sql);
                          while ($data = mysqli_fetch_array($query)) {
                            echo '<option value="' . $data['nama_bagian'] . '">' . $data['nama_bagian'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 1 </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker'>
                          <input type='text' id="tanggal_disposisi1" name="tanggal_disposisi1" class="form-control" />
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>

                    <!-- Disposisi 2 -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Disposisi 2 </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="disposisi2" class="select2_single form-control" tabindex="-1">
                          <option></option>
                          <?php
                          $sql = "SELECT nama_bagian FROM tb_bagian";
                          $query = mysqli_query($db, $sql);
                          while ($data = mysqli_fetch_array($query)) {
                            echo '<option value="' . $data['nama_bagian'] . '">' . $data['nama_bagian'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 2 </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker'>
                          <input type='text' id="tanggal_disposisi2" name="tanggal_disposisi2" class="form-control" />
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>

                    <!-- Disposisi 3 -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Disposisi 3 </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="disposisi3" class="select2_single form-control" tabindex="-1">
                          <option></option>
                          <?php
                          $sql = "SELECT nama_bagian FROM tb_bagian";
                          $query = mysqli_query($db, $sql);
                          while ($data = mysqli_fetch_array($query)) {
                            echo '<option value="' . $data['nama_bagian'] . '">' . $data['nama_bagian'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 3 </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker'>
                          <input type='text' id="tanggal_disposisi3" name="tanggal_disposisi3" class="form-control" />
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <!-- Add more fields as necessary for your form structure -->

                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
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