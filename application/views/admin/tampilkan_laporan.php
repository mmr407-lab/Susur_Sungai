<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Laporan Transaksi</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Laporan</div>
            </div>
        </div>
    </section>
    <form method="POST" action="<?php echo base_url('admin/laporan') ?>">
 		<div class="form-group">
 			<label>Dari Tanggal</label>
 			<input type="date" name="dari" class="form-control">
 			<?php echo form_error('dari','<div class="text-small text-danger">','</div>') ?>
 		</div>
 		<div class="form-group">
 			<label>Sampai Tanggal</label>
 			<input type="date" name="sampai" class="form-control">
 			<?php echo form_error('sampai','<div class="text-small text-danger">','</div>') ?>
 		</div>
 		<button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i> Tampilkan Data</button>  
    </form><hr>

	<div class="btn-group">
		<a class="btn btn-success" target="_blank" href="<?php echo base_url('admin/laporan/cetak_laporan/?dari='.set_value('dari').'&sampai='.set_value('sampai')) ?>"><i class="fas fa-print"></i> <b>Cetak</b></a>
		<a class="btn btn-success" target="_blank" href="<?php echo base_url('admin/laporan/download_pdf/?dari='.set_value('dari').'&sampai='.set_value('sampai')) ?>"><i class="fas fa-file"></i> <b>Download</b></a>
	</div>

	<div class="table-responsive mt-4">
    	<table class="table table-bordered table-striped" id="datatables">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Users</th>
					<th>Nama Wisata</th>
					<th>Kode Perahu</th>
					<th>Tanggal Pesan</th>
					<th>Harga</th>
					<th>Pendapatan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				foreach($laporan as $tr) : 
					$pendapatan = $tr->harga * 10 / 100 ;
				?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $tr->nama_users ?></td>
					<td><?php echo $tr->nama_wisata ?></td>
					<td><?php echo $tr->kode_perahu ?></td>
					<td><?php echo date('d/m/Y', strtotime($tr->tgl_pesan)); ?></td>
					<td>Rp. <?php echo number_format($tr->harga,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($pendapatan,0,',','.') ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>