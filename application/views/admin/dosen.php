<div class="page-header">
	<h3>Data Dosen</h3>
</div>


<a href="<?php echo base_url().'admin/dosen_add'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Mobil Baru</a>
<br/><br/>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover" id="table-datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>NIDN</th>
			<th>Nama Dosen</th>
			
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		foreach($dosen as $d){ 
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d->nidn ?></td>
				<td><?php echo $d->nama_dosen ?></td>
				<td>
						
				</td>
				<td> 
					<a class="btn btn-warning btn-sm" href="<?php echo base_url().'admin/dosen_edit/'.$m->nidn; ?>"><span class="glyphicon glyphicon-plus"></span> Edit</a>
					<a class="btn btn-danger btn-sm" href="<?php echo base_url().'admin/dosen_hapus/'.$m->nidn; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</tbody>
</table>
</div>