
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
            <form role="form" action="<?php echo base_url('admin/c_admin/tambah'); ?>" method="post" >
              <div class="box-body">
                
                <div class="form-group">
                  <label for="user">Guru / Murid</label>
                  <font color="red"><?php echo form_error('user'); ?></font>
                  <select name="user" id="user" class="form-control">
                    <?php if (isset($_POST['tambah'])):?>
                      <option value="<?php echo set_value('user'); ?>"><?php echo set_value('user'); ?></option>
                      <?php else: ?>
                        <option value="">--Pilih--</option>
                    <?php endif; ?>
                    <option value="Guru">Guru</option>
                    <option value="Murid">Murid</option>
                  </select>
                </div>

                <?php if (isset($_POST['tambah'])):?>
                  <div id="show-kelas">
                    <?php else: ?>
                      <div id="hiden-kelas">
                    <?php endif; ?>

                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" name="kelas" id="kelas">
                      <?php if (isset($_POST['tambah'])):?>
                        <option value="<?php echo set_value('kelas'); ?>"><?php echo set_value('kelas'); ?></option>
                        <?php else: ?>
                          <option value="">--Pilih--</option>
                      <?php endif; ?>
                      <?php foreach ($kelas as $key):?>
                        <option value="<?php echo $key->kelas;?>" ><?php echo $key->kelas;?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                </div>

                <?php if (isset($_POST['tambah'])):?>
                  <div id="nis-show"></div>
                  <?php else: ?>
                    <div id="nis-hiden">
                <?php endif; ?>
                  
                  <div class="form-group">
                    <label for="nis">NIP/NIS</label>
                    <font color="red"><?php echo form_error('nis'); ?></font>
                    <select name="nis" id="nis" class="form-control">
                      <?php if (isset($_POST['tambah'])):?>
                        <option value="<?php echo set_value('nis'); ?>"><?php echo set_value('nis'); ?></option>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>

                <?php if (isset($_POST['tambah'])):?>
                  <div id="nama-show">
                  <?php else: ?>
                  <div id="nama-hiden">
                <?php endif; ?>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <font color="red"><?php echo form_error('nama'); ?></font>
                      <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo set_value('nama'); ?>">
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <font color="red"><?php echo form_error('password'); ?></font>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
                    </div>
                  </div>

                </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <a href="<?php echo base_url('login/home') ?>"><input type="button" class="btn btn-primary" name="" value="Batal"></a>
                <?php if (isset($_POST['tambah'])):?>
                  <button type="submit" class="btn btn-primary" id="btn-show" name="tambah">Tambah</button>
                  <?php else: ?>
                    <button type="submit" class="btn btn-primary" id="btn-hiden" name="tambah">Tambah</button>
                <?php endif; ?>
              </div>
            </form>
          </div>
          <!-- /.box -->