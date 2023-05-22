
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
		                  <th style="width: 200px;">Kelas</th>
		                  <th style="width: 200px;">MAPEL</th>
		                </tr>

		                <?php 
							$no = 1; foreach ($data as $kelas):?>
								<?php
								$this->db->order_by('mengajar.id_mapel','ASC');
								$this->db->where('mengajar.id_kelas',$kelas);
								$this->db->from('mengajar');
								$this->db->join('murid','murid.id_kelas = mengajar.id_kelas');
								$this->db->join('kelas','kelas.id_kelas = murid.id_kelas');
								$this->db->join('mapel','mapel.id_mapel = mengajar.id_mapel');
								$murid = $this->db->get('')->result();?>

								<?php foreach ($murid as $mrd):?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $mrd->nis; ?></td>
										<td><?php echo $mrd->nama; ?></td>
										<td><?php echo $mrd->kelas; ?></td>
										<td><?php echo $mrd->mapel; ?></td>
									</tr>
								<?php $no++; endforeach; ?>
							<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>