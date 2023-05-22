
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
            <form class="form-horizontal" action="<?php echo base_url('murid/c_murid/update'); ?>" method="post" >
              <?php foreach ($data as $key): ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="nis" class="col-sm-2 control-label">NIS</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nis" id="nis"   value="<?php echo $key->nis; ?>" readonly required oninvalid="this.setCustomValidity('NIS tidak boleh kosong')" oninput="setCustomValidity('')" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $key->nama; ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kelas</label>

                  <div class="col-md-4">
                    <select name="kelas" class="form-control" id="kelas" required oninvalid="this.setCustomValidity('Kelas tidak boleh kosong')" oninput="setCustomValidity('')" >
                      
                      <option value="<?php echo $key->id_kelas; ?>"><?php echo $key->kelas; ?></option>
                      <?php foreach ($kelas as $kls):?>
                        <option value="<?php echo $kls->id_kelas; ?>"><?php echo $kls->kelas; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="hp" class="col-sm-2 control-label">NO HP</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="hp" id="hp"  value="<?php echo $key->no_hp; ?>" required oninvalid="this.setCustomValidity('No HP tidak boleh kosong')" oninput="setCustomValidity('')" >
                  </div>
                </div>


              </div>
            <?php endforeach; ?>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-4 col-md-offset-4 text-center">
                  <a href="<?php echo base_url('murid/c_murid/get_murid'); ?>" class="btn btn-default">Batal</a>
                  <button type="submit" class="btn btn-info pull-right" name="tambah" >Update</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->