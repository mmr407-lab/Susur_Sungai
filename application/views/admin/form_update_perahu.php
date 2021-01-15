<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Form Update Data Perahu</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/data_perahu') ?>">Data Perahu</a></div>
              <div class="breadcrumb-item">Update Data Perahu</div>
            </div>
        </div>
        <div class="card">
        	<div class="card-body">
            <?php foreach ($perahu as $mb) : ?>
        		<form method="POST" action="<?php echo base_url('admin/data_perahu/update_perahu_aksi') ?>" enctype="multipart/form-data">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="form-group">
        					<label>Kode Perahu</label>
                            <input type="hidden" name="id_perahu" value="<?php echo $mb->id_perahu ?>">
        					<input type="text" name="kode_perahu" class="form-control" value="<?php echo $mb->kode_perahu ?>">
        					<?php echo form_error('kode_perahu','<div class="text-small text-danger">','</div>') ?>
        				</div>
        				<div class="form-group">
        					<label>Nama Pemilik</label>
        					<input type="text" name="nama_pemilik" class="form-control" value="<?php echo $mb->nama_pemilik ?>">
        					<?php echo form_error('nama_pemilik','<div class="text-small text-danger">','</div>') ?>
        				</div>
        			</div>
        			<div class="col md-6">
                        <div class="form-group">
                            <label>Telp Pemilik</label>
                            <input type="text" name="telp_pemilik" class="form-control" value="<?php echo $mb->telp_pemilik ?>">
                            <?php echo form_error('telp_pemilik','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Alamat Pemilik</label>
                            <input type="text" name="alamat_pemilik" class="form-control" value="<?php echo $mb->alamat_pemilik ?>">
                            <?php echo form_error('alamat_pemilik','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group text-right">
                        <a class="btn btn-secondary ml-4" href="<?php echo base_url('admin/data_perahu') ?>">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
        			</div>
        		</div>
        		</form>
            <?php endforeach; ?>
        	</div>
        </div>
    </section>
</div>