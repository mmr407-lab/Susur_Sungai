<?php 

class Bantuan extends CI_Controller{

	public function index()
	{
		$this->load->view('template_users/header');             //Memanggil halaman header
		$this->load->view('users/bantuan');            //Memanggil halaman admin content
		$this->load->view('template_users/footer');             //Memanggil halaman footer
	}
}

?>