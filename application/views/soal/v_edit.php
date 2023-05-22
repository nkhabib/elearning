          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $judul; ?></h3>
            </div>
          <form class="form-horizontal" action="<?php echo base_url('soal/c_soal/update'); ?>" method="post" >
              <?php foreach ($data as $soal):?>
              <div class="box-body">

                <input type="hidden" name="id" value="<?php echo $soal->id_ganda; ?>" >
                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Soal</label>

                  <div class="col-md-8">
                    <textarea name="soal" class="form-control" style=" height: 100px;" required="" ><?php echo $soal->soal; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">A. </label>

                  <div class="col-md-8">
                    <input type="text" class="form-control" name="jawab1" required="" value="<?php echo $soal->jawaban1 ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">B. </label>

                  <div class="col-md-8">
                    <input type="text" class="form-control" name="jawab2" required="" value="<?php echo $soal->jawaban2; ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">C. </label>

                  <div class="col-md-8">
                    <input type="text" class="form-control" name="jawab3" required="" value="<?php echo $soal->jawaban3 ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">D. </label>

                  <div class="col-md-8">
                    <input type="text" class="form-control" name="jawab4" required="" value="<?php echo $soal->jawaban4 ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kunci Jawaban</label>

                  <div class="col-md-8">
                    <select name="kunci" class="form-control" required="" >
                      <option value="<?php echo $soal->kunci_jawaban; ?>"><?php echo $soal->kunci_jawaban; ?></option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
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