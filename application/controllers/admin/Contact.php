<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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
		$data = [
			'halaman' => 'admin/contact',
			'judul' => 'Contact',
			'user' => $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array(),
			'contact' => $this->model_produk->tampil_data("contact")->result_array()

		];	
		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/contact/index');
		$this->load->view('templates/admin/footer');
	}


	public function detail($id)
	{

		$data = [
			'judul' => 'Detail Pesan',
			'halaman' => 'admin/contact',
			'detail' =>  $this->getContactId($id),
			'user' =>  $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array(),
		];

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/contact/detail',$data);
		$this->load->view('templates/admin/footer');
	}

	public function getContactId($id)
	{
		$hasil = $this->db->where('id',$id)->get('contact');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function balas($id)
	{
	    $where = array('id' => $id);

	    $data = [
			'judul' => 'Balas Pesan',
			'halaman' => 'admin/contact',
			'user' =>  $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array(),
		];

	    $data['contact'] = $this->getContactId($id);

	    $this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/contact/balas');
		$this->load->view('templates/admin/footer');
	}

	public function balasAksi()
	{ 
		$id = $this->input->post('id');
		$to_email = $this->input->post('email');
		$subject  = $this->input->post('subject');
		$message  = $this->input->post('pesan');

		$config = [
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'githubakun686@gmail.com',
			'smtp_pass' => 'githubakun123',
			'smtp_port' => 465,
			'crlf'      => "\r\n",
			'newline'  => "\r\n"
		];

	    $this->load->library('email',$config);
	    
	    $this->email->from("MRDN Catalog");
	    $this->email->to($to_email);
	    $this->email->subject($subject);
	    $this->email->message($message);

	    if ($this->email->send()) {
	    	$this->session->set_flashdata('message','<script>
					alert("Pesan Berhasil Terkirim !");
				</script>');
				redirect('admin/contact');
	    }else{
	    	$this->session->set_flashdata('message','<script>
					alert("Pesan Gagal Dikirim !");
				</script>');
				redirect("admin/contact");
	    }
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->model_produk->hapus_data($where,'contact');
		$this->session->set_flashdata('message',
			'<script>alert("Data berhasil dihapus !")</script>'
		);
		redirect('admin/contact');
	}
	
}

/* End of file Contact.php */
/* Location: ./application/controllers/admin/Contact.php */