<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['wisata'] = $this->wisata_model->get_data('wisata')->result();
		$this->load->view('template_users/header');             //Memanggil halaman header
		$this->load->view('users/dashboard', $data);            //Memanggil halaman admin content
		$this->load->view('template_users/footer');             //Memanggil halaman footer
	}
}
