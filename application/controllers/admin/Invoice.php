<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	// cek apakah user sudah login / belum
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

	// menampilkan halaman default Invoice
	public function index()
	{
		$data = [
			'halaman' => 'admin/invoice',
			'judul' => 'Invoice',
			'user' => $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array(),
			'invoice' => $this->model_invoice->tampil_data()
		];	

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/invoice/index');
		$this->load->view('templates/admin/footer');
	}

	// detail invoice 
	public function detailInvoice($id_invoice)
	{
		$data = [
			'halaman' => 'admin/invoice',
			'judul' => 'Detail Invoice ',
			'user' => $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array(),
			'invoice' => $this->model_invoice->ambil_id_invoice($id_invoice),
			'pesanan' => $this->model_invoice->ambil_id_pesanan($id_invoice)
		];	

		// var_dump ($data['invoice']);
		// var_dump ($data['pesanan']);

		// exit();

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/invoice/detail');
		$this->load->view('templates/admin/footer');
	}

}

/* End of file Invoice.php */
/* Location: ./application/controllers/admin/Invoice.php */