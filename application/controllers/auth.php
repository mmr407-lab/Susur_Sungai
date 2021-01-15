<?php 

class Auth extends CI_Controller{

	public function login()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) //apabila form validation false
		{
			$this->load->view('template_admin/header'); //memanggil tampilan view
			$this->load->view('form_login');
			$this->load->view('template_admin/footer');
		}else{ //menangkap inputan username dan password dan akan disimpan untuk sementara
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			// setelah data ditangkap maka akan dilakukan pengecekan apakah data yg di input ada atau tidak di database
			$cek = $this->wisata_model->cek_login($username, $password);

			$this->session->set_userdata('id_users',$cek->id_users);

			if($cek == FALSE) //apabila data tidak ada didalam tabel user maka akan ditampilkan kesalahan
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 Username atau Password Salah!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
				redirect('auth/login');
			}else{	//apabila data ada didalam tabel user akan dilakukan pengecekan lagi untuk id_level
				$this->session->set_userdata('username',$cek->username);
				$this->session->set_userdata('id_level',$cek->id_level);
				$this->session->set_userdata('nama_users',$cek->nama_users);

				switch ($cek->id_level) {
					case 1 : redirect('admin/dashboard');
							 break;

					case 2 : redirect('users/dashboard');
							 break;

					default: break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','password','required');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users/dashboard');
	}

	public function ganti_password()
	{
		$this->load->view('template_admin/header'); //memanggil tampilan view
		$this->load->view('ganti_password');
		$this->load->view('template_admin/footer');
	}

	public function ganti_password_aksi()
	{
		$pass_baru  = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');

		$this->form_validation->set_rules('pass_baru','Password Baru', 'required|matches[ulang_pass]'); //mencocokkan password
		$this->form_validation->set_rules('ulang_pass','Ulangi Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('template_admin/header'); //memanggil tampilan view
			$this->load->view('ganti_password');
			$this->load->view('template_admin/footer');
		}else{
			$data = array('password' => md5($pass_baru));
			$id = array('id_users' => $this->session->userdata('id_users'));

			$this->wisata_model->update_password($id,$data,'users');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				 Password Berhasil Diganti!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
				redirect('auth/login');
		}
	}
}

?>