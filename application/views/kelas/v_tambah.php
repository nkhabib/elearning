
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
            <form class="form-horizontal" action="<?php echo base_url('kelas/c_kelas/tambah'); ?>" method="POST" >
              <div class="box-body">
                
                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kelas</label>

                  <div class="col-md-4 col-sm-4 col-xs-4 ">
                    <font color="red"><?php echo form_error('kelas'); ?></font>
                    <select name="kelas" id="kelas" class="form-control">
                      <option value="">--Pilih--</option>
                      <option value="VII">VII</option>
                      <option value="VII">VIII</option>
                      <option value="XI">XI</option>
                    </select>
                  </div>

                  <label for="kelas" class="col-sm-1 control-label">Inisial</label>

                  <div class="col-md-4 col-sm-4 col-xs-4 ">
                    <font color="red"><?php echo form_error('subkelas'); ?></font>
                    <select name="subkelas" id="subkelas" class="form-control">
                      <option value="">--Pilih--</option>
                      <?php $abjad = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']; ?>
                      <?php foreach ($abjad as $key) :?>
                        <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-4 col-md-offset-4 text-center">
                  <a href="<?php echo base_url('login/home'); ?>" class="btn btn-default">Batal</a>
                  <button type="submit" class="btn btn-info pull-right" name="tambah" >Tambah</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->