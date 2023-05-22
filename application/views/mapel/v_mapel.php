<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $judul; ?></h3>
				</div>
				<!-- boox header -->
				<div class="box-body">
					<?php if ($this->session->userdata('masuk')!='murid'):?>
						<?php foreach ($kelas as $kls):?>
							<a href="<?php echo base_url('mapel/c_mapel/kelas/'.$kls->id_kelas); ?>">
								<input type="button" class="btn btn-info" value="<?php echo $kls->kelas; ?>">
							</a>
						<?php endforeach; ?>
					<?php endif; ?>
					<table class="table table-bordered">
						<tr>
							<?php $masuk = $this->session->userdata('masuk'); ?>
		                  <th style="width: 10px;">NO</th>
		                  <th style="width: 300px;">Nama MAPEL</th>
		                  <?php if ($masuk != 'murid'):?>
		                  	<th style="width: 100px;">Kelas</th>
		                  <?php endif;?>
		                  <th style="width: 300px;">Nama Guru</th>
		                  <th style="width: 200px;">NIP Guru</th>
		                  <?php if ($this->session->userdata('masuk')=='admin'):?>
		                  	<th style="width: 100px;">Aksi</th>
		                  <?php endif; ?>
		                </tr>
		                	<?php $no =$offset + 1; 
		                	foreach ($data as $key): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo $key->mapel; ?></td>
			                		<?php if ($masuk != 'murid'):?>
			                			<td><?php echo "$key->kelas"; ?></td>
			                		<?php endif; ?>
			                		<td><?php echo "$key->nama"; ?></td>
			                		<td><?php echo "$key->nip"; ?></td>
			                			<td>
			                		<?php if ($this->session->userdata('masuk')=='admin'):?>
			                				<a href="<?php echo base_url('mapel/c_mapel/hapus/'.$key->id_mapel); ?>" onclick="return confirm('Yakin Hapus ?')" >
			                					<i class="fa fa-trash" style="color: red;">Hapus</i>
			                				</a>

			                				<a href="<?php echo base_url('mapel/c_mapel/edit/'.$key->id_mengajar); ?>">
			                					<i class="fa fa-edit" style="color: green;">Edit</i>
			                				</a>
			                		<?php endif; ?>
			                		<a href="<?php echo base_url('mapel/c_mapel/lihat/').$key->id_mapel; ?>">
			                			<i class="fa fa-eye">Lihat MAPEL</i>
			                		</a>
			                			</td>
			                	</tr>
		                	<?php $no++; endforeach; ?>
					</table>
					<?php echo "<br>$halaman"; ?>
				</div>
			</div>
		</div>
	</div>
</section>