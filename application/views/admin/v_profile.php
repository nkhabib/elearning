
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="col-md-8 col-md-offset-2">
	      <h2>
	        <?php echo $judul; ?>
	      </h2>
  		</div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('admin/c_admin/update_profile'); ?>" method="post" >
              <div class="box-body">

                <?php foreach ($data as $user):?>

                  <div class="form-group">
                      <label for="nip">Id User</label>
                      <input type="number" name="id" id="id" class="form-control" value="<?php echo $user->id;?>" readonly>
                  </div>

                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $user->nama;?>">
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Kosongkan Jika Tidak Ganti Password">
                      <font color="red"><?php echo form_error('password'); ?></font>
                    </div>

                    <div class="form-group">
                      <label for="password2">Konfirmasi Password</label>
                      <input type="password" name="password2" class="form-control" id="password2" placeholder="Kosongkan Jika Tidak Ganti Password">
                      <font color="red"><?php echo form_error('password2'); ?></font>
                    </div>

                  <?php endforeach; ?>

                </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <a href="<?php echo base_url('login/home') ?>"><input type="button" class="btn btn-primary" name="" value="Batal"></a>
                <button type="submit" class="btn btn-primary" name="tambah">Update</button>
              </div>

            </form>
          </div>
          <!-- /.box -->