<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan', '
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
			'halaman' 	=> 'admin/users',
			'judul' 	=> 'Users',
			'users' 	=> $this->model_users->getData('users')
		];
		$data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/users/index');
		$this->load->view('templates/admin/footer');
	}

	public function tambahUser()
	{
		$data = [
			'halaman' 	=> 'admin/users/tambah',
			'judul' 	=> 'Tambah User',
		];
		$data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/users/tambah');
		$this->load->view('templates/admin/footer');
	}

	public function tambahUserAksi()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required|max_length[120]', [
			'required' => 'Nama wajib diisi !',
			'max_length' => 'Jumlah karakter maksimal adalah 120 !',
		]);
		$this->form_validation->set_rules('username', 'username', 'trim|required|max_length[120]|is_unique[users.username]', [
			'required' => 'Username wajib diisi !',
			'max_length' => 'Jumlah karakter maksimal adalah 120 !',
			'is_unique' => 'Username sudah terdaftar pada sistem !',
		]);
		$this->form_validation->set_rules('password', 'password', 'trim|required', [
			'required' => 'Password wajib diisi !'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->tambahUser();
		} else {
			$nama 			= htmlspecialchars($this->input->post('nama', TRUE));
			$username 		= htmlspecialchars($this->input->post('username', TRUE));

			// hash pwd
			$pass 			= htmlspecialchars($this->input->post('password'));
			$hashpwd 		= password_hash($pass, PASSWORD_DEFAULT);

			$is_active		= 0;

			$data = [
				'nama'		=>	$nama,
				'username'	=>	$username,
				'password'	=>	$hashpwd,
				'is_active'	=>  $is_active,
			];
			$this->model_users->insertData($data, 'users');
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil disimpan !")</script>');
			redirect('users');
		}
	}

	public function getUserId($id)
	{
		$hasil = $this->db->where('id', $id)->get('users');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}

	public function updateUser($id)
	{
		$data = [
			'judul' => 'User Update',
			'halaman' => 'admin/users/update',
			'detail' =>  $this->getUserId($id),
			'user' =>  $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array(),
		];

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar');
		$this->load->view('admin/users/update');
		$this->load->view('templates/admin/footer');
	}

	public function updateUserAksi()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');

		// cek apakah user mengganti password atau tidak
		if($this->input->post('password') == null){
			$password = $this->input->post('password_lama');
		}else{
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		}
		
		// cek yang diupdate data sendiri atau orang lain
		if ($this->session->userdata('user_id') != $id) {
			$this->session->set_flashdata('message', '<script>alert("Maaf anda tidak bisa merubah data orang lain !");</script>');
			redirect('users','refresh');
		}


		$this->form_validation->set_rules('nama', 'nama', 'trim|required|max_length[120]', [
			'required' => 'Nama wajib diisi !',
			'max_length' => 'Jumlah karakter maksimal adalah 120 !',
		]);
		$this->form_validation->set_rules('username', 'username', 'trim|required|max_length[120]', [
			'required' => 'Username wajib diisi !',
			'max_length' => 'Jumlah karakter maksimal adalah 120 !',
		]);
		$this->form_validation->set_rules('password', 'password', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$this->updateUser($id);
		} else {
			$data = [
				'id' 		=> htmlspecialchars($id),
				'nama' 		=> htmlspecialchars($this->input->post('nama')),
				'password' 	=> $password
			];
			$where = array('id' => $id);
			$this->model_produk->update_data($where, $data, "users");
			$this->session->set_flashdata('message', '<script>alert("Data berhasil diupdate !");</script>');
			redirect('users');
		}
	}

	public function deleteUser($id)
	{
		$where = array('id' => $id);
		$query = $this->db->query("SELECT * FROM users WHERE id = $id")->result_array();
		$username = $query[0]['username'];
		if ($this->session->userdata('username') == $username) {
			$this->session->set_flashdata(
				'message',
				'<script>alert("Tidak bisa menghapus akun sendiri !")</script>'
			);
			redirect('users','refresh');
		} else {
			$this->model_users->deleteData($where, 'users');
			$this->session->set_flashdata(
				'message',
				'<script>alert("User berhasil dihapus !")</script>'
			);
			redirect('users');
		}
	}

	public function deactivateUser($id)
	{
		$query = $this->db->query("SELECT `is_active` FROM users WHERE id = $id")->result_array();
		$is_active = $query[0]['is_active'];

		// cek apakah user berstatus aktif atau tidak
		if ($is_active == 1 && $this->session->userdata('user_id') != $id) {
			$query = $this->db->query("UPDATE `users` SET `is_active` = '0' WHERE `users`.`id` = $id;");
			if ($query) {
				$this->session->set_flashdata('message', '<script>alert("User berhasil dinonaktifkan !")</script>');
			}else{
				$this->session->set_flashdata('message', '<script>alert("User gagal dinonaktifkan !")</script>');
			}
			redirect('users','refresh');
		}else{
			$this->session->set_flashdata('message', '<script>alert("Anda tidak bisa menonaktifkan akun sendiri!")</script>');
			redirect('users','refresh');
		}
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/admin/Users.php */