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
		                  <th style="width: 600px;">Soal</th>
		                  <th style="width: 100px;">Aksi</th>
		                </tr>
		                	<?php $no =1;
		                	foreach ($data as $key): ?>
			                	<tr>
			                		<td><?php echo $no; ?></td>
			                		<td><?php echo "$key->soal"; ?></td>
			                		<td>
			                			<a href="<?php echo base_url('soal/c_soal/edit_essay/'.$key->id_essay) ?>"><i class="fa fa-edit" style="color: blue;"> Edit</i></a>
			                		</td>
			                	</tr>
		                	<?php $no++; endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>