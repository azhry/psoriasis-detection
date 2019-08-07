<?php 

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'user';

		$id_pengguna	= $this->session->userdata('id_pengguna');
	    $username 		= $this->session->userdata('username');
	    $id_role		= $this->session->userdata('id_role');
		if (!isset($id_pengguna, $username, $id_role) or $id_role != 2)
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->model('Gejala_m');
		$this->data['gejala']	= Gejala_m::get();

		if ($this->POST('process'))
		{
			$this->load->model('Penyakit_m');
			$gejala = [];

			unset($_POST['process']);
			foreach ($_POST as $key => $value)
			{
				$token = explode('_', $key);
				$id = $token[1];
				
				$row = Gejala_m::with(['gejala_penyakit', 'gejala_penyakit.penyakit'])->find($id);
				if (isset($row))
				{
					$gejala []= $row;
				}
			}

			$this->load->library('dss/DempsterShafer');
			$this->data['result'] 			= $this->dempstershafer->predict($gejala);
			$this->data['gejala_terpilih'] 	= $gejala;

			$this->data['penyakit'] = [];
			if (count($this->data['result']) > 0)
			{
				foreach ($this->data['result'][0]['kode'] as $kode)
				{
					$penyakit = Penyakit_m::where('kode', $kode)->first();
					if (isset($penyakit))
					{
						$this->data['penyakit'] []= $penyakit;
					}
				}
			}
		}

		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function profile()
	{
		$this->load->model('Pengguna_m');
		$this->data['pengguna'] = Pengguna_m::find($this->session->userdata('id_pengguna'));
		if ($this->POST('submit'))
		{
			$logout = false;
			if ($this->data['pengguna']->username != $this->POST('username'))
			{
				$logout = true;
			}

			$this->data['pengguna']->nama = $this->POST('nama');
			$this->data['pengguna']->username = $this->POST('username');

			$password 	= $this->POST('password');
			$rpassword 	= $this->POST('rpassword');
			if (isset($password, $rpassword) && !empty($password) && !empty($rpassword)) 
			{
				if ($password !== $rpassword)
				{
					$this->flashmsg('Kolom password harus sama dengan kolom Re-type Password', 'danger');
					redirect('user/profile');
				}

				$this->data['pengguna']->password = md5($password);
				$logout = true;
			}

			$this->data['pengguna']->save();
			if ($logout)
			{
				redirect('logout?a=profile');
			}

			$this->flashmsg('Profile berhasil diubah');
			redirect('user/profile');
		}

		$this->data['title']	= 'Profile';
		$this->data['content']	= 'profile';
		$this->template($this->data, $this->module);
	}
}