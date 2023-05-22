
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
             <form role="form" enctype="multipart/form-data" action="<?php echo base_url('Upload/c_upload/upload_tugas') ?>" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Tugas</label>
                  <input type="text" class="form-control"  placeholder="Nama Tugas" name="nama" required oninvalid="this.setCustomValidity('Nama tugas tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo set_value('nama'); ?>" >
                </div>

                <?php foreach ($data as $mpl):?>
                <div class="form-group">
                  <label for="exampleInputFile">MAPEL</label>
                  <input type="text" name="mapel" value="<?php echo $mpl->mapel;?>" readonly="">
                  <input type="hidden" name="id_mapel" value="<?php echo $mpl->id_mapel;?>">
                  <input type="hidden" name="id_kelas" value="<?php echo $mpl->id_kelas;?>">
                  <input type="hidden" name="nip" value="<?php echo $mpl->nip;?>">
                  <input type="hidden" name="id" value="<?php echo $mpl->id;?>">
                </div>
              <?php endforeach; ?>
                
                <div class="form-group">
                  <label for="exampleInputFile">Pilih File</label>
                  <input type="file" id="exampleInputFile" name="nama_file" >
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a class="btn btn-primary" href="<?php echo base_url('download/c_download/murid'); ?>">Batal</a>
                <button type="submit" class="btn btn-primary" name="tambah">Upload</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->