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
					<?php foreach ($guru as $gr):?>
						<h4>Guru Pengajar : <?php echo $gr; ?></h4>
					<?php endforeach; ?>
					<table class="table table-bordered">
						<tr>
		                  <th style="width: 10px;">NO</th>
		                  <th style="width: 300px;">NIK</th>
		                  <th style="width: 400px;">Nama</th>
		                  <th style="width: 200px;">kelas</th>
		                </tr>
		                	<?php foreach ($murid as $mrd):?>
		                	<?php 
		                			$this->db->from('murid');
		                			$this->db->join('kelas','kelas.id_kelas = murid.id_kelas');
		                			$mur = $this->db->get_where('',['murid.id_kelas' => $mrd->id_kelas])->result();
		                			$no = 1;
		                			foreach ($mur as $mr):?>
		                <tr>
		                		<td><?php echo $no; ?></td>
		                		<td><?php echo "$mr->nis"; ?></td>
		                		<td><?php echo "$mr->nama"; ?></td>
		                		<td><?php echo "$mr->kelas"; ?></td>
		                </tr>
		            <?php $no++; endforeach; ?>
		                	<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>