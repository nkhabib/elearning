
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
            <form class="form-horizontal" action="<?php echo base_url('mapel/c_mapel/update'); ?>" method="post" >
              <?php foreach ($data as $key):?>
                <input type="hidden" name="id_mengajar" value="<?php echo $key->id_mengajar; ?>">
                <input type="hidden" name="id_mapel" value="<?php echo $key->id_mapel; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="mapel" class="col-sm-2 control-label">Nama MAPEL</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mapel" id="mapel" value="<?php echo $key->mapel; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kelas</label>

                  <div class="col-md-4">
                    <select name="kelas" class="form-control" id="kelas">
                      <option value="<?php echo $key->id_kelas ?>"><?php echo $key->kelas; ?></option>
                      <?php foreach ($kelas as $kls):?>
                        <option value="<?php echo $kls->id_kelas; ?>"><?php echo $kls->kelas; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="guru" class="col-sm-2 control-label">Pengajar</label>

                  <div class="col-sm-10">
                    <select name="guru" class="form-control" id="guru">
                      <option value="<?php echo $key->nip; ?>"><?php echo $key->nip; ?> <?php echo $key->nama; ?></option>
                      <?php foreach ($guru as $gr): ?>
                        <option value="<?php echo $gr->nip; ?>"><?php echo $gr->nip; ?> <?php echo $gr->nama; ?></option>
                      <?php endforeach; ?>
                    </select>
                     
                  </div>
                </div>
              <?php endforeach; ?>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-4 col-md-offset-4 text-center">
                  <a href="<?php echo base_url('mapel/c_mapel/get_mapel'); ?>" class="btn btn-default">Batal</a>
                  <button type="submit" class="btn btn-info pull-right" name="update" >Update</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->