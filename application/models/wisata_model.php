<?php 

class Wisata_model extends CI_model{
	public function get_data($table){
		return $this->db->get($table);
	}

	/*public function get_data_users($limit, $start){
		$query = $this->db->get('users', $limit, $start);
		return $query;
	}*/

	public function get_cari_wisata($keyword){
		$this->db->select('*');
		$this->db->from('wisata');
		$this->db->like('nama_wisata', $keyword);
		return $this->db->get()->result();
	}

	public function get_where($where,$table){
		return $this->db->get_where($table, $where);
	}

	public function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function update_data($table, $data,$where){
		$this->db->update($table,$data,$where);
	}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ambil_id_wisata($id)
	{
		$hasil = $this->db->where('id_wisata', $id)->get('wisata');
		if($hasil->num_rows() > 0 ){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function ambil_id_perahu($id)
	{
		$hasil = $this->db->where('id_perahu', $id)->get('perahu');
		if($hasil->num_rows() > 0 ){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function ambil_id_users($id)
	{
		$hasil = $this->db->where('id_users', $id)->get('users');
		if($hasil->num_rows() > 0 ){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function ambil_id_transaksi($id)
	{
		$hasil = $this->db->where('id_transaksi', $id)->get('transaksi');
		if($hasil->num_rows() > 0 ){
			return $hasil->result();
		}else{
			return false;
		}
	}

	
	public function cek_login()
	{
		$username = set_value('username'); //mengambil username
		$password = set_value('password');

		$result = $this->db //mengambil datat dari table users
					   ->where('username',$username) //mencocokkan apakah username yg di inputkan sama dengan yg ada didatabase
					   ->where('password',md5($password))
					   ->limit(1) //data yang diambil hanya 1 data saja
					   ->get('users');

		if($result->num_rows() > 0){ //apabila data yang diambil dari users lebih dari nol maka data diambil satu baris saja
			return $result->row();
		}else{
			return FALSE;
		}
	}

	public function update_password($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function downloadPembayaran($id)
	{
		$query = $this->db->get_where('transaksi',array('id_transaksi' => $id));
		return $query->row_array();
	}

}

?>