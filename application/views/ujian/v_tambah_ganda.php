<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $judul; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">



</head>
<body class="hold-transition skin-blue sidebar-mini" style="background: black;" >

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $judul; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url('soal/c_soal/tambah'); ?>" method="post" >
              <input type="hidden" name="nip" value="<?php echo $ujian['nip']; ?>" >
              <input type="hidden" name="id_mapel" value="<?php echo $ujian['id_mapel']; ?>" >
              <input type="hidden" name="id_kelas" value="<?php echo $ujian['id_kelas']; ?>" >
              <input type="hidden" name="nama_soal" value="<?php echo $ujian['nama_soal']; ?>" >
              <input type="hidden" name="jenis" value="<?php echo $ujian['jenis']; ?>" >
              <input type="hidden" name="jumlah" value="<?php echo $ujian['jumlah']; ?>" >
            <?php for ($i=1; $i <=$jumlah ; $i++):?>
              <div class="box-body">

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Soal <?php echo $i; ?></label>

                  <div class="col-md-8">
                    <textarea name="soal[]" class="form-control" style=" width: 710px; height: 100px;" required="" ></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 col-md-offset-2 control-label">A. </label>

                  <div class="col-md-8">
                    <input type="text" class="form-control" name="jawab1[]" required="" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 col-md-offset-2 control-label">B. </label>

                  <div class="col-md-8">
                    <input type="text" class="form-control" name="jawab2[]" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 col-md-offset-2 control-label">C. </label>

                  <div class="col-md-8">
                    <input type="text" class="form-control" name="jawab3[]" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 col-md-offset-2 control-label">D. </label>

                  <div class="col-md-8">
                    <input type="text" class="form-control" name="jawab4[]" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 col-md-offset-2 control-label">Kunci Jawaban</label>

                  <div class="col-md-4">
                    <select name="kunci[]" class="form-control" required="" >
                      <option value="">--Pilih--</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
                  </div>
                </div>



              </div>
              <!-- /.box-body -->
            <?php endfor; ?>
              <div class="box-footer">
                <div class="col-md-4 col-md-offset-4 text-center">
                  <button type="submit" class="btn btn-info pull-right" name="tambah" >Tambah</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          </div>


<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/myscript.js') ?>"></script>
<script src="<?php echo base_url('assets/js/sweetalert2.all.min.js.js') ?>"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>