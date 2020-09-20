<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {

	public $table = 'kategori_produk';
	public $id    = 'id';

	public function getKategoriId($id)
	{
		$hasil = $this->db->where('id',$id)->get('kategori_produk');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}else{
			return false;
		}
	}
 
	public function tampil_data($table)
	{
		return $this->db->get($table); 
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}

/* End of file Model_kategori.php */
/* Location: ./application/models/Model_kategori.php */