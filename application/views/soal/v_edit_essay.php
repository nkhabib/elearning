          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $judul; ?></h3>
            </div>
          <form class="form-horizontal" action="<?php echo base_url('soal/c_soal/update_essay'); ?>" method="post" >
              <?php foreach ($data as $soal):?>
              <div class="box-body">

                <input type="hidden" name="id" value="<?php echo $soal->id_essay; ?>" >
                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Soal</label>

                  <div class="col-md-8">
                    <textarea name="soal" class="form-control" style=" height: 100px;" required="" ><?php echo $soal->soal; ?></textarea>
                  </div>
                </div>

              <?php endforeach; ?>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-4 col-md-offset-2 text-center">
                  <button type="submit" class="btn btn-info pull-right" name="tambah" >Update</button>
                  <a class="btn btn-info" href="<?php echo base_url('ujian/c_ujian/lihat') ?>">Batal</a>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>