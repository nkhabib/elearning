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
		                  <th style="width: 200px;">MAPEL</th>
		                  <th style="width: 200px;">Pengajar</th>
		                  <th style="width: 200px;">Tanggal Ditambahkan</th>
		                  	<th style="width: 200px;">Aksi</th>
		                </tr>
		                	
		                	
			                		<?php $no = 1; foreach ($data as $dwn):?>
			                	<tr>
			                			<td><?php echo $no; ?></td>
			                			<td><?php echo $dwn->nama_tugas; ?></td>
			                			<td><?php echo $dwn->nama_file; ?></td>
			                			<td><?php echo $dwn->mapel; ?></td>
			                			<td><?php echo $dwn->nama; ?></td>
			                			<td><?php echo $dwn->waktu_upload; ?></td>
			                			<td>
			                				<a href="<?php echo base_url('download/c_download/download_tugas/').$dwn->id; ?>"><font color="green" ><i class="fa fa-download"></i> Download</font></a><br>
			                				<a href="<?php echo base_url('download/c_download/hapus_tugas/').$dwn->id; ?>" onclick="return confirm('Yakin Hapus ?')"><font color="red"><i class="fa fa-trash"></i> Hapus</font></a>
			                			</td>
			                	</tr>
			                		<?php $no++; endforeach; ?>
					</table>
					
				</div>
			</div>
		</div>
	</div>
</section>