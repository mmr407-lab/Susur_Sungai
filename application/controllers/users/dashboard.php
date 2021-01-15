<?php 

class Dashboard extends CI_Controller{

	public function index()
	{
		$data['wisata'] = $this->wisata_model->get_data('wisata')->result();
		$this->load->view('template_users/header');             //Memanggil halaman header
		$this->load->view('users/dashboard', $data);            //Memanggil halaman admin content
		$this->load->view('template_users/footer');             //Memanggil halaman footer
	}
}

?>