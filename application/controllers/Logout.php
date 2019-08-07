<?php 

class Logout extends MY_Controller
{
	public function index()
	{
		$this->session->sess_destroy();

		$action = $this->input->get('a');
		if (isset($action) && $action == 'profile')
		{
			$this->flashmsg('Profile anda berhasil diubah. Silahkan login kembali');
			redirect('login?a=profile');
		}

		redirect('login');
	}
}