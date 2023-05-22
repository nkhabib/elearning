
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
            <form class="form-horizontal" action="<?php echo base_url('ujian/c_ujian/tambah'); ?>" method="post" >
              <div class="box-body">

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kelas</label>

                  <div class="col-md-4">
                    <select name="kelas" class="form-control" id="kelastm" required="" >
                      <option value="">--Pilih--</option>
                      <?php $uniq = array_unique(array_column($data, 'id_kelas'));
                       foreach ($uniq as $kelas):?>
                        <?php $kls = $this->db->get_where('kelas',['id_kelas' => $kelas])->row_array(); ?>
                        <option value="<?php echo $kelas; ?>"><?php echo $kls['kelas']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="guru" class="col-sm-2 control-label">Mapel</label>

                  <div class="col-sm-10">
                    <select name="mapel" class="form-control" id="mapelup" readonly required="" >
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="guru" class="col-sm-2 control-label">Nama Soal</label>

                  <div class="col-sm-10">
                    <input type="text" name="soal" class="form-control" required="" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="guru" class="col-sm-2 control-label">Jenis Soal</label>

                  <div class="col-sm-10">
                    <select name="jenis" class="form-control" required="" >
                      <option value="">--Pilih--</option>
                      <option value="Pilihan Ganda">Pilihan Ganda</option>
                      <option value="Essay">Essay</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="guru" class="col-sm-2 control-label">Jumlah Soal</label>

                  <div class="col-sm-10">
                    <select name="jumlah" class="form-control" required="" >
                      <option value="">--Pilih--</option>
                      <option>2</option>
                      <?php $jml = array(5,10,15,20,25,30,35,40,45,50); ?>
                      <?php foreach ($jml as $jum):?>
                        <option> <?php echo $jum; ?></option>
                      <?php endforeach; ?>
                    </select>
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