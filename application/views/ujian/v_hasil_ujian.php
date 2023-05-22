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
		                  <th style="width: 300px;">NIS</th>
		                  <th style="width: 300px;">Nama</th>
		                  <th style="width: 300px;">MAPEL</th>
		                  <th style="width: 200px;">Nama Soal</th>
		                  <th style="width: 300px;">Kelas</th>
		                  <th style="width: 200px;">Jenis</th>
		                  <th style="width: 200px;">Jumlah Soal</th>
		                  <th style="width: 200px;">Tanggal Ujian</th>
		                  <th style="width: 200px;">Tanggal Dikerjakan</th>
		                  <th style="width: 200px;">Nilai</th>
		                  <th style="width: 200px;">Aksi</th>
		                </tr>
		                	<?php $no = 1;
		                	foreach ($data as $key): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo "$key->nis"; ?></td>
			                		<td><?php echo "$key->nama"; ?></td>
			                		<td><?php echo "$key->mapel"; ?></td>
			                		<td><?php echo "$key->nama_soal"; ?></td>
			                		<td><?php echo "$key->kelas"; ?></td>
			                		<td><?php echo "$key->jenis"; ?></td>
			                		<td><?php echo "$key->jumlah"; ?></td>
			                		<td><?php echo "$key->waktu"; ?></td>
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
		                			<td>
		                				<?php if ($key->nilai==0):?>
		                					<form action="<?php echo base_url('ujian/c_ujian/tambah_nilai'); ?>" method="POST" >
		                						<input type="hidden" name="id_soal" value="<?php echo $key->id_soal; ?>" >
		                						<input type="hidden" name="nis" value="<?php echo $key->nis; ?>" >
		                						<button class="btn btn-default">
		                							<i class="fa fa-edit" style="color: blue;"> Tetapkan Nilai</i>
		                						</button>
		                					</form>
		                					<?php else: ?>
		                				<?php endif; ?>
		                			</td>
			                	</tr>
		                	<?php $no++; endforeach; ?>
					</table>
					<a class="btn btn-info" href="<?php echo base_url('ujian/c_ujian/lihat'); ?>">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</section>