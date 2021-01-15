<?php 

class Hak_akses extends CI_Controller{

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
		$data['hak_akses'] = $this->wisata_model->get_data('hak_akses')->result(); // Memanggil tabel wisata
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_hak_akses',$data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_hak_akses()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_tambah_hak_akses');
		$this->load->view('template_admin/footer');
	}

	public function tambah_hak_akses_aksi()
	{
		$this->form_validation->set_rules('hak_akses','Hak Akses','required');
		if($this->form_validation->run() == FALSE){ // Apabila false maka akan dikembalikan ke form tambah_wisata
			$this->tambah_hak_akses();
		}else{ //Apabila form validationnya betul akan diinputkan ke database
			$hak_akses   	= $this->input->post('hak_akses');

			$data = array( //file akan dimasukkan ke dalam array
					'hak_akses'	 => $hak_akses
				);

			$this->wisata_model->insert_data($data,'hak_akses');   //Data akan dimasukkan kedalam tabel wisata
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Data Hak Akses Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
			redirect('admin/hak_akses');
		}
	}

	public function update_hak_akses($id=''){ 	//memanggil id wisata sebagai variabelnya
		$where = array('id_level' => $id);
		$data['hak_akses'] = $this->db->query("SELECT * FROM hak_akses WHERE id_level='$id'")->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_update_hak_akses', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_hak_akses_aksi()
	{
		$this->form_validation->set_rules('hak_akses','Hak Akses','required');
		if($this->form_validation->run() == FALSE){ // Apabila false maka akan dikembalikan ke form tambah_wisata
			$this->update_hak_akses();
		}else{ //Apabila form validationnya betul akan diinputkan ke database
			$id            	= $this->input->post('id_level');
			$hak_akses   	= $this->input->post('hak_akses');

			$data = array( //file akan dimasukkan ke dalam array
				'hak_akses'	 => $hak_akses
			);

			$where = array(
				'id_level' => $id
			);

			$this->wisata_model->update_data('hak_akses', $data, $where);   //Data akan dimasukkan kedalam tabel wisata
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Data Hak Akses Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
			redirect('admin/hak_akses');
		}
	}


	public function delete_hak_akses($id){
		$where = array('id_level' => $id);
		$this->wisata_model->delete_data($where, 'hak_akses');   //Data akan dihapus didalam tabel wisata
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			 Data Hak Akses Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di hapus maka akan ditampilkan pesan
			redirect('admin/hak_akses');
	}

}

?>