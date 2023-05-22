<div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $judul; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url('ujian/c_ujian/jawab'); ?>" method="post" >
              <div class="box-body">

                <input type="hidden" name="id_soal" value="<?php echo $id_soal; ?>">
                <?php $no=1; foreach ($data as $kelas):?>
                <div class="form-group">
                  <label for="kelas" class="col-md-8 col-md-offset-2"><?php echo $no; ?>. <?php echo $kelas->soal; ?></label>
                  <input type="hidden" name="id_ganda[]" value="<?php echo $kelas->id_ganda; ?>">
                </div>

                <div class="col-md-8 col-md-offset-2">
                    <label>
                      <input type="radio" name="<?php echo "jawab".$no; ?>" value="<?php echo $kelas->jawaban1; ?>" required > A.
                      <?php echo $kelas->jawaban1; ?>
                    </label>
                </div>

                <div class="col-md-8 col-md-offset-2">
                    <label>
                      <input type="radio" name="<?php echo "jawab".$no; ?>" value="<?php echo $kelas->jawaban2; ?>"> B.
                      <?php echo $kelas->jawaban2; ?>
                    </label>
                </div>

                <div class="col-md-8 col-md-offset-2">
                    <label>
                      <input type="radio" name="<?php echo "jawab".$no; ?>" value="<?php echo $kelas->jawaban3; ?>"> C.
                      <?php echo $kelas->jawaban3; ?>
                    </label>
                </div>

                <div class="col-md-8 col-md-offset-2">
                    <label>
                      <input type="radio" name="<?php echo "jawab".$no; ?>" value="<?php echo $kelas->jawaban4; ?>"> D.
                      <?php echo $kelas->jawaban4; ?>
                    </label>
                </div>

                <?php $no++; endforeach; ?>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-4 col-md-offset-2 text-center">
                  <button type="submit" class="btn btn-info pull-right" name="tambah" >Kirim Jawaban</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          </div>