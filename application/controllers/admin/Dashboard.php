<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent ::__construct();
		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan','
				<script>
					alert("Anda belum login ! Silahkan login terlebih dahulu.");
				</script>
				');
			redirect('admin/auth');
		}
	}

	public function index()
	{
		// hitung jumlah pesanan
		$pesanan = $this->db->query("SELECT * FROM pesanan");
		$jumlah_pesanan = $pesanan->num_rows();

		// hitung total produk 
		$produk = $this->db->query("SELECT * FROM produk");
		$prod = $produk->num_rows();

		// hitung total pesan masuk
		$pesan1 = $this->db->query("SELECT * FROM contact");
		$pesan = $pesan1->num_rows();

		// hitung total email masuk
		$email1 = $this->db->query("SELECT * FROM email");
		$email = $email1->num_rows();

		// hitung total kategori produk
		$cat = $this->db->query("SELECT * FROM kategori_produk");
		$kategori = $cat->num_rows();

		$data = [
			'halaman' => 'admin/dashboard',
			'judul'   => 'Dashboard',
			'pesanan' => $jumlah_pesanan,
			'produk' => $prod,
			'pesan'   => $pesan,
			'email'   => $email,
			'kategori' => $kategori
			
		];
		$data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('templates/admin/footer');
	}
    
}
