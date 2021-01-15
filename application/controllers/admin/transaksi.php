 <?php 

class Transaksi extends CI_Controller
{
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
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu ORDER BY id_transaksi DESC")->result(); // Memanggil beberapa tabel dimana id tabel sama dengan id tabel sebenarnya. 
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_transaksi',$data);
		$this->load->view('template_admin/footer');
	}

	public function pembayaran($id)
	{
		$where = array('id_transaksi' => $id);
		$data['pembayaran'] = $this->db->query("SELECT * FROM transaksi tr, perahu pr WHERE tr.id_perahu=pr.id_perahu AND id_transaksi='$id'")->result();
		$data['perahu'] = $this->wisata_model->get_data('perahu')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/konfirmasi_pembayaran',$data);
		$this->load->view('template_admin/footer');
	}

	public function cek_pembayaran()
	{
		$id 				= $this->input->post('id_transaksi');
		$status_pembayaran	= $this->input->post('status_pembayaran');
		$id_perahu		= $this->input->post('kode_perahu');

		$data = array(
			'status_pembayaran' => $status_pembayaran,
			'id_perahu'			=> $id_perahu
		);

		$where = array(
			'id_transaksi' => $id
		);

		$this->wisata_model->update_data('transaksi',$data,$where);
		redirect('admin/transaksi');
	}

	public function download_pembayaran($id)
	{
		$this->load->helper('download');
		$filePembayaran = $this->wisata_model->downloadPembayaran($id); //memanggil model dengan function download pembayaran
		$file = 'assets/upload/'.$filePembayaran['bukti_pembayaran'];
		force_download($file, NULL);
	}

	public function transaksi_selesai($id)
	{
		$where = array('id_transaksi' => $id);
		$data['transaksi'] = $this->db->query(" SELECT * FROM transaksi WHERE id_transaksi='$id'")->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/transaksi_selesai',$data);
		$this->load->view('template_admin/footer');
	}

	public function transaksi_selesai_aksi()
	{
		$id 			  = $this->input->post('id_transaksi');
		$status_transaksi = $this->input->post('status_transaksi');

		$data = array(
			'status_transaksi' => $status_transaksi
		);

		$where = array(
			'id_transaksi' => $id
		); 

		$this->wisata_model->update_data('transaksi', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		 Data Transaksi Telah Selesai!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');   //apabila data berhasil di insert maka akan ditampilkan pesan
		redirect('admin/transaksi');
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
		redirect('admin/transaksi');
	}
}

?>
