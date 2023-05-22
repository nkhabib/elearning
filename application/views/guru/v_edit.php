
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
            <form class="form-horizontal" action="<?php echo base_url('guru/c_guru/update'); ?>" method="post" >
              <?php foreach ($data as $key):?>
                <div class="box-body">
                  <div class="form-group">
                    <label for="nis" class="col-sm-2 control-label">NIP</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="nip" id="nip"   value="<?php echo $key->nip; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $key->nama; ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="hp" class="col-sm-2 control-label">NO HP</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="hp" id="hp" placeholder="Nomor HP" value="<?php echo $key->no_hp; ?>" required oninvalid="this.setCustomValidity('No Hp tidak boleh kosong')" oninput="setCustomValidity('')" >
                    </div>
                  </div>
                <?php endforeach; ?>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-4 col-md-offset-4 text-center">
                  <a href="<?php echo base_url('guru/c_guru/get_guru'); ?>" class="btn btn-default">Batal</a>
                  <button type="submit" class="btn btn-info pull-right" name="update" >Update</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->