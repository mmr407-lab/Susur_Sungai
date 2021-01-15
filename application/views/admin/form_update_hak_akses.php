<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Form Update Hak Akses</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/hak_akses') ?>">Hak Akses</a></div>
              <div class="breadcrumb-item">Update Hak Akses</div>
            </div>
        </div>
        <center class="card">
        	<div class="card-body">
            <?php foreach ($hak_akses as $ha) : ?>
        		<form method="POST" action="<?php echo base_url('admin/hak_akses/update_hak_akses_aksi') ?>" enctype="multipart/form-data">
        				<div class="form-group" style="width: 50%">
        					<label>Hak Akses</label>
                            <input type="hidden" name="id_level" value="<?php echo $ha->id_level ?>">
        					<input type="text" name="hak_akses" class="form-control" value="<?php echo $ha->hak_akses ?>">
        					<?php echo form_error('hak_akses','<div class="text-small text-danger">','</div>') ?>
        				</div>
                        <div class="form-group text-center">
                            <a class="btn btn-secondary ml-4" href="<?php echo base_url('admin/hak_akses') ?>">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
        		</form>
            <?php endforeach; ?>
        	</div>
        </center>
    </section>
</div>