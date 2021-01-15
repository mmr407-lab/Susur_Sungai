<?php 

class Daftar extends CI_Controller{

	public function index()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){  //apabila form validation yg ada pada fungsi rules false maka akan dikembalikan pada form daftar
			$this->load->view('template_admin/header');
			$this->load->view('form_daftar');
			$this->load->view('template_admin/footer');
		}else{ //apabila form validation sesuai dengan yg sdh diset di fungsi rules data akan dimasukkan ke dalam tabel users
			$nama_users	   = $this->input->post('nama_users');
			$username  	   = $this->input->post('username');
			$kelamin       = $this->input->post('kelamin');
			$no_telepon    = $this->input->post('no_telepon');
			$alamat	       = $this->input->post('alamat');
			$password      = md5($this->input->post('password'));
			$ulang_pass    = $this->input->post('ulang_pass');
			$id_level	   = '2'; //nilai default register untuk users adalah level 2

			$data = array( //file akan dimasukkan ke dalam array
				'nama_users'  => $nama_users,
				'username'    => $username,
				'kelamin'	  => $kelamin,
				'no_telepon'  => $no_telepon,
				'alamat'      => $alamat,
				'password'    => $password,
				'id_level'	  => $id_level
			);

			$this->wisata_model->insert_data($data,'users');   //Data akan dimasukkan kedalam tabel wisata
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Berhasil Mendaftar, Silahkan Login!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
			redirect('auth/login');
		}

	}

	public function _rules()
		{
			$this->form_validation->set_rules('nama_users','nama users','required');
			$this->form_validation->set_rules('username','username','required|is_unique[users.username]');
			$this->form_validation->set_rules('kelamin','kelamin','required' /*, array('required' => '')*/);
			$this->form_validation->set_rules('no_telepon','no_telepon','required');
			$this->form_validation->set_rules('alamat','alamat','required');
			$this->form_validation->set_rules('password','password','required|matches[ulang_pass]');
			$this->form_validation->set_rules('ulang_pass','Ulangi Password', 'required');

			//required pakai %s
			$this->form_validation->set_message('is_unique', 'Username sudah ada yang memakai');
		}

}

?>