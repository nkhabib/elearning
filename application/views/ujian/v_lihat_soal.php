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
		                  <th style="width: 300px;">Pilihan Jawaban</th>
		                  <th style="width: 200px;">Kunci Jawaban Soal</th>
		                  <th style="width: 200px;">Aksi</th>
		                </tr>
		                	<?php $no =1;
		                	foreach ($data as $key): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo "$key->soal"; ?></td>
			                		<td>
			                			A. <?php echo "$key->jawaban1<br>"; ?>
			                			B. <?php echo "$key->jawaban2<br>"; ?>
			                			C. <?php echo "$key->jawaban3<br>"; ?>
			                			D. <?php echo "$key->jawaban4<br>"; ?>
			                		</td>
			                		<td><?php echo "$key->kunci_jawaban"; ?></td>
			                		<td>
			                			<a href="<?php echo base_url('soal/c_soal/edit/'.$key->id_ganda) ?>"><i class="fa fa-edit" style="color: blue;"> Edit</i></a>
			                		</td>
			                	</tr>
		                	<?php $no++; endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>