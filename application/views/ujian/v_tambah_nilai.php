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
		                  <th style="width: 300px;">Soal</th>
		                  <th style="width: 300px;">Jawaban</th>
		                  <th style="width: 200px;">Benar / Salah</th>
		                </tr>
		                	<?php $no =1; 
		                	foreach ($data as $key): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo "$key->soal"; ?></td>
			                		<td><?php echo "$key->jawaban"; ?></td>
			                		<td>
			                			<form action="<?php echo base_url('ujian/c_ujian/nilai'); ?>" method="POST">
			                				<input type="hidden" name="nis" value="<?php echo $nis; ?>" >
			                				<input type="hidden" name="id_soal" value="<?php echo $id_soal; ?>" >
			                				<input type="hidden" name="id_jawaban_essay[]" value="<?php echo $key->id_jawab_essay; ?>" >
			                				<label for="hasil<?php echo $no; ?>">Benar </label><input type="radio" name="hasil<?php echo $no; ?>" id="hasil<?php echo $no; ?>" value="1" required > ||
			                				<label for="hasil1<?php echo $no; ?>">Salah </label><input type="radio" name="hasil<?php echo $no; ?>" id="hasil1<?php echo $no; ?>" value="0" required >
			                		</td>
			                	</tr>
		                	<?php $no++; endforeach; ?>
					</table>
					<br>
					<button class="btn btn-info">Masukan Nilau</button>
				</form>
					<br>
				</div>
			</div>
		</div>
	</div>
</section>