<?php 

class Data_wisata extends CI_Controller{

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
		$data['wisata'] = $this->wisata_model->get_data('wisata')->result(); // Memanggil tabel wisata
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_wisata',$data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_wisata()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_tambah_wisata');
		$this->load->view('template_admin/footer');
	}

	public function tambah_wisata_aksi()
	{
		$this->_rules(); //membuat form validation untuk form_wisata_aksi
		if($this->form_validation->run() == FALSE){ // Apabila false maka akan dikembalikan ke form tambah_wisata
			$this->tambah_wisata();
		}else{ //Apabila form validationnya betul akan diinputkan ke database
			$nama_wisata   = $this->input->post('nama_wisata');
			$deskripsi     = $this->input->post('deskripsi');
			$fasilitas     = $this->input->post('fasilitas');
			$harga         = $this->input->post('harga');
			$status        = $this->input->post('status');
			$gambar        = $_FILE['gambar']['name'];
			if($gambar=''){  //Apabila gambar kosong maka tidak akan terjadi apa-apa
			}else{ //Apabila gambar ada maka akan melakukan konfigurasi untuk penyimpanan gambar
				$config ['upload_path'] = './assets/upload'; //menentukan dimana file disimpan
				$config ['allowed_types'] = 'jpg|jpeg|png|jfif'; //tipe apasaja yang diizinkan untuk diupload

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){ //apabila perintah gagal upload
					echo "Gambar Wisata Gagal Di Upload";
				}else{ //apabila gambar berhasil di upload
					$gambar=$this->upload->data('file_name');
				}
			}

			$data = array( //file akan dimasukkan ke dalam array
				'nama_wisata' => $nama_wisata,
				'deskripsi'   => $deskripsi,
				'fasilitas'   => $fasilitas,
				'harga'       => $harga,
				'status'      => $status,
				'gambar'      => $gambar
			);

			$this->wisata_model->insert_data($data,'wisata');   //Data akan dimasukkan kedalam tabel wisata
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Data Wisata Berhasil Ditambahkan !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
			redirect('admin/data_wisata');
		}
	}

	public function update_wisata($id=''){ 	//memanggil id wisata sebagai variabelnya
		$where = array('id_wisata' => $id);
		$data['wisata'] = $this->db->query("SELECT * FROM wisata WHERE id_wisata='$id'")->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_update_wisata', $data);
		$this->load->view('template_admin/footer');
	}

	
	public function update_wisata_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) //apabila form validation gagal maka yang akan berjalan adalah form update wisata
		{
			$this->update_wisata();
		}else{ //apabila form validation betul atatu sesuai rules maka data akan di update
			$id            = $this->input->post('id_wisata');
			$nama_wisata   = $this->input->post('nama_wisata');
			$deskripsi     = $this->input->post('deskripsi');
			$fasilitas     = $this->input->post('fasilitas');
			$harga         = $this->input->post('harga');
			$status        = $this->input->post('status');
			$gambar        = $_FILE['gambar']['name'];
			if($gambar){ //Apabila gambar ada maka akan melakukan konfigurasi untuk penyimpanan gambar
				$config ['upload_path']   = './assets/upload'; //menentukan dimana file disimpan
				$config ['allowed_types'] = 'jpg|jpeg|png|jfif'; //tipe apasaja yang diizinkan untuk diupload

				$this->load->library('upload', $config);	//memanggil library upload

				if($this->upload->do_upload('gambar')){
					$gambar=$this->upload->data('file_name');
					$this->db->set('gambar', $gambar);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$data = array( //file akan dimasukkan ke dalam array
				'nama_wisata' => $nama_wisata,
				'deskripsi'   => $deskripsi,
				'fasilitas'   => $fasilitas,
				'harga'       => $harga,
				'status'      => $status,
			);

			$where = array(
				'id_wisata' => $id
			);

			$this->wisata_model->update_data('wisata', $data, $where);   //Data akan dimasukkan kedalam tabel wisata
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Data Wisata Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
			redirect('admin/data_wisata');
		}
	}

	public function cari()
	{
		$keyword = $this->input->post('keyword');
		$data['wisata'] = $this->wisata_model->get_cari_wisata($keyword);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_wisata',$data);
		$this->load->view('template_admin/footer');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_wisata','nama wisata','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');
		$this->form_validation->set_rules('fasilitas','fasilitas','required');
		$this->form_validation->set_rules('harga','harga','required');
		$this->form_validation->set_rules('status','status','required');
	}

	public function detail_wisata($id)
	{
		$data['detail'] = $this->wisata_model->ambil_id_wisata($id); // mengambil id wisata untuk menampilkan detail wisata
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/detail_wisata', $data);
		$this->load->view('template_admin/footer');
	}

	public function delete_wisata($id){
		$where = array('id_wisata' => $id);
		$this->wisata_model->delete_data($where, 'wisata');   //Data akan dihapus didalam tabel wisata
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			 Data Wisata Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di hapus maka akan ditampilkan pesan
			redirect('admin/data_wisata');
	}
}

?>