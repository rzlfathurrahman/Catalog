<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

	public $table = 'produk';
	public $id    = 'id';


	public function getProductId($id)
	{
		$hasil = $this->db->where('id',$id)->get('produk');
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

	public function getLastData($table,$limit)
	{
		return $this->db->query("SELECT * FROM(SELECT * FROM {$table} ORDER BY `id` DESC LIMIT {$limit})Var1 ORDER BY id ASC");
	}

	public function getProdukKategori($table,$kategori,$limit)
	{		
		return $this->db->query("SELECT * FROM $table WHERE kategori = $kategori LIMIT $limit");
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

	public function totalProduk()
	{
		return $this->db->get('produk')->num_rows();
	}

	public function getProduk($table,$limit,$start)
	{
		return $this->db->get($table,$limit,$start)->result_array();

	}

	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->like('nama_produk',$keyword);
		$this->db->or_like('keterangan',$keyword);
		$this->db->or_like('kategori',$keyword);
		$this->db->or_like('ukuran',$keyword);	
		$this->db->or_like('gambar',$keyword);	
		
		$query = $this->db->get()->result_array();	
		return $query;
	}

	public function find($id)
	{
		$result = $this->db->where('id',$id)
								->limit(1)
								->get('produk');
		if ($result->num_rows()>0) {
			return $result->row();
		}else  {
			return array();
		}
	}


}

/* End of file Model_produk.php */
/* Location: ./application/models/Model_produk.php */