<?php 

class Laporan extends CI_Controller{

	public function __construct()
  	{
		parent::__construct();
		$this->login_kah();	//Memastikan hanya yang sudah login dapat akses fungsi ini
		//require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
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
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu AND status_transaksi >= '1'")->result(); 
			$this->load->view('template_admin/header');
			$this->load->view('template_admin/sidebar');
			$this->load->view('admin/filter_laporan', $data);
			$this->load->view('template_admin/footer');
		}else{
			$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu AND date(tgl_pesan) >= '$dari' AND date(tgl_pesan) <= '$sampai' AND status_transaksi >= '1'")->result(); // Memanggil beberapa tabel dimana id tabel sama dengan id tabel sebenarnya. 
 			$this->load->view('template_admin/header');
			$this->load->view('template_admin/sidebar');
			$this->load->view('admin/tampilkan_laporan',$data);
			$this->load->view('template_admin/footer');
		}
	}

	public function cetak_laporan()
	{
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');
		$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu AND date(tgl_pesan) >= '$dari' AND date(tgl_pesan) <= '$sampai' AND status_transaksi = '1'")->result();
		$this->load->view('template_admin/header',$data);
		$this->load->view('admin/cetak_laporan',$data);
	}

	public function cetak_laporan_semua()
	{
		$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu AND status_transaksi = '1'")->result();
		$this->load->view('template_admin/header');
		$this->load->view('admin/cetak_laporan',$data);
	}

	public function download_pdf()
	{
		$this->load->library('dompdf_gen');

		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');
		$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu AND date(tgl_pesan) >= '$dari' AND date(tgl_pesan) <= '$sampai' AND status_transaksi = '1'")->result();
		$this->load->view('admin/laporan_pdf',$data);

		//$paper_size = 'A4'; //menentukan ukuran file exportnya
		//$orientation = 'landscape'; //menentukan ukuran orientation
		$html = $this->output->get_output(); // membuat variabel html untuk menentukan outputnya
		//$this->dompdf->set_paper($paper_size, $orientation); // kemudian set papernya yaitu variabel paper size dan orientation

		$this->dompdf->load_html($html); //lalu convert ke pdf
		$this->dompdf->render(); //kemudian dirender
		$this->dompdf->stream("Laporan_Aplikasi_Susur_Sungai.pdf", array('Attachment' => 0)); //dan menentukan nama file outputnya
	}

	public function download_pdf_semua()
	{
		$this->load->library('dompdf_gen');
		$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, wisata mb, users cs, perahu pr WHERE tr.id_wisata=mb.id_wisata AND tr.id_users=cs.id_users AND tr.id_perahu=pr.id_perahu AND status_transaksi = '1'")->result();
		$this->load->view('admin/laporan_pdf',$data);

		//$paper_size = 'A4'; //menentukan ukuran file exportnya
		//$orientation = 'landscape'; //menentukan ukuran orientation
		$html = $this->output->get_output(); // membuat variabel html untuk menentukan outputnya
		//$this->dompdf->set_paper($paper_size, $orientation); // kemudian set papernya yaitu variabel paper size dan orientation

		$this->dompdf->load_html($html); //lalu convert ke pdf
		$this->dompdf->render(); //kemudian dirender
		$this->dompdf->stream("Laporan_Aplikasi_Susur_Sungai.pdf", array('Attachment' => 0)); //dan menentukan nama file outputnya
	}

	public function _rules()
	{
		$this->form_validation->set_rules('dari','Dari Tanggal','required');
		$this->form_validation->set_rules('sampai','Sampai Tanggal','required');
	}
}

?>