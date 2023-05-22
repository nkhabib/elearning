<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $judul; ?></h3>
				</div>
				<!-- boox header -->
				<?php echo form_open("murid/c_murid/cari"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="nis">NIS</option>
                        <option value="nama">nama</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" required="" >
                      <button class="btn btn-info" type="submit" >Cari</button>
                <?php echo  form_close(); ?>
                      <br>
                      <?php foreach ($kelas as $kls):?>
                      	<a href="<?php echo base_url('murid/c_murid/kelas/'.$kls->id_kelas); ?>" >
                      		<input type="button" class="btn btn-info" name="kelas" value="<?php echo $kls->kelas; ?>" >
                      	</a>
                      <?php endforeach; ?>
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
		                  <th style="width: 10px;">NO</th>
		                  <th style="width: 300px;">NIS</th>
		                  <th style="width: 300px;">Nama</th>
		                  <th style="width: 200px;">Kelas</th>
		                  <th style="width: 200px;">NO HP</th>
		                  <?php if ($this->session->userdata('masuk')=='admin'):?>
		                  	<th style="width: 200px;">Aksi</th>
		                  <?php endif; ?>
		                </tr>
		                	<?php $no =$offset + 1; 
		                	foreach ($data as $key): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo "$key->nis"; ?></td>
			                		<td><?php echo "$key->nama"; ?></td>
			                		<td><?php echo "$key->kelas"; ?></td>
			                		<td><?php echo "$key->no_hp"; ?></td>
			                		<?php if ($this->session->userdata('masuk')=='admin'):?>
			                			<td>
			                				<a href="<?php echo base_url('murid/c_murid/hapus/'.$key->nis); ?>" onclick="return confirm('Yakin Hapus ?')" >
			                					<i class="fa fa-trash" style="color: red;">Hapus</i>
			                				</a>

			                				<a href="<?php echo base_url('murid/c_murid/edit/'.$key->nis); ?>">
			                					<i class="fa fa-edit" style="color: green;">Edit</i>
			                				</a>
			                			</td>
			                		<?php endif; ?>
			                	</tr>
		                	<?php $no++; endforeach; ?>
					</table>
					<?php echo "<br>$halaman"; ?>
				</div>
			</div>
		</div>
	</div>
</section>