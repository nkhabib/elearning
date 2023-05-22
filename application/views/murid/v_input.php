
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
            <form class="form-horizontal" action="<?php echo base_url('murid/c_murid/tambah'); ?>" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="nis" class="col-sm-2 control-label">NIS</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nis" id="nis" placeholder="NIS"  value="<?php echo set_value('nis'); ?>">
                    <font color="red" size="2"><?php echo form_error('nis'); ?></font>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo set_value('nama'); ?>">
                    <font color="red" size="2"><?php echo form_error('nama'); ?></font>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kelas</label>

                  <div class="col-md-4">
                    <select name="kelas" class="form-control" id="kelas">
                      <?php if (isset($_POST['tambah'])): ?>
                        <option value="<?php echo set_value('kelas'); ?>"><?php echo set_value('kelas'); ?></option>
                        <?php else: ?>
                          <option value="">--Pilih--</option>
                      <?php endif; ?>
                      <?php foreach ($kelas as $key):?>
                        <option value="<?php echo $key->id_kelas; ?>"><?php echo $key->kelas; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <font color="red" size="2"><?php echo form_error('kelas'); ?></font>
                  </div>
                </div>

                <div class="form-group">
                  <label for="hp" class="col-sm-2 control-label">NO HP</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="hp" id="hp" placeholder="Nomor HP" value="<?php echo set_value('hp'); ?>" >
                    <font color="red" size="2"><?php echo form_error('hp'); ?></font>
                  </div>
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