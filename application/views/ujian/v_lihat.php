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
		                  <th style="width: 200px;">Tanggal Upload</th>
		                  <th style="width: 200px;">Aksi</th>
		                </tr>
		                	<?php $no =$offset + 1; 
		                	foreach ($data as $key): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo "$key->mapel"; ?></td>
			                		<td><?php echo "$key->kelas"; ?></td>
			                		<td><?php echo "$key->nama_soal"; ?></td>
			                		<td><?php echo "$key->jenis"; ?></td>
			                		<td><?php echo "$key->jumlah"; ?></td>
			                		<td><?php echo "$key->waktu"; ?></td>
		                			<td>
		                				<?php $masuk = $this->session->userdata('masuk'); ?>
		                				<?php if ($masuk=='murid'): $nis = $this->session->userdata('ses_id'); ?>
		                					<?php $ada = $this->db->get_where('kerjakan',['id_soal'=>$key->id_soal,'nis'=>$nis])->result(); ?>
		                						<?php if ($ada):?>
		                							<a href="<?php echo base_url('ujian/c_ujian/hasil_mapel/'.$key->id_soal); ?>">
		                								<i class="fa fa-eye" style="color: green;"> Hasil Ujian</i>
		                							</a>
			                						<?php else: ?>
					                					<a href="<?php echo base_url('ujian/c_ujian/kerjakan/'.$key->id_soal); ?>">
							                				<i class="fa fa-edit" style="color: blue;">Kerjakan Ujian</i>
							                			</a>
						                		<?php endif; ?>
		                					<?php else: ?>
				                				<a href="<?php echo base_url('ujian/c_ujian/hapus/'.$key->id_soal); ?>" onclick="return confirm('Yakin Hapus ?')" >
				                					<i class="fa fa-trash" style="color: red;">Hapus</i>
				                				</a>

				                				<a href="<?php echo base_url('ujian/c_ujian/lihat_soal/'.$key->id_soal); ?>">
				                					<i class="fa fa-eye" style="color: blue;">lihat Soal</i>
				                				</a>

				                				<a href="<?php echo base_url('ujian/c_ujian/hasil_ujian/'.$key->id_soal); ?>">
				                					<i class="fa fa-eye" style="color: blue;">Hasil Ujian</i>
				                				</a>
				                		<?php endif; ?>

		                				<!-- <a href="<?php echo base_url('guru/c_guru/edit/'.$key->nip); ?>">
		                					<i class="fa fa-edit" style="color: green;">Edit</i>
		                				</a> -->
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