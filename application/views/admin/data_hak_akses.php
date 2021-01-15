<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Data Hak Akses</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Data Hak Akses</div>
            </div>
        </div>
        <a href="<?php echo base_url('admin/hak_akses/tambah_hak_akses') ?>" class="btn btn-primary mb-3">Tambah Hak Akses</a>
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="table-responsive">
            <table id="datatables" class="table table-hover table-stripe table-bordered">
            	<thead>
                    <tr>
                		<th style="width: 5%">No</th>
                		<th style="text-align: center">Hak Akses</th>
                		<th style="text-align: center">Aksi</th>
                    </tr>
            	</thead>
            	<tbody>
            		<?php 
            			$no=1;
            			foreach($hak_akses as $ha) : ?>
                            <tr>
                				<td><?php echo $no++ ?></td>
                				<td style="text-align: center"><?php echo $ha->hak_akses ?></td>
                                <td style="text-align: center">
                                    <a href="<?php echo base_url('admin/hak_akses/update_hak_akses/').$ha->id_level ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/hak_akses/delete_hak_akses/').$ha->id_level ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
            		<?php endforeach; ?>
            	</tbody>
            </table>
        </div>
	</section>
</div>