<?php 

class Data_wisata extends CI_Controller{

	public function index()
	{
		$data['wisata'] = $this->wisata_model->get_data('wisata')->result();
		$this->load->view('template_users/header');             //Memanggil halaman header
		$this->load->view('users/data_wisata', $data);            //Memanggil halaman admin content
		$this->load->view('template_users/footer');             //Memanggil halaman footer
	}

	public function detail_wisata($id='')
	{
		$data['detail'] = $this->wisata_model->ambil_id_wisata($id);
		$this->load->view('template_users/header');             //Memanggil halaman header
		$this->load->view('users/detail_wisata', $data);            //Memanggil halaman admin content
		$this->load->view('template_users/footer');             //Memanggil halaman footer
	}

}

?>