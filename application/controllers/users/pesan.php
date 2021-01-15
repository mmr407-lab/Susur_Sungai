<?php 

class Pesan extends CI_Controller
{

	public function __construct()
  	{
		parent::__construct();
		$this->login_kah();	//Memastikan hanya yang sudah login dapat akses fungsi ini
  	}

  	function login_kah()
  	{
  		//Pengecekan Session DAN LEVEL. Hanya Level yang sesuai yang dapat akses file ini.
		if ( $this->session->has_userdata('id_users') && $this->session->userdata('id_level')==2 )
			return TRUE; 
		else
		  	redirect(base_url('auth/login'));    
	}

	public function tambah_pesan($id='')
	{
		$data['detail'] = $this->wisata_model->ambil_id_wisata($id);
		$this->load->view('template_users/header');
		$this->load->view('users/tambah_pesan', $data);
		$this->load->view('template_users/footer');
	}

	public function tambah_pesan_aksi()
	{	
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->tambah_pesan();
		}else{
			$id_users		= $this->session->userdata('id_users');
			$id_wisata 		= $this->input->post('id_wisata');
			$tgl_pesan 		= $this->input->post('tgl_pesan');
			$waktu_pesan    = $this->input->post('waktu_pesan');
			$harga	 		= $this->input->post('harga');

			$data = array(
				'id_users'  	=> $id_users,
				'id_wisata'		=> $id_wisata,
				'id_perahu'		=> "1",
				'tgl_pesan'		=> $tgl_pesan,
				'waktu_pesan'	=> $waktu_pesan,
				'harga'			=> $harga
			);

			$this->wisata_model->insert_data($data,'transaksi');

		/*$status_transaksi = array(
			'status_transaksi' => '0'
		);

		$id = array(
			'id_transaksi' => $id_transaksi
		);

			$this->wisata_model->update_data('transaksi',$status_transaksi,$id);*/
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				 Transaksi Berhasil, Silahkan Lakukan Pembayaran!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
				redirect('users/transaksi');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tgl_pesan','tgl_pesan','required');
		$this->form_validation->set_rules('waktu_pesan','waktu_pesan','required');
	}
}

?>