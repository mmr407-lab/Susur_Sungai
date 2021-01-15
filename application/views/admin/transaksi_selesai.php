<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Transaksi Selesai</h1>
			<div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/transaksi') ?>">Data Transaksi</a></div>
              <div class="breadcrumb-item">Transaksi Selesai</div>
            </div>
		</div>
	</section>
	<center class="card">
		<div class="card-header">
			<b>Konfirmasi Status Transaksi</b>
		</div>
		<div class="card-body">
			<?php foreach($transaksi as $tr) : ?>
				<form method="POST" action="<?php echo base_url('admin/transaksi/transaksi_selesai_aksi') ?>">
					<input type="hidden" name="id_transaksi" value="<?php echo $tr->id_transaksi ?>">
					<div class="form-group" style="width: 50%">
						<label>Status Transaksi</label>
						<select name="status_transaksi" class="form-control">
							<option value="0">Belum Selesai</option>
							<option value="1">Sudah Selesai</option>	
						</select>
					</div>
		          <div class="form-group text-center" style="width: 50%">
		          	<a class="btn btn-secondary" href="<?php echo base_url('admin/transaksi') ?>">Kembali</a>
		            <button type="submit" class="btn btn-primary">
		              Simpan
		            </button>
		          </div>
				</form>
			<?php endforeach; ?>
		<div>
	</center>
</div>