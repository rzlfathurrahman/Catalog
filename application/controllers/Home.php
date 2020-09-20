<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

		// $data['produk'] = $this->db->query("SELECT * FROM(SELECT * FROM `produk` ORDER BY `id` DESC LIMIT 3)Var1 ORDER BY id ASC")->result();
		$table 	= 'produk';
		$kategori = [
			"L" => '"Pakaian Laki"',
			"W" => '"Pakaian Wanita"'
		];
		$limit = 5;

		$data 	= [
			'produkBaru' =>  $this->model_produk->getLastData($table,$limit)->result(),
			'produkLaki' =>  $this->model_produk->getProdukKategori($table,$kategori['L'],$limit)->result(),
			'produkWanita' =>  $this->model_produk->getProdukKategori($table,$kategori['W'],$limit)->result(),
			'halaman' => 'user/home',
			'judul'   => 'Home'
		];

		$this->load->view('templates/user/header',$data);
		$this->load->view('templates/user/sidebar');
		$this->load->view('user/home');
		$this->load->view('templates/user/footer');
	}

	public function promotions()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|valid_emails',[
			'valid_email' => 'Harap Masukan Email Yang Benar!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = [
				'email' => $this->input->post('email',TRUE),
			];
			$this->db->insert('email',$data);
			$this->session->set_flashdata('message', '
				<script>alert("Email berhasil terkirim! Silahkan tunggu update selanjutnya dari kami :)")</script>
			');
			redirect('home','refresh');
		}	
	}
}
