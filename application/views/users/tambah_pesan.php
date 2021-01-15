<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Pesan Wisata Susur Sungai</h2>
                        <span class="title-line"><i class="fa fa-ship"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

<div class="container">
	<div class="card" style="margin-top: 50px; margin-bottom: 50px">
		<div class="card-header">
			<b>Form Pesan Wisata Susur Sungai</b>
		</div>
		<div class="card-body">
			<?php if(!empty($detail)) foreach ($detail as $dt) : ?>
				<form  method="POST" action="<?php echo base_url('users/pesan/tambah_pesan_aksi') ?>">
					<div class="form-group">
						<label>Nama Wisata</label>
						<input type="hidden" name="id_wisata" value="<?php echo $dt->id_wisata ?>">
						<input type="text" name="nama_wisata" class="form-control" value="<?php echo $dt->nama_wisata ?>"readonly>
					</div>
					<div class="form-group">
						<label>Harga / Paket</label>
						<input type="text" name="harga" class="form-control" value="<?php echo $dt->harga ?>"readonly>
					</div>
					<div class="form-group">
						<label>Tanggal</label>
						<input type="date" name="tgl_pesan" class="form-control">
						<?php echo form_error('tgl_pesan','<div class="text-small text-danger">','</div>') ?>
					</div>
					<div class="form-group">
						<label>Waktu</label>
						<input type="time" name="waktu_pesan" class="form-control">
						<?php echo form_error('waktu_pesan','<div class="text-small text-danger">','</div>') ?>
					</div>
					<center><button type="submit" class="btn btn-primary">Pesan</button></center>
				</form>
			<?php endforeach; ?>
		</div>
	</div>
</div>