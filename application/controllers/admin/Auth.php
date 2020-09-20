<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$data = [
			'halaman' => 'login',
			'judul' => 'Login Admin'
		];
		$this->load->view('templates/user/header',$data);
		$this->load->view('templates/user/sidebar');
		$this->load->view('login');
		$this->load->view('templates/user/footer');
	}

	public function prosesLogin()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Login Admin';
			$this->load->view('templates/user/header',$data);
			$this->load->view('templates/user/sidebar');
			$this->load->view('login');
			$this->load->view('templates/user/footer');
		} else {
			// validasinya success
			$this->_login();
		}
	}

	public function _login()
	{
	    $username = $this->input->post('username',TRUE);
	    $password = $this->input->post('password',TRUE);


	    $user = $this->db->get_where('users',['username' => $username])->row_array();

	    // usernya ada
	    if ($user) {
	    	//jika usernya aktif
	    	if ($user['is_active'] == 1) {
	    	 	// cek password
	    	 	if (password_verify($password, $user['password'])) {
	    	 		$data = [
	    	 			'username' => $user['username']
	    	 		];
	    	 		$this->session->set_userdata($data);
	    	 		redirect('admin/dashboard','refresh');
	    	 	}else{
	    	 		$this->session->set_flashdata('pesan','
					<script>
						alert("Password Salah !");
					</script>
				');
	    		redirect('admin/auth','refresh');
	    	 	}
	    	}else{
	    		$this->session->set_flashdata('pesan','
					<script>
						alert("Akun ini tidak aktif ! Silahkan minta ke user lain untuk mengaktifkannya :) ");
					</script>
				');
	    		redirect('admin/auth','refresh');
	    	} 
	    }else{
	    	$this->session->set_flashdata('pesan','
					<script>
						alert("User belum terdaftar pada sistem !");
					</script>
				');
	    	redirect('admin/auth','refresh');
	    }
	}

	public function logout()
	{
	    $this->session->unset_userdata('username');

	    $this->session->set_flashdata('message',
				'
					<script>
						alert("Anda berhasil logout !");
					</script>
				');
			redirect('home','refresh');
	}

}
/* End of file Auth.php */
/* Location: ./application/controllers/admin/Auth.php */