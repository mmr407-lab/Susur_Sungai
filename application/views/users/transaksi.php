<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay" style="margin-bottom: 50px">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Transaksi</h2>
                        <span class="title-line"><i class="fa fa-ship"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

<div class="container">
	<div class="card mx-auto" style="margin-top: 50px; margin-bottom: 50px; width: 100%">
		<div class="card-header">
			<b>Data Transaksi Anda</b>
		</div>
		<div class="card-body">
			<?php echo $this->session->flashdata('pesan') ?>
			<table id="datatables" class="table table-bordered table-striped">
				<tr>
					<th>No</th>
					<th>Nama Users</th>
					<th>Nama Wisata</th>
					<th>Kode Perahu</th>
					<th>Tanggal</th>
					<th>Waktu</th>
					<th>Harga</th>
					<th>Aksi</th>
					<th>Batal</th>
				</tr>
				<?php $no=1; foreach ($transaksi as $tr) : ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $tr->nama_users ?></td>
					<td><?php echo $tr->nama_wisata ?></td>
					<td><?php echo $tr->kode_perahu ?></td>
					<td><?php echo date('d/m/Y', strtotime($tr->tgl_pesan)); ?></td>
					<td><?php echo date('H:i', strtotime($tr->waktu_pesan)); ?> WITA</td>
					<td>Rp. <?php echo number_format($tr->harga,0,',','.') ?></td>
					<td>
						<?php if($tr->status_transaksi == "1") { ?>
							<a href="<?php echo base_url('users/transaksi/pembayaran/'.$tr->id_transaksi) ?>" class="btn btn-sm btn-secondary">Transaksi Selesai</a>
						<?php }else{ ?>
							<a href="<?php echo base_url('users/transaksi/pembayaran/'.$tr->id_transaksi) ?>" class="btn btn-sm btn-primary">Cek Pembayaran</a>
						<?php } ?>
					</td>
					<td>
						<?php 
							if($tr->status_transaksi == "0") { ?>
								<a onclick="return confirm('Yakin Batal')" class="btn btn-sm btn-danger" href="<?php echo base_url('users/transaksi/transaksi_batal/'.$tr->id_transaksi) ?>">Batal</a>
							<?php }else{ ?>
								<button class="btn btn-sm btn-secondary">Batal</button>
							<?php } ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>