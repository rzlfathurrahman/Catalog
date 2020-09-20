<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct()
	{
		parent ::__construct();
		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('message','
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
			'halaman' => 'admin/kategori',
			'judul' => 'Kategori Produk',
			'kategori' => $this->model_kategori->tampil_data('kategori_produk')->result_array(),
		];
		$data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/kategori/index');
		$this->load->view('templates/admin/footer');
	}

	public function tambahKategori()
	{
		$data = [
			'judul' => 'Tambah Kategori',
			'halaman' => 'admin/kategori'
		];
		$data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/kategori/tambah');
		$this->load->view('templates/admin/footer');
	}

	public function tambahKategoriAksi()
	{
	  	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required|max_length[50]',[
			'required' => 'Kategori Wajib Diisi !'
		]);
		$this->form_validation->set_rules('link', 'link', 'trim|required|max_length[128]',[
			'required' => 'Link Wajib Diisi !'
		]);

	  	if ($this->form_validation->run() == FALSE)  {
				$this->tambahKategori();
		}else{
			$link 		= htmlspecialchars($this->input->post('link',TRUE));
			$kategori 	= htmlspecialchars($this->input->post('kategori',TRUE));

			$data = [
				'kategori'	=>	$kategori,
				'link'		=>	$link,
				'status'	=> 0,
			];
			$this->model_kategori->insert_data($data,'kategori_produk');
			$this->session->set_flashdata('message','<script>alert("Data berhasil disimpan !")</script>');
			redirect('kategori');
  		}
	}

	public function updateKategori($id)
	{
		$data = [
			'judul' => 'Kategori Produk Update',
			'halaman' => 'admin/kategori',
			'detail' =>  $this->model_kategori->getKategoriId($id),
			'user' =>  $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array(),
		];

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/kategori/update',$data);
		$this->load->view('templates/admin/footer');
	}

	public function updateKategoriAksi()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required|max_length[50]',[
			'required' => 'Kategori Wajib Diisi !'
		]);
		$this->form_validation->set_rules('link', 'link', 'trim|required|max_length[128]',[
			'required' => 'Link Wajib Diisi !'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->updateKategori($id);
		}else{
			$kategori 	= htmlspecialchars($this->input->post('kategori',TRUE));
			$link 		= htmlspecialchars($this->input->post('link',TRUE));
			$status 	= htmlspecialchars($this->input->post('status',TRUE));
			$data = array(
				'kategori'	=>	$kategori,
				'link'		=>	$link,
				'status'	=>	$status,
			);

			$where = array('id' => $id);
			$this->model_kategori->update_data($where,$data,'kategori_produk');
			$this->session->set_flashdata('message','<script>alert("Data berhasil diupdate !")</script>');
			redirect('kategori');
		}
	}

	public function deleteKategori($id)
	{
		$where = array('id' => $id);
		$this->model_kategori->hapus_data($where,'kategori_produk');
		$this->session->set_flashdata('message',
			'<script>alert("Data berhasil dihapus !")</script>'
		);
		redirect('kategori');
	}




}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */