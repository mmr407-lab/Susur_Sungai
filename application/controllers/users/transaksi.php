<?php 

class Transaksi extends CI_Controller
{
	public function index()
	{
		$users = $this->session->userdata('id_users');
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu AND cs.id_users='$users' ORDER BY id_transaksi DESC")->result(); // Mengambil data tabel transaksi, wisata, dan users dimana id sama dengan tabel yg asli 
		$this->load->view('template_users/header');
		$this->load->view('users/transaksi',$data);
		$this->load->view('template_users/footer');
	}

	public function pembayaran($id)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu AND tr.id_transaksi='$id' ORDER BY id_transaksi DESC")->result(); // Mengambil data tabel transaksi, wisata, dan users dimana id sama dengan tabel yg asli 
		$this->load->view('template_users/header');
		$this->load->view('users/pembayaran',$data);
		$this->load->view('template_users/footer');
	}

	public function pembayaran_aksi()
	{
		$id     			= $this->input->post('id_transaksi');
		$bukti_pembayaran   = $_FILE['bukti_pembayaran']['name'];
		if($bukti_pembayaran=''){  //Apabila bukti_pembayaran kosong maka tidak akan terjadi apa-apa
		}else{ //Apabila bukti_pembayaran ada maka akan melakukan konfigurasi untuk penyimpanan bukti_pembayaran
			$config ['upload_path'] = './assets/upload'; //menentukan dimana file disimpan
			$config ['allowed_types'] = 'pdf|jpg|jpeg|png'; //tipe apasaja yang diizinkan untuk diupload

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('bukti_pembayaran')){ //apabila perintah gagal upload
				echo "bukti_pembayaran Wisata Gagal Di Upload";
			}else{ //apabila bukti_pembayaran berhasil di upload
				$bukti_pembayaran=$this->upload->data('file_name');
			}
		}

		$data = array(
			'bukti_pembayaran'  	=> $bukti_pembayaran
		);

		$where = array(
			'id_transaksi' => $id
		);

		$this->wisata_model->update_data('transaksi', $data, $where);   //Data akan dimasukkan kedalam tabel wisata
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		 Bukti Pembayaran Anda Berhasil di Upload!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
		redirect('users/transaksi');
	}

	public function jadwal_ulang($id=''){ 	//memanggil id wisata sebagai variabelnya
		$data['detail'] = $this->wisata_model->ambil_id_transaksi($id);
		$data['detail'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu AND tr.id_transaksi='$id' ORDER BY id_transaksi DESC")->result(); // Mengambil data tabel transaksi, wisata, dan users dimana id sama dengan tabel yg asli 
		$this->load->view('template_users/header');
		$this->load->view('users/jadwal_ulang', $data);
		$this->load->view('template_users/footer');
	}

	public function jadwal_ulang_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) //apabila form validation gagal maka yang akan berjalan adalah form update wisata
		{
			$this->jadwal_ulang();
		}else{ //apabila form validation betul atatu sesuai rules maka data akan di update
			$id 			= $this->input->post('id_transaksi');
			$id_users		= $this->session->userdata('id_users');
			$tgl_pesan 		= $this->input->post('tgl_pesan');
			$waktu_pesan    = $this->input->post('waktu_pesan');
			$harga	 		= $this->input->post('harga');

			$data = array(
				'id_users'  	=> $id_users,
				'tgl_pesan'		=> $tgl_pesan,
				'waktu_pesan'	=> $waktu_pesan,
				'harga'			=> $harga
			);

			$where = array(
				'id_transaksi' => $id
			);

			$this->wisata_model->update_data('transaksi', $data, $where);   //Data akan dimasukkan kedalam tabel wisata
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Jadwal Berhasil Diubah!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
			redirect('users/transaksi');
		}
	}

	public function cetak_invoice($id)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu AND tr.id_transaksi='$id'")->result(); // Mengambil data tabel transaksi, wisata, dan users dimana id sama dengan tabel yg asli
		$this->load->view('users/cetak_invoice',$data);
	}

	public function transaksi_batal($id)
	{
		$where = array('id_transaksi' => $id);
		$data = $this->wisata_model->get_where($where, 'transaksi')->row();

		//$where2 = array('id_wisata' => $data->id_wisata);
		//$data2 = array('status' => '1');
		//$this->wisata_model->update_data('wisata', $data2, $where2);

		$this->wisata_model->delete_data($where, 'transaksi');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Transaksi berhasil dibatalkan!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
		redirect('users/transaksi');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tgl_pesan','tgl_pesan','required');
		$this->form_validation->set_rules('waktu_pesan','waktu_pesan','required');
	}
}

 ?>