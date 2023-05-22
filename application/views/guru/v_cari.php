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
                        <option value="nip">NIP</option>
                        <option value="nama">nama</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" required="" >
                      <button class="btn btn-info" type="submit" >Cari</button>
	                      <a class="btn btn-info" href="<?php echo base_url('guru/c_guru/get_guru') ?>">
	                      	Kembali
	                      </a>
                      <?php echo  form_close(); ?>
                      <br>
                      <?php if ($cariberdasarkan == ""):?>
                      Hasil pencarian "<?php echo $yangdicari; ?>" total <?php echo $jumlah; ?>
                      <?php else: ?>
                      	Hasil pencarian berdasarkan <?php echo $cariberdasarkan; ?> "<?php echo $yangdicari; ?>" total <?php echo $jumlah; ?>
                      <?php endif; ?>


				<div class="box-body">
					<table class="table table-bordered">
						<tr>
		                  <th style="width: 10px;">NO</th>
		                  <th style="width: 300px;">NIS</th>
		                  <th style="width: 300px;">Nama</th>
		                  <th style="width: 200px;">NO HP</th>
		                  <?php if ($this->session->userdata('masuk')=='admin'):?>
		                  	<th style="width: 200px;">Aksi</th>
		                  <?php endif; ?>
		                </tr>
		                	<?php $no = 1; 
		                	foreach ($guru as $key): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo "$key->nip"; ?></td>
			                		<td><?php echo "$key->nama"; ?></td>
			                		<td><?php echo "$key->no_hp"; ?></td>
			                		<?php if ($this->session->userdata('masuk')=='admin'):?>
			                			<td>
			                				<a href="<?php echo base_url('guru/c_guru/hapus/'.$key->nip); ?>" onclick="return confirm('Yakin Hapus ?')" >
			                					<i class="fa fa-trash" style="color: red;">Hapus</i>
			                				</a>

			                				<a href="<?php echo base_url('guru/c_guru/edit/'.$key->nip); ?>">
			                					<i class="fa fa-edit" style="color: green;">Edit</i>
			                				</a>
			                			</td>
			                		<?php endif; ?>
			                	</tr>
		                	<?php $no++; endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>