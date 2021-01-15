<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Data Perahu</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Data Perahu</div>
            </div>
        </div>
        <a href="<?php echo base_url('admin/data_perahu/tambah_perahu') ?>" class="btn btn-primary mb-3">Tambah Data</a>
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="table-responsive">
            <table id="datatables" class="table table-hover table-stripe table-bordered">
            	<thead>
                    <tr>
                		<th>No</th>
                		<th>Kode Perahu</th>
                		<th>Pemilik</th>
                        <th>Telepon</th>
                		<th>Alamat</th>
                		<th>Aksi</th>
                    </tr>
            	</thead>
            	<tbody>
            		<?php 
            			$no=1;
            			foreach($perahu as $mb) : ?>
                            <tr>
                				<td><?php echo $no++ ?></td>
                				<td><?php echo $mb->kode_perahu ?></td>
                				<td><?php echo $mb->nama_pemilik ?></td>
                                <td><?php echo $mb->telp_pemilik ?></td>
                				<td><?php echo $mb->alamat_pemilik ?></td>
                                <td>
                                    <?php if($mb->id_perahu == '1') { 
                                        echo "-"; ?>
                                    <?php }else { ?>
                                        <a href="<?php echo base_url('admin/data_perahu/update_perahu/').$mb->id_perahu ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo base_url('admin/data_perahu/delete_perahu/').$mb->id_perahu ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
            		<?php endforeach; ?>
            	</tbody>
            </table>
        </div>
	</section>
</div>
