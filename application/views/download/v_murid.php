<section class="content">
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
		                  <th style="width: 300px;">Nama</th>
		                  <th style="width: 300px;">Nama File</th>
		                  <th style="width: 150px;">Tugas / Materi</th>
		                  <th style="width: 200px;">Tanggal Ditambahkan</th>
		                  <th style="width: 200px;">MAPEL</th>
		                  <!-- <th style="width: 200px;">Kelas</th> -->
		                  	<th style="width: 200px;">Aksi</th>
		                </tr>
		                	
		                	
			                		<?php $no = 1; foreach ($data as $dwn):?>
			                	<tr>
			                			<td><?php echo $no; ?></td>
			                			<td><?php echo $dwn->nama_tm; ?></td>
			                			<td><?php echo $dwn->nama_file; ?></td>
			                			<td><?php echo $dwn->jenis; ?></td>
			                			<td><?php echo $dwn->waktu_upload; ?></td>
			                			<td><?php echo $dwn->mapel; ?></td>
			                			<!-- <td><?php echo $dwn->kelas; ?></td> -->
			                			<td>
			                				<?php if ($dwn->jenis == "Tugas"):?>
			                					<a name="id" href="<?php echo base_url('upload/c_upload/tugas/').$dwn->id; ?>"><font color="green" ><i class="fa fa-upload"></i> Upload Tugas</font></a><br>
			                				<?php endif; ?>
			                						<a href="<?php echo base_url('download/c_download/download/').$dwn->id; ?>"><font color="green" ><i class="fa fa-download"></i> Download</font></a><br>
			                			</td>
			                	</tr>
			                		<?php $no++; endforeach; ?>
					</table>
					
				</div>
			</div>
		</div>
	</div>
</section>