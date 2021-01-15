<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Form Tambah Data Users</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/data_users') ?>">Data Users</a></div>
              <div class="breadcrumb-item">Tambah Data Users</div>
            </div>
        </div>
        <div class="card">
        	<div class="card-body">
        		<form method="POST" action="<?php echo base_url('admin/data_users/tambah_users_aksi') ?>" enctype="multipart/form-data">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="form-group">
        					<label>Nama Lengkap</label>
        					<input type="text" name="nama_users" class="form-control">
        					<?php echo form_error('nama_users','<div class="text-small text-danger">','</div>') ?>
        				</div>
        				<div class="form-group">
        					<label>Username</label>
        					<input type="text" name="username" class="form-control">
        					<?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
        				</div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Ulangi Password</label>
                            <input type="password" name="ulang_pass" class="form-control">
                            <?php echo form_error('ulang_pass','<div class="text-small text-danger">','</div>') ?>
                        </div>
        			</div>
        			<div class="col md-6">
                        <div class="form-group">
                            <label>Level</label>
                            <select name="id_level" class="form-control">
                                <option value="">--Pilih Status--</option>
                                <?php foreach($hak_akses as $lv) : ?>
                                    <option value="<?php echo $lv->id_level ?>"><?php echo $lv->hak_akses ?></option>"
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('id_level','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Kelamin</label>
                            <select class="form-control" name="kelamin">
                                <option value="">-- Pilih Kelamin --</option>     
                                <option value="Laki-laki">Laki-laki</option> 
                                <option value="perempuan">Perempuan</option>           
                            </select>
                            <?php echo form_error('kelamin','<div class="text-small text-danger">','</div>') ?>
                        </div>
        				<div class="form-group">
        					<label>No Telepon</label>
        					<input type="text" name="no_telepon" class="form-control">
        					<?php echo form_error('no_telepon','<div class="text-small text-danger">','</div>') ?>
        				</div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group text-right">
                            <a class="btn btn-secondary ml-4" href="<?php echo base_url('admin/data_users') ?>">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
        			</div>
        		</div>
        		</form>
        	</div>
        </div>
    </section>
</div>