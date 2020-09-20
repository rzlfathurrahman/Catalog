<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
			'judul' => 'Produk',
			'halaman' => 'admin/produk'
		];

		$data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();
		$data['produk'] = $this->model_produk->tampil_data('produk')->result_array();	

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/produk/index');
		$this->load->view('templates/admin/footer');
	}

	public function detail($id)
	{
		$data = [
			'judul' => 'Produk Detail',
			'halaman' => 'admin/produk',
			'detail' =>  $this->model_produk->getProductId($id),
			'user' =>  $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array(),
		];

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/produk/detail',$data);
		$this->load->view('templates/admin/footer');
	}

	public function tambahProduk()
	{
		$kategori['kategori'] = $this->model_kategori->tampil_data('kategori_produk')->result();
		$data = [
			'judul' => 'Produk',
			'halaman' => 'admin/produk'
		];
		$data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/produk/tambah',$kategori);
		$this->load->view('templates/admin/footer');
	}

	public function tambahProdukAksi()
	{
	  	$this->_rules();
	  	// $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required');

	  	if ($this->form_validation->run() == FALSE)  {
				$this->tambahProduk();
		}else{
			$nama_produk 	= htmlspecialchars($this->input->post('nama_produk',TRUE));
			$keterangan 	= htmlspecialchars($this->input->post('keterangan',TRUE));
			$kategori 		= htmlspecialchars($this->input->post('kategori',TRUE));
			$ukuran			= htmlspecialchars($this->input->post('ukuran',TRUE));
			$harga			= htmlspecialchars($this->input->post('harga',TRUE));
			$stok			= htmlspecialchars($this->input->post('stok',TRUE));
			$gambar			= $_FILES['gambar']['name'];

			// pemisahan nama file dan ekstensi
			$pecah_gambar = explode(".", $gambar);
			$ekstensi_gambar = $pecah_gambar[1];

			$file_name = random_string('alnum',120).".".$ekstensi_gambar;

		 	$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['overwrite']            = true;
			$config['max_size']             = 2048;
			$config['max_width']            = 1024;
			$config['max_height']           = 1024;
			// $config['encrypt_name']         = true;
			$config['file_name']            = $file_name ;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar'))
			{
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('welcome_message', $error);
			}


			$data = [
				'nama_produk'	=>	$nama_produk,
				'keterangan'	=>	$keterangan,
				'kategori'		=>	$kategori,
				'ukuran'		=>  $ukuran,
				'harga'			=>  $harga,
				'stok'			=>  $stok,
				'gambar'		=>  $file_name
			];
			$this->model_produk->insert_data($data,'produk');
			$this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan !")</script>');
			redirect('produk');
  		}
	}

	public function update($id)
	{	
		$kategori['kategori'] = $this->model_kategori->tampil_data('kategori_produk')->result();
		$data = [
			'judul' => 'Produk Update',
			'halaman' => 'admin/produk',
			'detail' =>  $this->model_produk->getProductId($id),
			'user' =>  $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array(),
		];

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/produk/update',$kategori);
		$this->load->view('templates/admin/footer');
	}
	

	public function updateAksi()
	{
		$this->_rules();
		$id= $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->update($id);
		}else{
			//$id      		= $this->input->post('id');
			$nama_produk 	=htmlspecialchars($this->input->post('nama_produk',TRUE));
			$keterangan 	=htmlspecialchars($this->input->post('keterangan',TRUE));
			$kategori 		=htmlspecialchars($this->input->post('kategori',TRUE));
			$ukuran			=htmlspecialchars($this->input->post('ukuran',TRUE));
			$harga			=htmlspecialchars($this->input->post('harga',TRUE));
			$stok			=htmlspecialchars($this->input->post('stok',TRUE));
			$gambar_lama    = $this->input->post('gambar_lama');
			$gambar			= $_FILES['gambar']['name'];

			if (empty($gambar)) {
				$file_name = $gambar_lama;
			}else{
				// pemisahan nama file dan ekstensi
				$pecah_gambar = explode(".", $gambar);
				$ekstensi_gambar = $pecah_gambar[1];

				$file_name = random_string('alnum',120).".".$ekstensi_gambar;

			 	$config['upload_path']          = './assets/uploads/';
				$config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['overwrite']            = true;
				$config['max_size']             = 2048;
				$config['max_width']            = 1024;
				$config['max_height']           = 1024;
				// $config['encrypt_name']         = true;
				$config['file_name']            = $file_name ;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('welcome_message', $error);
				}
			}

			$data = array(
				'nama_produk'	=>	$nama_produk,
				'keterangan'	=>	$keterangan,
				'kategori'		=>	$kategori,
				'ukuran'		=>  $ukuran,
				'harga'			=>  $harga,
				'stok'			=>  $stok,
				'gambar'		=>  $file_name
			);

			$where = array('id' => $id);
			$this->model_produk->update_data($where,$data,'produk');
			$this->session->set_flashdata('pesan','<script>alert("Data berhasil diupdate !")</script>');
			redirect('produk');
		}
	}
	public function delete($id)
	{
		$where = array('id' => $id);
		$this->model_produk->hapus_data($where,'produk');
		$this->session->set_flashdata('pesan',
			'<script>alert("Data berhasil dihapus !")</script>'
		);
		redirect('produk');
	}


	public function _rules()
	{
		$this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required|max_length[120]',[
			'required' => 'Nama Produk Wajib Diisi !'
		]);
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required|max_length[200]',[
			'required' => 'Keterangan Wajib Diisi !'
		]);
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required|max_length[250]',[
			'required' => 'Kategori Wajib Diisi !'
		]);
		$this->form_validation->set_rules('ukuran', 'ukuran', 'trim|required|max_length[4]',[
			'required' => 'Ukuran Wajib Diisi !'
		]);
		$this->form_validation->set_rules('harga', 'harga', 'trim|required|max_length[11]',[
			'required' => 'Harga Wajib Diisi !'
		]);
		$this->form_validation->set_rules('stok', 'stok', 'trim|required|max_length[5]',[
			'required' => 'Stok Wajib Diisi !'
		]);
	}


}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */