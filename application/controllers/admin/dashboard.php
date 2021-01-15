<?php 

class Dashboard extends CI_Controller{

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
		$this->load->view('template_admin/header');             //Memanggil halaman header
		$this->load->view('template_admin/sidebar');            //Memanggil halaman sidebar
		$this->load->view('admin/dashboard');                   //Memanggil halaman admin content
		$this->load->view('template_admin/footer');             //Memanggil halaman footer
	}
}

?>