<!DOCTYPE html>
<html><head>
	<title></title>
</head><body>

<h3 style="text-align: center;">Laporan Aplikasi Susur Sungai</h3>
<p><center>Jl. Pangeran No.68, Pangeran, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123</center></p>
<hr><br>
<table>
	<?php if(empty($_GET['dari'])) { ?>
	<?php }elseif(empty($_GET['sampai'])) { ?>
	<?php }else{ ?>
		<tr>
			<td>Dari Tanggal</td>
			<td>:</td>
			<td><?php echo date('d-M-Y',strtotime($_GET['dari'])) ?></td>
		</tr>
		<tr>
			<td>Sampai Tanggal</td>
			<td>:</td>
			<td><?php echo date('d-M-Y',strtotime($_GET['sampai'])) ?></td>
		</tr>
	<?php } ?>
</table>
<br>

 <table width="720px" border="1" cellpadding="10" cellspacing="0">
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
		$total_pendapatan = 0;
		foreach($laporan as $tr) : 
			$pendapatan 	   = $tr->harga * 10 / 100 ;
			$total_pendapatan += $pendapatan;
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
		<tr>
			<td colspan="6">Total Pendapatan :</td>
			<td>Rp. <?php echo number_format($total_pendapatan,0,',','.') ?></td>
		</tr>
	</tbody>
</table>

</body></html>