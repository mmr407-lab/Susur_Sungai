<table style="width: 60%">
  <h2>Invoice Pembayaran Anda</h2>
  <?php foreach($transaksi as $tr) : ?>
    <tr>
      <td>Nama Users</td>
      <td>:</td>
      <td><?php echo $tr->nama_users ?></td>
    </tr>
    <tr>
      <td>Nama Wisata</td>
      <td>:</td>
      <td><?php echo $tr->nama_wisata ?></td>
    </tr>
    <tr>
      <td>Kode Perahu</td>
      <td>:</td>
      <td><?php echo $tr->kode_perahu ?></td>
    </tr>
    <tr>
      <td>Telepon Perahu</td>
      <td>:</td>
      <td><?php echo $tr->telp_pemilik ?></td>
    </tr>
    <tr>
      <td>Tanggal Pesan</td>
      <td>:</td>
      <td><?php echo date('d/m/Y', strtotime($tr->tgl_pesan)); ?></td>
    </tr>
    <tr>
      <td>Status Pembayaran</td>
      <td>:</td>
      <td>
        <?php 
          if($tr->status_pembayaran == '0') {
            echo "Belum Lunas";
         }else{
            echo "Lunas";
         } ?>
      </td>
    </tr>
    <tr style="font-weight: bold; color: green">
      <td>Pembayaran</td>
      <td>:</td>
      <td>Rp. <?php echo number_format($tr->harga,0,',','.') ?></td>
    </tr>
  <?php endforeach; ?>
</table>

<p style="font-weight: bold; color: red">* Kode dan telepon perahu akan muncul apabila admin telah mengkonfimasi pembayaran anda!</p>
<p class="text-success mb-4">Silahkan Melakukan Pembayaran Melalui Nomor Rekening di Bawah Ini:</p>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><b>Bank Mandiri</b> 089784646</li>
    <li class="list-group-item"><b>Bank BCA</b> 156484648</li>
    <li class="list-group-item"><b>Bank BNI</b> 113153154</li>
  </ul>

<script type="text/javascript">
  window.print();
</script>