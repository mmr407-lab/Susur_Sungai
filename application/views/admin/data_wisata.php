<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Data Wisata</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Data Wisata</div>
            </div>
        </div>
        <a href="<?php echo base_url('admin/data_wisata/tambah_wisata') ?>" class="btn btn-primary mb-3">Tambah Data</a>
         <div class="float-right">
        <?php echo form_open('admin/data_wisata/cari') ?>
          <form>
            <div class="input-group">
              <input type="text" name="keyword" class="form-control" placeholder="Cari Nama Wisata">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        <?php echo form_close() ?>
        </div><br>
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="table-responsive">
            <table class="table table-hover table-stripe table-bordered">
            	<thead>
                    <tr>
                		<th>No</th>
                		<th>Gambar</th>
                		<th>Nama Wisata</th>
                		<th>Deskripsi</th>
                		<th>Fasilitas</th>
                		<th>Harga</th>
                		<th>Status</th>
                		<th>Aksi</th>
                    </tr>
            	</thead>
            	<tbody>
            		<?php 
            			$no=1;
            			foreach($wisata as $mb) : ?>
                            <tr>
                				<td><?php echo $no++ ?></td>
                				<td>
                                    <img width="60px" src="<?php echo base_url().'assets/upload/'.$mb->gambar ?>" alt="">            
                                </td>
                				<td><?php echo $mb->nama_wisata ?></td>
                				<td><?php echo $mb->deskripsi ?></td>
                				<td><?php echo $mb->fasilitas ?></td>
                				<td>Rp. <?php echo number_format($mb->harga,0,',','.') ?></td>
                				<td><?php 
                                if ($mb->status == "0"){
                                    echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                }else{
                                   echo "<span class='badge badge-primary'>Tersedia</span>"; 
                                }     
                                ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/data_wisata/detail_wisata/').$mb->id_wisata ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="<?php echo base_url('admin/data_wisata/update_wisata/'.$mb->id_wisata) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/data_wisata/delete_wisata/').$mb->id_wisata ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
            		<?php endforeach; ?>
            	</tbody>
            </table>
        </div>
	</section>
</div>
