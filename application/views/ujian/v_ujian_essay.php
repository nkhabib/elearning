<div class="box box-primary">
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $judul; ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="<?php echo base_url('ujian/c_ujian/jawab_essay'); ?>" method="post" >
          <div class="box-body">
          <input type="hidden" name="id_soal" value="<?php echo $id_soal; ?>" >

            <?php $no = 1; foreach ($data as $soal):?>
            <input type="hidden" name="id_essay[]" value="<?php echo $soal->id_essay; ?>" >
            <div class="col-md-8">
              <div class="form-group">
                <h4><?php echo "$no. "; echo " $soal->soal"; ?></h4>
                <div class="col-md-8">
                  <textarea name="jawab" class="form-control" style=" width: 1000px; height: 100px;" required="" ></textarea>
                </div>
              </div>
              
            </div>

            <?php $no++; endforeach; ?>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-md-2">
              <button type="submit" class="btn btn-info pull-right" name="tambah" >Kirim Jawaban</button>
            </div>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
      <!-- /.box -->
  </div>