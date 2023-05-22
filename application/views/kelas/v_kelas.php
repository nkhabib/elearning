
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
		                  <th style="width: 300px;">Nama Kelas</th>
		                  <th style="width: 100px;">Jumlah Siswa</th>
		                  <th style="width: 300px;">Jumlah MAPEL</th>
		                  <th style="width: 100px;">Aksi</th>
		                </tr>
		                <?php $no = 1; foreach ($data as $kls):?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo $kls->kelas; ?></td>
			                		<td>
			                			<?php $kelas = $this->db->get_where('murid',['id_kelas' => $kls->id_kelas])->result(); $jml = count($kelas); ?>
			                			<?php echo $jml; ?>
			                		</td>
			                		<td>
			                			<?php $mapel = $this->db->get_where('mengajar',['id_kelas' => $kls->id_kelas])->result(); $jml_mapel = count($mapel); echo $jml_mapel; ?>
			                		</td>
			                		<td>
	                				<?php if ($this->session->userdata('masuk')=='admin'):?>
			                				<a href="<?php echo base_url('kelas/c_kelas/hapus/').$kls->id_kelas; ?>" onclick="return confirm('Yakin Hapus, Data Murid, Guru dan MAPEL terkait dengan kelas akan dihapus ?')" >
			                					<i class="fa fa-trash" style="color: red;">Hapus</i>
			                				</a>

			                				<a href="<?php echo base_url('kelas/c_kelas/edit/').$kls->id_kelas; ?>">
			                					<i class="fa fa-edit" style="color: green;">Edit</i>
			                				</a>
			                			
			                		<?php endif; ?>
			                			<a href="<?php echo base_url('kelas/c_kelas/lihat/').$kls->id_kelas; ?>">
			                				<i class="fa fa-eye"> Lihat Kelas</i>
			                			</a>
			                		</td>
			                	</tr>
			                <?php $no++; endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>