<div class="page-header">
	<h3>Dosen Baru</h3>
</div>

<form action="<?php echo base_url().'admin/dosen_add_act' ?>" method="post"> 
	<div class="form-group">
		<label>NIDN</label>
		<input type="text" name="nidn" class="form-control" placeholder="NIDN">		
		<?php echo form_error('nama'); ?>
	</div>
	<div class="form-group">		
		<label>Nama Dosen</label>
		<input type="text" name="nama_dosen" class="form-control" placeholder="Nama Dosen">			
	</div>
	
	
	
	<div class="form-group">						
		<input type="submit" value="Simpan" class="btn btn-primary">	
	</div>
</form>