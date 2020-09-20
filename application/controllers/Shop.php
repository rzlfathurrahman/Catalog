<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	// METHOD INDEX
	public function index()
	{

		//load lib pagination 
		$this->load->library('pagination');

		// config pagination
		$config['base_url'] = 'http://localhost/catalog/shop/';
		$config['total_rows'] = $this->model_produk->totalProduk();

		// data per halaman, nanti diubah kalau datanya sudah banyak
		$config['per_page'] = 10;

		$this->load->library('pagination');
		
		// custom pagination
		$config['full_tag_open'] = '<nav class="cat_page mt-3 mb-3 mx-auto" aria-label="Page navigation example"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		// inisialisasi
		$this->pagination->initialize($config);

	    $data['start']	= $this->uri->segment(2);
		$data = [
			'kategori' => $this->model_kategori->tampil_data('kategori_produk')->result_array(),
			'produk'  => $this->model_produk->getProduk('produk',$config['per_page'],$data['start']),
			'halaman' => 'user/shop',
			'judul'   => 'Shop'
		];

		$this->load->view('templates/user/header',$data);
		$this->load->view('templates/user/sidebar');
		$this->load->view('user/shop/index');
		$this->load->view('templates/user/footer');
	}


	// METHOD UNTUK BERBAGAI KATEGORI PRODUK
	public function kategori($kategori)
	{
		$where = array('kategori' => $kategori);
		$table= 'produk';
		$data = [
			'kategori' => $this->model_kategori->tampil_data('kategori_produk')->result_array(),
			'produk'  => $this->model_produk->edit_data($where,$table)->result_array(),
			'halaman' => 'user/shop',
			'judul'   => $kategori
		];

		$this->load->view('templates/user/header',$data);
		$this->load->view('templates/user/sidebar');
		$this->load->view("user/shop/kategori/$kategori");
		$this->load->view('templates/user/footer');
	}

	// METHOD UNTUK MENCARI PRODUK TERTENTU
	public function search()
	{
		$keyword 		=	$this->input->post('keyword');
		$data = [
			'kategori' => $this->model_kategori->tampil_data('kategori_produk')->result_array(),
			'halaman' => 'user/shop',
			'sub_halaman' => 'user/shop',
			'judul' => 'Search',
			'produk' => $this->model_produk->get_keyword($keyword)
		];

		$this->load->view('templates/user/header',$data);
		$this->load->view('templates/user/sidebar');
		$this->load->view('user/shop/search');
		$this->load->view('templates/user/footer');
	}

	// detail produk sebelum membeli
	public function details($id)
	{
		$data = [
			'judul' => 'Detail Produk',
			'halaman' => 'user/shop',
			'detail' =>  $this->model_produk->getProductId($id)
		];

		$this->load->view('templates/user/header',$data);
		$this->load->view('templates/user/sidebar');
		$this->load->view('user/shop/detail',$data);
		$this->load->view('templates/user/footer');
	}

	// checkout produk yang telah dibeli
	public function checkoutProduk($id)
	{
		
		$data = [
			'judul' => 'Checkout Produk',
			'halaman' => 'user/shop',
			'detail' =>  $this->model_produk->getProductId($id),
			'jumlahBeli' => $this->input->post('jumlah',TRUE)
		];

		$this->load->view('templates/user/header',$data);
		$this->load->view('templates/user/sidebar');
		$this->load->view('user/shop/checkout',$data);
		$this->load->view('templates/user/footer');
	}

	// konfirmasi produk
	public function konfirmasiProduk()
	{
		var_dump($this->input->post());
	}

	// tambah produk ke keranjang
	public function addToChart($id)
	{
		$produk = $this->model_produk->find($id);

		$data = [
	        'id'      => $produk->id,
	        'qty'     => 1,
	        'price'   => $produk->harga,
	        'name'    => $produk->nama_produk,
	        'gambar'  => $produk->gambar,
	        'ukuran'  => $produk->ukuran
		];
		// var_dump ($data);exit();

		$a = $this->cart->insert($data);
		$this->session->set_flashdata('message', '<script>alert("Produk Telah Dimasukan Ke Keranjang !")</script>');
		redirect('shop/chartDetail','refresh');
	}

	// update cart
	public function updateCart()
	{
		$data = $this->input->post();
		$this->cart->update($data);
		$this->session->set_flashdata('message', '<script>alert("Keranjang Berhasil Diupdate !")</script>');
		redirect('shop/chartDetail','refresh');
		
	}

	// detail cart
	public function chartDetail()
	{
		if ($this->cart->contents()) {
			// $stok = $this->db->query("SELECT `stok` FROM `produk`")->result_array();
			$data = [
				'judul' => 'Keranjang Belanja',
				'halaman' => 'user/shop',
				// 'stok' => $stok
			];

			$this->load->view('templates/user/header', $data);
			$this->load->view('templates/user/sidebar');
			$this->load->view('user/shop/troli');
			$this->load->view('templates/user/footer');
		}else{
			$data = [
				'judul' => 'Keranjang Masih Kosong !',
				'halaman' => 'user/shop',
			];
			// $this->load->view('templates/admin/header', $data);
			$this->load->view('user/shop/troli_kosong');
			$this->load->view('templates/admin/footer', $data);
		}
	}

	// hapus keranjang
	public function cartDestroy()
	{
		$this->cart->destroy();
		$this->session->set_flashdata('message', '<script>alert("Keranjang Berhasil Dihapus !")</script>');
		redirect('shop/chartDetail','refresh');

	}

	// menu pembayaran dan isi data invoice
	public function pembayaran()
	{
		$data = [
				'judul' => 'Pembayaran',
				'halaman' => 'user/shop',
			];

		$this->load->view('templates/user/header',$data);
		$this->load->view('templates/user/sidebar');
		$this->load->view('user/shop/form_pembayaran');
		$this->load->view('templates/user/footer');
	}

	// proses pembayaran
	public function prosesPembayaran()
	{

		$is_processed = $this->model_invoice->index();

		if ($is_processed) {

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

			foreach ($this->cart->contents() as $item) {
				$data = array(
					'id_produk'		=> $item['id'],
					'nama_produk'	=> $item['name'],
					'jumlah'		=> $item['qty'],
					'harga'			=> $item['price'],
				);
			}

			$pesan = 'Terima Kasih. Pemesanan berhasil! Silahkan Screenshot Data Dibawah, Lalu Konfirmasikan Pembayaran Ke Sini <a href="https://api.whatsapp.com/send?phone=681229941133" target="_blank">
							<i class="fa fa-whatsapp"></i> 081229941133
						</a>.';
			$this->confirmation($pesan,$data,$invoice);
			$this->cart->destroy();
		}else  {
			$pesan = "Maaf. Pemesanan gagal!";
			$this->confirmation($pesan);
		}	
	}

	public function confirmation( $pesan,$data = [],$invoice ="" )
	{
		$data = [
				'judul' => 'Konfirmasi Pembayaran',
				'halaman' => 'user/shop',
				'pesan' => $pesan,
				'data' => $data,
				'invoice' => $invoice
			];

		$this->load->view('templates/user/header',$data);
		$this->load->view('templates/user/sidebar');
		$this->load->view('user/shop/pembayaran');
		$this->load->view('templates/user/footer');
	}



}

/* End of file Shop.php */
/* Location: ./application/controllers/Shop.php */