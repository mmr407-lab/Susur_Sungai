<div class="main-content">
    <section class="section">
        <div class="section-header">
           <h1>Data Users</h1>
           <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Data users</div>
            </div>
        </div>
        <a href="<?php echo base_url('admin/data_users/tambah_users') ?>" class="btn btn-primary mb-3">Tambah Data</a>
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="table-responsive">
            <table id="datatables" class="table table-hover table-stripe table-bordered">
            	<thead>
                    <tr>
                		<th>No</th>
                		<th>Nama Lengkap</th>
                		<th>Username</th>
                        <th>Level</th>
                		<th>Kelamin</th>
                		<th>No Telepon</th>
                		<th>Alamat</th>
                		<th>Aksi</th>
                    </tr>
            	</thead>
            	<tbody>
            		<?php 
            			$no=1;
            			foreach($users as $mb) : ?>
                            <tr>
                				<td><?php echo $no++ ?></td>
                				<td><?php echo $mb->nama_users ?></td>
                                <td><?php echo $mb->username ?></td>
                                <td><?php echo $mb->hak_akses ?></td>
                				<td><?php echo $mb->kelamin ?></td>
                				<td><?php echo $mb->no_telepon ?></td>
                				<td><?php echo $mb->alamat ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/data_users/update_users/').$mb->id_users ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/data_users/delete_users/').$mb->id_users ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
            		<?php endforeach; ?>
            	</tbody>
            </table>
        </div><br>
        <!--<div class="row">
            <div class="col">
                <?php echo $pagination; ?>
            </div>
        </div>-->
        <!--<nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>-->
	</section>
</div>
