<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Form Tambah Data Perahu</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/data_perahu') ?>">Data Perahu</a></div>
              <div class="breadcrumb-item">Tambah Data Perahu</div>
            </div>
        </div>
        <div class="card">
        	<div class="card-body">
        		<form method="POST" action="<?php echo base_url('admin/data_perahu/tambah_perahu_aksi') ?>" enctype="multipart/form-data">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="form-group">
        					<label>Kode Perahu</label>
        					<input type="text" name="kode_perahu" class="form-control">
        					<?php echo form_error('kode_perahu','<div class="text-small text-danger">','</div>') ?>
        				</div>
        				<div class="form-group">
        					<label>Nama Pemilik</label>
        					<input type="text" name="nama_pemilik" class="form-control">
        					<?php echo form_error('nama_pemilik','<div class="text-small text-danger">','</div>') ?>
        				</div>
        			</div>
        			<div class="col md-6">
        				<div class="form-group">
        					<label>Telp Pemilik</label>
        					<input type="text" name="telp_pemilik" class="form-control">
        					<?php echo form_error('telp_pemilik','<div class="text-small text-danger">','</div>') ?>
        				</div>
                        <div class="form-group">
                            <label>Alamat Pemilik</label>
                            <input type="text" name="alamat_pemilik" class="form-control">
                            <?php echo form_error('alamat_pemilik','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group text-right">
                        <a class="btn btn-secondary ml-4" href="<?php echo base_url('admin/data_perahu') ?>">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
        			</div>
        		</div>
        		</form>
        	</div>
        </div>
    </section>
</div>