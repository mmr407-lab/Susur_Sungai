<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?php echo base_url('assets/assets_admin/') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4><b>Register</b></h4></div>

              <div class="card-body">
                <form method="POST" action="<?php echo base_url('daftar') ?>">
                    <div class="form-group">
                      <label for="nama_users">Nama Lengkap *</label>
                      <input id="nama_users" value="<?php echo set_value('nama_users') ?>" type="text" class="form-control" name="nama_users" autofocus>
                      <?php echo form_error('nama_users','<div class="text-small text-danger">','</div>') ?>
                     </div> 
                    <div class="form-group">
                      <label for="username">Username *</label>
                      <input id="username" value="<?php echo set_value('username') ?>" type="text" class="form-control" name="username">
                      <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    
                    <div class="form-group">
                      <label for="kelamin" class="d-block">Kelamin *</label>
                      <select class="form-control" name="kelamin">
                        <option value="<?php echo set_value('kelamin') ?>">-- Pilih Kelamin --</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                      </select>
                      <?php echo form_error('kelamin','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="form-group">
                      <label for="alamat" class="d-block">Alamat *</label>
                      <input id="alamat" value="<?php echo set_value('alamat') ?>" type="text" class="form-control" name="alamat">
                      <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <label for="no_telepon" class="d-block">No Telepon *</label>
                      <input id="no_telepon" value="<?php echo set_value('no_telepon') ?>" type="text" class="form-control" name="no_telepon">
                      <?php echo form_error('no_telepon','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="form-group">
                      <label for="password" class="d-block">Password *</label>
                      <input id="password" value="<?php echo set_value('password') ?>" type="password" class="form-control" name="password">
                       <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <label for="ulang_pass" class="d-block">Ulangi Password *</label>
                      <input id="ulang_pass" value="<?php echo set_value('ulang_pass') ?>" type="password" class="form-control" name="ulang_pass">
                       <?php echo form_error('ulang_pass','<div class="text-small text-danger">','</div>') ?>
                    </div>

                   <!-- n<div class="form-group"> 
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm">
                    </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div> -->

                  <div class="form-group"><center>
                    <button type="submit" class="btn btn-primary btn-lg mt-3">
                      Daftar</center>
                    </button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>