<section class="content">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('psn'); ?>" ></div>
	<div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $judul; ?></h3>
					<div>
						<br>
						<a href="<?php echo base_url('kelas/c_kelas/get_kelas'); ?>" class="btn btn-info">Kembali</a>
					</div>
				</div>
				<!-- boox header -->
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
		                  <th style="width: 10px;">NO</th>
		                  <th style="width: 300px;">NIS</th>
		                  <th style="width: 400px;">Nama</th>
		                  <th style="width: 200px;">Kelas</th>
		                  <th>NO HP</th>
		                </tr>
		                	<?php $no =$offset + 1; 
		                	foreach ($data as $murid): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo "$murid->nis"; ?></td>
			                		<td><?php echo "$murid->nama"; ?></td>
			                		<td><?php echo "$murid->kelas"; ?></td>
			                		<td><?php echo "$murid->no_hp"; ?></td>
			                	</tr>
		                	<?php $no++; endforeach; ?>
					</table>
					<?php echo "<br>$halaman"; ?>
				</div>
			</div>
		</div>
	</div>
</section>