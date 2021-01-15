<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Detail Wisata</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/data_wisata') ?>">Data Wisata</a></div>
              <div class="breadcrumb-item">Detail Wisata</div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <?php if(!empty($detail)) foreach ($detail as $mb) : ?>
                <div class="row">
                    <div class="col-md-5">
                        <img width="100%px" src="<?php  echo base_url().'assets/upload/'.$mb->gambar ?>">
                    </div>
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <td><b>Nama Wisata</b></td>
                                <td>:</td>
                                <td><?php echo $mb->nama_wisata ?></td>
                            </tr>
                            <tr>
                                <td><b>Deskripsi</b></td>
                                <td>:</td>
                                <td><?php echo $mb->deskripsi ?></td>
                            </tr>
                            <tr>
                                <td><b>Fasilitas</b></td>
                                <td>:</td>
                                <td><?php echo $mb->fasilitas ?></td>
                            </tr>
                            <tr>
                                <td><b>Harga</b></td>
                                <td>:</td>
                                <td><?php echo $mb->harga ?></td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td>:</td>
                                <td>
                                    <?php if($mb->status == "0"){
                                          echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                        }else{
                                        echo "<span class='badge badge-primary'>Tersedia</span>";
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <a class="btn btn-secondary ml-4" href="<?php echo base_url('admin/data_wisata') ?>">Kembali</a>
                        <a class="btn btn-primary" href="<?php echo base_url('admin/data_wisata/update_wisata/'.$mb->id_wisata) ?>">Update</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>