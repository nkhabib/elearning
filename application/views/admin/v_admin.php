<section class="content">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('psn'); ?>" ></div>
	<div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $judul; ?></h3>
				</div>
				<!-- boox header -->
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
		                  <th style="width: 10px;">NO</th>
		                  <th style="width: 300px;">NIK</th>
		                  <th style="width: 400px;">Nama</th>
		                  <th style="width: 200px;">Jabatan</th>
		                  <?php if ($this->session->userdata('masuk')=='admin'):?>
		                  	<th>Aksi</th>
		                  <?php endif; ?>
		                </tr>
		                	<?php $no =$offset + 1; 
		                	foreach ($data as $key): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo "$key->id"; ?></td>
			                		<td><?php echo "$key->nama"; ?></td>
			                		<td><?php echo "$key->level"; ?></td>
			                		<?php if ($this->session->userdata('masuk')=='admin'):?>
			                			<td>
			                				<a href="<?php echo base_url('admin/c_admin/hapus/'.$key->id); ?>" onclick="return confirm('Yakin Hapus ?')" >
			                					<i class="fa fa-trash" style="color: red;">Hapus</i>
			                				</a>

			                				<a href="<?php echo base_url('admin/c_admin/edit/'.$key->id); ?>">
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