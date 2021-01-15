
 <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Pembayaran</h2>
                        <span class="title-line"><i class="fa fa-ship"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-8">
			<div class="card mt-2">
				<div class="card-header alert alert-primary">
					<b>Invoice Pembayaran Anda</b>
				</div>
				<div class="card-body">
					<table class="table">
						<?php foreach($transaksi as $tr) : ?>
							<tr>
								<th>Nama Wisata</th>
								<td>:</td>
								<td><?php echo $tr->nama_wisata ?></td>
							</tr>
							<tr>
								<th>Tanggal</th>
								<td>:</td>
								<td><?php echo date('d/m/Y', strtotime($tr->tgl_pesan)); ?></td>
							</tr>
							<tr>
								<th>Waktu</th>
								<td>:</td>
								<td><?php echo date('H:i', strtotime($tr->waktu_pesan)); ?> WITA</td>
							</tr>
							<tr class="text-success">
								<th>Pembayaran</th>
								<td>:</td>
								<td><button class="btn btn-sm btn-primary">Rp. <?php echo number_format($tr->harga,0,',','.') ?></button></td>
							</tr>
							<tr>
								<?php if($tr->status_pembayaran == '1') { ?>
									<?php if($tr->status_transaksi == '1') { ?>
										<td><a class="btn btn-secondary"><b>Ajukan Jadwal Ulang</b></a></td>
									<?php }elseif($tr->status_transaksi == '0') { ?>
										<td><a href="<?php echo base_url('users/transaksi/jadwal_ulang/'.$tr->id_transaksi) ?>" class="btn btn-warning"><b>Ajukan Jadwal Ulang</b></a></td>
									<?php } ?>
								<?php }elseif($tr->status_pembayaran == '0') { ?>
									<td><a class="btn btn-secondary"><b>Ajukan Jadwal Ulang</b></a></td>
								<?php } ?>
								<td></td>
								<td><a target="_blank" href="<?php echo base_url('users/transaksi/cetak_invoice/'.$tr->id_transaksi) ?>" class="btn btn-secondary"><b>Print Invoice</b></a></td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card mt-2">
				<div class="card-header alert alert-primary">
					<b>Informasi Pembayaran</b>
				</div>
				<div class="card-body">
					<p class="text-success mb-4">Silahkan Melakukan Pembayaran Melalui Nomor Rekening di Bawah Ini:</p>
					<ul class="list-group list-group-flush">
					  <li class="list-group-item"><b>Bank Mandiri</b> 089784646</li>
					  <li class="list-group-item"><b>Bank BCA</b> 156484648</li>
					  <li class="list-group-item"><b>Bank BNI</b> 113153154</li>
					</ul>
					<?php if(empty($tr->bukti_pembayaran)) { ?>
						<button style="width: 100%" type="button" class="btn btn-sm btn-primary mt-4" data-toggle="modal" data-target="#exampleModal">
						  <b>Upload Bukti Pembayaran</b>
						</button>
					<?php }elseif($tr->status_pembayaran == '0') { ?>
						<button style="width: 100%" class="btn btn-sm btn-warning mt-4"><i class="fa fa-clock-o"></i> <b>Menunggu Konfirmasi</b></button>
					<?php }elseif($tr->status_pembayaran == '1'){ ?>
						<button style="width: 100%" class="btn btn-sm btn-success mt-4"><i class="fa fa-check"></i> <b>Pembayaran Dikonfirmasi</b></button>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Untuk Upload Bukti Pembayaran -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo base_url('users/transaksi/pembayaran_aksi/') ?>" enctype="multipart/form-data">
	      <div class="modal-body">
	        <div class="form-group">
	        	<label>Bukti Pembyaran</label>
	        	<input type="hidden" name="id_transaksi" class="form-control" value="<?php echo $tr->id_transaksi ?>">
	        	<input type="file" name="bukti_pembayaran" class="form-control">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Tutup</b></button>
	        <button type="submit" class="btn btn-primary"><b>Kirim</b></button>
	      </div>
      </form>
    </div>
  </div>
</div>