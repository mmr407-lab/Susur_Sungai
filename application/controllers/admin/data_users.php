<?php 

class Data_users extends CI_Controller{

	public function __construct()
  	{
		parent::__construct();
		$this->login_kah();	//Memastikan hanya yang sudah login dapat akses fungsi ini
  	}

  	function login_kah()
  	{
  		//Pengecekan Session DAN LEVEL. Hanya Level yang sesuai yang dapat akses file ini.
		if ( $this->session->has_userdata('id_users') && $this->session->userdata('id_level')==1 )
			return TRUE; 
		else
		  	redirect(base_url('auth/login'));    
	}
	
	public function index()
	{
		/*$config['base_url']		= site_url('data_users/index');
		$config['total_rows']	= $this->db->count_all('users');
		$config['per_page']		= 3;
		$config['uri_segment']	= 3;
		$choice					= $config["total_rows"] / $config['per_page'];
		$config["num_links"]	= floor($choice);

		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['Next_link']		= 'Next';
		$config['prev_link']		= 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']	= '</ul></nav></div>';
		$config['num_tag_open']   	= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']  	= '</span></li>';
		$config['cur_tag_open']   	= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']   	= '</span></li>';
		$config['next_tag_open']   	= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">$raquo</span></span></li>';
		$config['prev_tag_open']   	= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']   	= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		$data['page']			= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['users'] = $this->wisata_model->get_data_users($config["per_page"], $data['page'])->result(); // Memanggil tabel wisata 
		$data['pagination'] = $this->pagination->create_links(); */
		//$data['users'] = $this->wisata_model->get_data('users')->result(); // Memanggil tabel wisata
		$data['users'] = $this->db->query("SELECT * FROM users mb, hak_akses ha WHERE mb.id_level=ha.id_level")->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_users',$data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_users()
	{
		$data['hak_akses'] = $this->wisata_model->get_data('hak_akses')->result(); // Memanggil tabel wisata
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_tambah_users', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_users_aksi()
	{
		$this->_rules(); //membuat form validation untuk form_wisata_aksi
		$this->form_validation->set_rules('password','password','required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass','Ulangi Password', 'required');
		if($this->form_validation->run() == FALSE){ // Apabila false maka akan dikembalikan ke form tambah_wisata
			$this->tambah_users();
		}else{ //Apabila form validationnya betul akan diinputkan ke database
			$nama_users	   = $this->input->post('nama_users');
			$username  	   = $this->input->post('username');
			$id_level	   = $this->input->post('id_level');
			$kelamin       = $this->input->post('kelamin');
			$no_telepon    = $this->input->post('no_telepon');
			$alamat	       = $this->input->post('alamat');
			$password      = md5($this->input->post('password'));

			$data = array( //file akan dimasukkan ke dalam array
				'nama_users'  => $nama_users,
				'username'    => $username,
				'id_level'	  => $id_level,
				'kelamin'	  => $kelamin,
				'no_telepon'  => $no_telepon,
				'alamat'      => $alamat,
				'password'    => $password
			);

			$this->wisata_model->insert_data($data,'users');   //Data akan dimasukkan kedalam tabel wisata
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Data Users Berhasil Ditambahkan !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
			redirect('admin/data_users');
		}
	}

	public function update_users($id=''){ 	//memanggil id wisata sebagai variabelnya
		$where = array('id_users' => $id);
		$data['users'] = $this->db->query("SELECT * FROM users WHERE id_users='$id'")->result();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_update_users', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_users_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) //apabila form validation gagal maka yang akan berjalan adalah form update wisata
		{
			$this->update_users();
		}else{ //apabila form validation betul atatu sesuai rules maka data akan di update
			$id            = $this->input->post('id_users');
			$nama_users	   = $this->input->post('nama_users');
			$username  	   = $this->input->post('username');
			$id_level	   = $this->input->post('id_level');
			$kelamin       = $this->input->post('kelamin');
			$no_telepon    = $this->input->post('no_telepon');
			$alamat	       = $this->input->post('alamat');

			$data = array( //file akan dimasukkan ke dalam array
				'nama_users'  => $nama_users,
				'username'    => $username,
				'id_level'	  => $id_level,
				'kelamin'	  => $kelamin,
				'no_telepon'  => $no_telepon,
				'alamat'      => $alamat
			);

			$where = array(
				'id_users' => $id
			);

			$this->wisata_model->update_data('users', $data, $where);   //Data akan dimasukkan kedalam tabel wisata
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Data Users Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
			redirect('admin/data_users');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_users','nama users','required');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('id_level','id_level','required');
		$this->form_validation->set_rules('kelamin','kelamin','required');
		$this->form_validation->set_rules('no_telepon','no_telepon','required');
		$this->form_validation->set_rules('alamat','alamat','required');
	}

	public function delete_users($id){
		$where = array('id_users' => $id);
		$this->wisata_model->delete_data($where, 'users');   //Data akan dihapus didalam tabel wisata
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			 Data Users Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di hapus maka akan ditampilkan pesan
			redirect('admin/data_users');
	}
}

?>