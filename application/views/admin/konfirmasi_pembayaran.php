<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Pembayaran</h1>
			<div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/transaksi') ?>">Data Transaksi</a></div>
              <div class="breadcrumb-item">Pembayaran</div>
            </div>
		</div>
		<center class="card">
			<div class="card-header">
				<b>Konfirmasi Pembayaran</b>
			</div>
			<div class="card-body">
				<form method="POST" action="<?php echo base_url('admin/transaksi/cek_pembayaran') ?>">
					<h6>Cek Pembayaran :</h6>	
					<?php foreach($pembayaran as $pmb) : ?>
						<a class="btn btn-success" href="<?php echo base_url('admin/transaksi/download_pembayaran/'.$pmb->id_transaksi) ?>"><i class="fas fa-download"></i> Download Bukti Pembayaran</a>
					<?php endforeach; ?>
					<hr>
					<div class="form-group mt-3" style="width: 40%">
						<label>Kode Perahu | Nama Pemilik Perahu</label>
						<select name="kode_perahu" class="form-control">

							<?php if($pmb->status_pembayaran == "1") { ?>
								<option value="<?php echo $pmb->id_perahu ?>"><?php echo $pmb->id_perahu ?> | <?php echo $pmb->kode_perahu ?> | <?php echo $pmb->nama_pemilik ?></option>
							<?php }else{ ?>
								<option value="1">-- Silahkan Pilih Perahu --</option>
							<?php } ?>

							<?php if($pmb->status_pembayaran == "0") { ?>
								<?php foreach($perahu as $pr) : ?>
									<option value="<?php echo $pr->id_perahu ?>"><?php echo $pr->id_perahu ?> | <?php echo $pr->kode_perahu ?> | <?php echo $pr->nama_pemilik ?></option>"
								<?php endforeach; ?>
							<?php } ?>
						</select>
					</div>
					<div class="custom-control custom-switch">
					  <input type="hidden" class="custom-control-input" value="<?php echo $pmb->id_transaksi ?>" name="id_transaksi">
					  <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="status_pembayaran">
					  <label class="custom-control-label" for="customSwitch1" style="color: red"><h5>Konfirmasi Pembayaran</h5></label>
					</div>
					<hr><br>
					<div class="form-group text-center">
					<a class="btn btn-secondary" href="<?php echo base_url('admin/transaksi') ?>">Kembali</a>
		            <button type="submit" class="btn btn-primary">Simpan</button>
		          </div>
				</form>
			</div>
		</center>
	</section>
</div>

