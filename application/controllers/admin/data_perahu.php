<?php 

class Data_perahu extends CI_Controller{

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
		$data['perahu'] = $this->db->query("SELECT * FROM perahu WHERE id_perahu >= '2'")->result(); 
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_perahu',$data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_perahu()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_tambah_perahu');
		$this->load->view('template_admin/footer');
	}

	public function tambah_perahu_aksi()
	{
		$this->_rules(); //membuat form validation untuk form_wisata_aksi
		if($this->form_validation->run() == FALSE){ // Apabila false maka akan dikembalikan ke form tambah_wisata
			$this->tambah_perahu();
		}else{ //Apabila form validationnya betul akan diinputkan ke database
			$kode_perahu   	= $this->input->post('kode_perahu');
			$nama_pemilik  	= $this->input->post('nama_pemilik');
			$alamat_pemilik	= $this->input->post('alamat_pemilik');
			$telp_pemilik  	= $this->input->post('telp_pemilik');

			$data = array( //file akan dimasukkan ke dalam array
				'kode_perahu'	 => $kode_perahu,
				'nama_pemilik'   => $nama_pemilik,
				'alamat_pemilik' => $alamat_pemilik,
				'telp_pemilik'   => $telp_pemilik
			);

			$this->wisata_model->insert_data($data,'perahu');   //Data akan dimasukkan kedalam tabel wisata
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Data Perahu Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
			redirect('admin/data_perahu');
		}
	}

	public function update_perahu($id=''){ 	//memanggil id wisata sebagai variabelnya
		$where = array('id_perahu' => $id);
		$data['perahu'] = $this->db->query("SELECT * FROM perahu WHERE id_perahu='$id'")->result();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_update_perahu', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_perahu_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) //apabila form validation gagal maka yang akan berjalan adalah form update wisata
		{
			$this->update_perahu();
		}else{ //apabila form validation betul atatu sesuai rules maka data akan di update
			$id            		= $this->input->post('id_perahu');
			$kode_perahu  	   	= $this->input->post('kode_perahu');
			$nama_pemilik  	 	= $this->input->post('nama_pemilik');
			$alamat_pemilik     = $this->input->post('alamat_pemilik');
			$telp_pemilik     	= $this->input->post('telp_pemilik');

			$data = array( //file akan dimasukkan ke dalam array
				'kode_perahu' 		=> $kode_perahu,
				'nama_pemilik'   	=> $nama_pemilik,
				'alamat_pemilik'   	=> $alamat_pemilik,
				'telp_pemilik'      => $telp_pemilik
			);

			$where = array(
				'id_perahu' => $id
			);

			$this->wisata_model->update_data('perahu', $data, $where);   //Data akan dimasukkan kedalam tabel wisata
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Data Perahu Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
			redirect('admin/data_perahu');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_perahu','kode perahu','required');
		$this->form_validation->set_rules('nama_pemilik','nama pemilik','required');
		$this->form_validation->set_rules('alamat_pemilik','alamat pemilik','required');
		$this->form_validation->set_rules('telp_pemilik','telp pemilik','required');
	}

	public function delete_perahu($id){
		$where = array('id_perahu' => $id);
		$this->wisata_model->delete_data($where, 'perahu');   //Data akan dihapus didalam tabel wisata
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			 Data Perahu Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di hapus maka akan ditampilkan pesan
			redirect('admin/data_perahu');
	}

}

?>