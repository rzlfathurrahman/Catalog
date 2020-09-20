<?php 
class Model_invoice extends CI_Model
{
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');

		$nama	 = htmlspecialchars($this->input->post('nama'));
		$alamat	 = htmlspecialchars($this->input->post('alamat'));
		$telepon = htmlspecialchars($this->input->post('telepon'));

		$invoice = [
			'nama'			=>	$nama,
			'alamat'		=>	$alamat,
			'telepon'		=>	$telepon,
			'tgl_pesan'		=>	date('Y-m-d H:i:s'),
			'batas_bayar'	=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1 ,date('Y'))),
		];
		$this->db->insert('invoice' ,$invoice);
		// var_dump ($a);exit();
		$id_invoice = $this->db->insert_id();

		foreach ($this->cart->contents() as $item) {
			$data = array(
				'id_invoice'	=> $id_invoice,
				'id_produk'		=> $item['id'],
				'nama_produk'	=> $item['name'],
				'jumlah'		=> $item['qty'],
				'harga'			=> $item['price'],
			);
			$jumlah = $item['qty'];
			$id = $item['id'];

			$this->db->insert('pesanan' ,$data);
			$this->db->query("UPDATE `produk` SET `stok` = stok - $jumlah WHERE `produk`.`id` = $id");
		}
		return TRUE;
	}

	public function tampil_data()
	{
		$result = $this->db->get('invoice');
		if ($result -> num_rows() > 0) {
			return $result->result() ;
		}else {
			return FALSE;
		}
	}

	public function ambil_id_invoice($id_invoice)
	{
		$result = $this->db->where('id',$id_invoice)->limit(1)->get('invoice');
		if ($result->num_rows() > 0) {
			return $result->row();
		}else{
			return FALSE;
		}
	}

	public function ambil_id_pesanan($id_invoice)
	{
		$result = $this->db->where('id_invoice',$id_invoice)->get('pesanan');
		if ($result->num_rows() > 0) {
			return $result->result();
		}else{
			return FALSE;
		}
	}
}
