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
		                  <th style="width: 300px;">MAPEL</th>
		                  <th style="width: 300px;">Kelas</th>
		                  <th style="width: 200px;">Nama Soal</th>
		                  <th style="width: 200px;">Jenis</th>
		                  <th style="width: 200px;">Jumlah Soal</th>
		                  <th style="width: 200px;">Tanggal Dikerjakan</th>
		                  <th style="width: 200px;">Nilai</th>
		                </tr>
		                	<?php $no =1; 
		                	foreach ($data as $key): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo "$key->mapel"; ?></td>
			                		<td><?php echo "$key->kelas"; ?></td>
			                		<td><?php echo "$key->nama_soal"; ?></td>
			                		<td><?php echo "$key->jenis"; ?></td>
			                		<td><?php echo "$key->jumlah"; ?></td>
			                		<td><?php echo "$key->tanggal"; ?></td>
		                			<td>
		                				<?php if ($key->nilai==0) 
		                				{
		                					echo "Belum Ditetapkan";
		                				} else
		                					{
		                						echo "$key->nilai";
		                					} ?>
		                			</td>
			                	</tr>
		                	<?php $no++; endforeach; ?>
					</table>
					<br>
					<div class="col-md-12 col-md-offset-5">
						<a href="<?php echo base_url('ujian/c_ujian/lihat'); ?>">
							<button class="btn btn-info">Kembali</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>