<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Transaksi</h1>
			<div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Data Transaksi</div>
            </div>
		</div>
		<?php echo $this->session->flashdata('pesan') ?>
		<div class="table-responsive">
			<table class="table table-hover table-stripe table-bordered" id="datatables">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Users</th>
						<th>Nama Wisata</th>
						<th>Kode Perahu</th>
						<th>Tanggal Pesan</th>
						<th>Harga</th>
						<th>Status Transaksi</th>
						<th>Cek Pembayaran</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach($transaksi as $tr) : ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $tr->nama_users ?></td>
						<td><?php echo $tr->nama_wisata ?></td>
						<td><?php echo $tr->kode_perahu ?></td>
						<td><?php echo date('d/m/Y', strtotime($tr->tgl_pesan)); ?></td>
						<td>Rp. <?php echo number_format($tr->harga,0,',','.') ?></td>
						<td><?php 
	                            if ($tr->status_transaksi == "1"){
	                                echo "Sudah Selesai";
	                            }else{
	                               echo "Belum Selesai"; 
	                            }     
	                    ?></td>
	                    <td>
	                    	<center>
	                    		<?php 
	                    			if(empty($tr->bukti_pembayaran)) { ?>
	                    				<button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>
	                    		<?php }elseif($tr->status_pembayaran == "0"){ ?>
	                    			<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/transaksi/pembayaran/'.$tr->id_transaksi) ?>"><i class="fas fa-check-circle"></i></button></a>
	                    		<?php }elseif($tr->status_pembayaran == "1") { ?>
	                    			<a class="btn btn-sm btn-light" href="<?php echo base_url('admin/transaksi/pembayaran/'.$tr->id_transaksi) ?>"><i class="fas fa-check-circle"></i></a>
	                    		<?php } ?>
	                    	</center>
	                    </td>
						<td>
							<?php if(empty($tr->bukti_pembayaran)) { ?>
								<?php 
									if($tr->status_transaksi == "1"){ ?>
										<div class="row ml-2">
											<button class="btn btn-sm btn-secondary mr-2"><i class='fas fa-check'></i></button>
											<button class="btn btn-sm btn-secondary"><i class='fas fa-times'></i></button>
										</div>
								 	<?php }else { ?>
										<div class="row ml-2">
											<button class="btn btn-sm btn-secondary mr-2"><i class='fas fa-check'></i></button>
											<a onclick="return confirm('Yakin Batal')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/transaksi/transaksi_batal/'.$tr->id_transaksi) ?>"><i class='fas fa-times'></i></a>
										</div>
								<?php } ?>
							<?php }elseif($tr->status_pembayaran == "0") { ?>
								<?php 
									if($tr->status_transaksi == "1"){ ?>
										<div class="row ml-2">
											<button class="btn btn-sm btn-secondary mr-2"><i class='fas fa-check'></i></button>
											<button class="btn btn-sm btn-secondary"><i class='fas fa-times'></i></button>
										</div>
								 	<?php }else { ?>
										<div class="row ml-2">
											<button class="btn btn-sm btn-secondary mr-2"><i class='fas fa-check'></i></button>
											<a onclick="return confirm('Yakin Batal')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/transaksi/transaksi_batal/'.$tr->id_transaksi) ?>"><i class='fas fa-times'></i></a>
										</div>
								<?php } ?>
							<?php }elseif($tr->status_pembayaran == "1") { ?>
								<?php 
									if($tr->status_transaksi == "1"){ ?>
										<div class="row ml-2">
											<a class="btn btn-sm btn-light mr-2" href="<?php echo base_url('admin/transaksi/transaksi_selesai/'.$tr->id_transaksi) ?>"><i class='fas fa-check'></i></a>
											<button class="btn btn-sm btn-secondary"><i class='fas fa-times'></i></button>
										</div>
								 	<?php }else { ?>
										<div class="row ml-2">
											<a class="btn btn-sm btn-success mr-2" href="<?php echo base_url('admin/transaksi/transaksi_selesai/'.$tr->id_transaksi) ?>"><i class='fas fa-check'></i></a>
											<a onclick="return confirm('Yakin Batal')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/transaksi/transaksi_batal/'.$tr->id_transaksi) ?>"><i class='fas fa-times'></i></a>
										</div>
								<?php } ?>
							<?php } ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>
</div>