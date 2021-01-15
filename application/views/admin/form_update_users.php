<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Form Update Data Users</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/data_users') ?>">Data Users</a></div>
              <div class="breadcrumb-item">Update Data Users</div>
            </div>
        </div>
        <div class="card">
        	<div class="card-body">
            <?php foreach ($users as $mb) : ?>
        		<form method="POST" action="<?php echo base_url('admin/data_users/update_users_aksi') ?>" enctype="multipart/form-data">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="form-group">
        					<label>Nama Lengkap</label>
                            <input type="hidden" name="id_users" value="<?php echo $mb->id_users ?>">
        					<input type="text" name="nama_users" class="form-control" value="<?php echo $mb->nama_users ?>">
        					<?php echo form_error('nama_users','<div class="text-small text-danger">','</div>') ?>
        				</div>
        				<div class="form-group">
        					<label>Username</label>
        					<input type="text" name="username" class="form-control" value="<?php echo $mb->username ?>">
        					<?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
        				</div>
        				<div class="form-group">
        					<label>Level</label>
        					<select name="id_level" class="form-control">
                                <option <?php if($mb->id_level == "1"){echo "selected='selected'";}
                                    echo $mb->id_level; ?> value="1">Admin</option>
                                <option <?php if($mb->id_level == "2"){echo "selected='selected'";}
                                    echo $mb->id_level; ?> value="2">User</option>
                            </select>
        					<?php echo form_error('id_level','<div class="text-small text-danger">','</div>') ?>
        				</div>
        			</div>
        			<div class="col md-6">
                        <div class="form-group">
                            <label>kelamin</label>
                            <select name="kelamin" class="form-control">
                                <option <?php if($mb->kelamin == "Laki-laki"){echo "selected='selected'";}
                                    echo $mb->kelamin; ?> value="Laki-laki">Laki-laki</option>
                                <option <?php if($mb->kelamin == "Perempuan"){echo "selected='selected'";}
                                    echo $mb->kelamin; ?> value="Perempuan">Perempuan</option>
                            </select>
                            <?php echo form_error('kelamin','<div class="text-small text-danger">','</div>') ?>
                        </div>
        				<div class="form-group">
        					<label>No Telepon</label>
        					<input type="text" name="no_telepon" class="form-control" value="<?php echo $mb->no_telepon ?>">
        					<?php echo form_error('no_telepon','<div class="text-small text-danger">','</div>') ?>
        				</div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?php echo $mb->alamat ?>">
                            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group text-right">
                            <a class="btn btn-secondary ml-4" href="<?php echo base_url('admin/data_users') ?>">Kembali</a>
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