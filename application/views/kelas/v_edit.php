
    <!-- Content Header (Page header) -->


    <!-- Main content -->
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
            <form class="form-horizontal" action="<?php echo base_url('kelas/c_kelas/Update'); ?>" method="POST" >
              <div class="box-body">
                
                <?php foreach ($data as $kls):?>
                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Nama Kelas</label>

                  <div class="col-md-8 col-sm-8 col-xs-8 ">
                    <input type="text" name="kelas" value="<?php echo $kls->kelas; ?>" class="form-control"> 
                    <input type="hidden" name="id_kelas" value="<?php echo $kls->id_kelas; ?>">
                  </div>

                <?php endforeach; ?>
                


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-4 col-md-offset-4 text-center">
                  <a href="<?php echo base_url('kelas/c_kelas/get_kelas'); ?>" class="btn btn-default">Batal</a>
                  <button type="submit" class="btn btn-info pull-right" name="tambah" >Update</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->