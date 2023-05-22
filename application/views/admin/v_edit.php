
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
            <form name="update" role="form" action="<?php echo base_url('admin/c_admin/update'); ?>" method="post" >
              <div class="box-body">
                <?php foreach ($data as $key): ?>
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <font color="red"><?php echo form_error('nik'); ?></font>
                  <?php if (isset($_POST['update'])): ?>
                    <input type="number" name="nik" id="nik" class="form-control" placeholder="Masukan NIK" value="<?php echo set_value('nik'); ?>" readonly>
                    <?php else: ?>
                    <input type="number" name="nik" id="nik" class="form-control" placeholder="Masukan NIK" value="<?php echo $key->id; ?>" readonly >
                  <?php endif; ?>
                </div>

                <div class="form-group">
                  <label for="nama">Nama</label>
                  <font color="red"><?php echo form_error('nama'); ?></font>
                  <?php if (isset($_POST['update'])): ?>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo set_value('nama'); ?>">
                    <?php else: ?>
                      <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo $key->nama; ?>">
                <?php endif; ?>
                </div>

                <div class="form-group">
                	<label for="jabatan">Jabatan</label>
                	<font color="red"><?php echo form_error('jabatan'); ?></font>
                	<select class="form-control" name="jabatan" id="jabatan" >
                    <?php if (isset($_POST['update'])): ?>
                      <option value="<?php echo set_value('jabatan'); ?>"><?php echo set_value('jabatan'); ?></option>
                      <?php else: ?>
                        <option value="<?php echo $key->level; ?>"><?php echo $key->level; ?></option>
                    <?php endif; ?> 
                		<option value="Admin">Admin</option>
                		<option value="Guru">Guru</option>
                		<option value="Wali Kelas">Wali Kelas</option>
                	</select>
                </div>
              <?php endforeach; ?>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="<?php echo base_url('admin/c_admin/get_admin'); ?>">
                  <input type="button" class="btn btn-primary" name="" value="Batal">
                </a>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->