
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
            <?php echo "$error"; ?>
             <form role="form" enctype="multipart/form-data" action="<?php echo base_url('Upload/c_upload/tambah') ?>" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Tugas / Materi</label>
                  <input type="text" class="form-control"  placeholder="Nama Tugas / Materi" name="nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo set_value('nama'); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kategori</label>
                  <select class="form-control" name="kategori" required oninvalid="this.setCustomValidity('Pilih Kategori')" oninput="setCustomValidity('')">
                    <?php if (isset($_POST['tambah'])):?>
                      <option value="<?php echo set_value('kategori'); ?>"><?php echo set_value('kategori'); ?></option>
                      <?php else: ?>
                    <option value="">--Pilih--</option>
                  <?php endif; ?>
                    <option value="Tugas">Tugas</option>
                    <option value="Materi">Materi</option>
                  </select>
                </div>


                <div class="form-group">
                  <label for="exampleInputFile">Kelas</label>
                  <select class="form-control" name="kelas" id="kelastm" required oninvalid="this.setCustomValidity('Pilih Kelas')" oninput="setCustomValidity('')">
                    <option value="">--Pilih Kelas--</option>
                    <?php foreach ($kelas as $kls):?>
                      <option value="<?php echo $kls->id_kelas; ?>"><?php echo $kls->kelas; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">MAPEL</label>
                  <select name="mapel" class="form-control" id="mapelup" readonly required oninvalid="this.setCustomValidity('Pilih MAPLE')" oninput="setCustomValidity('')" >
                    <!-- <option value="">--Pilih MAPEL--</option>
                    <?php foreach ($mapel as $mpl):?>
                      <option value="<?php echo $mpl->id_mapel; ?>"><?php echo $mpl->mapel; ?></option>
                    <?php endforeach; ?> -->
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Pilih File</label>
                  <input type="file" id="exampleInputFile" name="nama_file" >
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a class="btn btn-primary" href="<?php echo base_url('login/home'); ?>">Batal</a>
                <button type="submit" class="btn btn-primary" name="tambah">Upload</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->