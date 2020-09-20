<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$data = [
			'halaman' => 'user/contact',
			'judul' => 'Contact',
		];

		$this->form_validation->set_rules('nama', 'nama', 'trim|required|max_length[120]',[
			'required' => "Nama wajib diisi !",
			'max_length' => "Jumlah karakter maksimal adalah 120 !",
		]);
		$this->form_validation->set_rules('email', 'email', 'trim|required|max_length[120]|valid_email',[
			'required' => "Email wajib diisi !",
			'max_length' => "Jumlah karakter maksimal adalah 120 !",
			'valid_email' => "Masukan email yang benar !",
		]);
		$this->form_validation->set_rules('subjek', 'subjek', 'trim|required|max_length[20]',[
			'required' => "Subjek wajib diisi !",
			'max_length' => "Jumlah karakter maksimal adalah 20 !",
		]);
		$this->form_validation->set_rules('pesan', 'pesan', 'trim|required',[
			'required' => "Pesan wajib diisi !",
			'max_length' => "Jumlah karakter maksimal adalah 120 !",
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/user/header', $data);
			$this->load->view('templates/user/sidebar');
			$this->load->view('user/contact');
			$this->load->view('templates/user/footer');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post("nama",TRUE)),
				'email' => htmlspecialchars($this->input->post("email",TRUE)),
				'subjek' => htmlspecialchars($this->input->post("subjek",TRUE)),
				'pesan' => htmlspecialchars($this->input->post("pesan",TRUE)),
			];
			$this->model_produk->insert_data($data,'contact');
			$this->session->set_flashdata('pesan','<script>alert("Pesan berhasil dikirim !")</script>');
			redirect('contact');
		}

	}


}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */