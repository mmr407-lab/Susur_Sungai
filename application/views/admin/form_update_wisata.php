<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Form Update Data Wisata</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/data_wisata') ?>">Data Wisata</a></div>
              <div class="breadcrumb-item">Update Data Wisata</div>
            </div>
        </div>
        <div class="card">
        	<div class="card-body">
            <?php foreach ($wisata as $mb) : ?>
        		<form method="POST" action="<?php echo base_url('admin/data_wisata/update_wisata_aksi') ?>" enctype="multipart/form-data">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="form-group">
        					<label>Nama Wisata</label>
                            <input type="hidden" name="id_wisata" value="<?php echo $mb->id_wisata ?>">
        					<input type="text" name="nama_wisata" class="form-control" value="<?php echo $mb->nama_wisata ?>">
        					<?php echo form_error('nama_wisata','<div class="text-small text-danger">','</div>') ?>
        				</div>
        				<div class="form-group">
        					<label>Deskripsi</label>
        					<input type="text" name="deskripsi" class="form-control" value="<?php echo $mb->deskripsi ?>">
        					<?php echo form_error('deskripsi','<div class="text-small text-danger">','</div>') ?>
        				</div>
        				<div class="form-group">
        					<label>Fasilitas</label>
        					<input type="text" name="fasilitas" class="form-control" value="<?php echo $mb->fasilitas ?>">
        					<?php echo form_error('fasilitas','<div class="text-small text-danger">','</div>') ?>
        				</div>
        			</div>
        			<div class="col md-6">
        				<div class="form-group">
        					<label>Harga</label>
        					<input type="text" name="harga" class="form-control" value="<?php echo $mb->harga ?>">
        					<?php echo form_error('harga','<div class="text-small text-danger">','</div>') ?>
        				</div>
        				<div class="form-group">
        					<label>Status</label>
        					<select name="status" class="form-control">
        						<option <?php if($mb->status == "1"){echo "selected='selected'";}
                                    echo $mb->status; ?> value="1">Tersedia</option>
                                <option <?php if($mb->status == "0"){echo "selected='selected'";}
                                    echo $mb->status; ?> value="0">Tidak Tersedia</option>
        					</select>
        					<?php echo form_error('status','<div class="text-small text-danger">','</div>') ?>
        				</div>
        				<div class="form-group">
        					<label>Gambar</label>
        					<input type="file" name="gambar" class="form-control">
        				</div>
                        <div class="form-group text-right">
                            <a class="btn btn-secondary ml-4" href="<?php echo base_url('admin/data_wisata') ?>">Kembali</a>
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