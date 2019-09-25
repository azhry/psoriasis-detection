<?php 

/**
* folder controllers, models, views, libraries
*
* controllers: kode program yg mengatur alur program
* models: kode program yang digunakan untuk menghandle data pada database
* views: kode program yang digunakan untuk layouting tampilan
**/

// buka di git bash
// jika ada kodingan yg diubah, langkah mengupdatenya ke github
// git status
// git add .
// git commit -m "pesan commit nya apa"
// git push origin master


// jika ada yg update 
// git pull origin master

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'admin';

		$id_pengguna	= $this->session->userdata('id_pengguna');
	    $username 		= $this->session->userdata('username');
	    $id_role		= $this->session->userdata('id_role');
		if (!isset($id_pengguna, $username, $id_role) or $id_role != 1)
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	// kode program yg dijalankan ketika membuka link localhost/psoriasis-detection/admin/index
	public function index()
	{
		$this->load->model('Gejala_m');
		$this->data['gejala']	= Gejala_m::get();

		// jika tombol proses diklik, maka jalankan kode program di dalam if ini
		if ($this->POST('process'))
		{
			$this->load->model('Penyakit_m');
			$gejala = [];

			unset($_POST['process']);
			if (count(array_keys($_POST)) <= 0)
			{
				$this->flashmsg('Anda harus memilih gejala terlebih dahulu', 'danger');
				redirect('admin');
			}

			foreach ($_POST as $key => $value)
			{
				$token = explode('_', $key);
				$id = $token[1];
				
				$row = Gejala_m::with(['gejala_penyakit', 'gejala_penyakit.penyakit'])->find($id);
				if (isset($row))
				{
					$gejala []= $row; // gejala yg dipilih
				}
			}

			$this->load->library('dss/DempsterShafer'); // di folder libraries/dss
			$this->data['result'] 			= $this->dempstershafer->predict($gejala);
			$this->data['gejala_terpilih'] 	= $gejala; // gejala yg kita pilih disimpan disini

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
		$this->data['content']	= 'dashboard'; // lihat di views/admin/dashboard.php
		$this->template($this->data, $this->module);
	}

	public function yyy()
	{
		echo 'test';
	}

	public function gejala()
	{
		$this->load->model('Gejala_m');
		$this->data['gejala']	= Gejala_m::get();
		$this->data['title']	= 'Menu Gejala';
		$this->data['content']	= 'menu_gejala';
		$this->template($this->data, $this->module);
	}

	public function input_gejala()
	{
		$this->load->model('Penyakit_m');
		$this->data['penyakit']	= Penyakit_m::get();

		if ($this->POST('submit'))
		{
			$this->load->model('Gejala_m');
			$gejala = new Gejala_m();
			$gejala->nama_gejala 	= $this->POST('nama_gejala');
			$gejala->belief 		= $this->POST('belief');
			$gejala->save();

			$idGejala = $gejala->id;
			$gejalaPenyakit = [];
			foreach ($this->data['penyakit'] as $penyakit)
			{
				if (isset($_POST[$penyakit->kode]))
				{
					$gejalaPenyakit []= [
						'id_gejala'		=> $idGejala,
						'id_penyakit'	=> $penyakit->id
					];
				}
			}

			$this->load->model('GejalaPenyakit_m');
			GejalaPenyakit_m::insert($gejalaPenyakit);

			$this->flashmsg('Gejala baru berhasil ditambahkan');
			redirect('admin/gejala');
		}

		$this->data['title']	= 'Input Gejala';
		$this->data['content']	= 'input_gejala';
		$this->template($this->data, $this->module);
	}

	public function edit_gejala()
	{
		$this->data['id'] = $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));

		$this->load->model('Gejala_m');
		$this->data['gejala'] = Gejala_m::find($this->data['id']);
		$this->check_allowance(!isset($this->data['gejala']), ['Data not found', 'danger']);

		$this->load->model('Penyakit_m');
		$this->data['penyakit']	= Penyakit_m::get();

		$this->load->model('GejalaPenyakit_m');
		$gejalaPenyakitLama = GejalaPenyakit_m::where('id_gejala', $this->data['id'])->get();
		$this->data['id_penyakit'] = array_column($gejalaPenyakitLama->toArray(), 'id_penyakit');

		if ($this->POST('submit'))
		{
			$gejala = Gejala_m::find($this->data['id']);
			$gejala->kode			= $this->POST('kode');
			$gejala->nama_gejala 	= $this->POST('nama_gejala');
			$gejala->belief 		= $this->POST('belief');
			$gejala->save();

			$idGejala = $gejala->id;
			$gejalaPenyakit = [];
			foreach ($this->data['penyakit'] as $penyakit)
			{
				if (isset($_POST[$penyakit->kode]))
				{
					$gejalaPenyakit []= [
						'id_gejala'		=> $idGejala,
						'id_penyakit'	=> $penyakit->id
					];
				}
			}

			GejalaPenyakit_m::where('id_gejala', $this->data['id'])->delete();
			GejalaPenyakit_m::insert($gejalaPenyakit);

			$this->flashmsg('Gejala baru berhasil ditambahkan');
			redirect('admin/gejala');
		}

		$this->data['title']	= 'Edit Gejala';
		$this->data['content']	= 'edit_gejala';
		$this->template($this->data, $this->module);
	}

	public function penyakit()
	{
		$this->load->model('Penyakit_m');
		$this->data['penyakit']	= Penyakit_m::get();
		$this->data['title']	= 'Menu Penyakit';
		$this->data['content']	= 'menu_penyakit';
		$this->template($this->data, $this->module);
	}

	public function input_penyakit()
	{
		$this->load->model('Penyakit_m');

		if ($this->POST('submit'))
		{
			$penyakit = new Penyakit_m();
			$penyakit->nama_penyakit 	= $this->POST('nama_penyakit');
			$penyakit->kode 			= $this->POST('kode');
			$penyakit->saran_penanganan = $this->POST('saran_penanganan');
			$penyakit->save();

			$this->flashmsg('Penyakit baru berhasil ditambahkan');
			redirect('admin/penyakit');
		}

		$this->data['title']	= 'Input Penyakit';
		$this->data['content']	= 'input_penyakit';
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
					redirect('admin/profile');
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
			redirect('admin/profile');
		}

		$this->data['title']	= 'Profile';
		$this->data['content']	= 'profile';
		$this->template($this->data, $this->module);
	}

	public function tambah_gejala_penyakit()
	{
		$this->data['id_penyakit'] = $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id_penyakit']));

		$this->load->model('Penyakit_m');
		$this->data['penyakit'] = Penyakit_m::with(['gejala_penyakit', 'gejala_penyakit.gejala'])
									->find($this->data['id_penyakit']);
		$this->check_allowance(!isset($this->data['penyakit']), ['Data not found', 'danger']);

		if ($this->POST('submit'))
		{
			$this->db->trans_start();
			
			$gejala 						= new Gejala_m();
			$gejala->nama_gejala 			= $this->POST('nama_gejala');
			$gejala->belief 				= $this->POST('belief');
			$gejala->save();

			$gejalaPenyakit 				= new GejalaPenyakit_m();
			$gejalaPenyakit->id_penyakit 	= $this->data['id_penyakit'];
			$gejalaPenyakit->id_gejala 		= $gejala->id;
			$gejalaPenyakit->save();

			$this->db->trans_complete();

			$this->flashmsg('Gejala penyakit berhasil ditambah');
			redirect('admin/tambah-gejala-penyakit/' . $this->data['id_penyakit']);
			exit;
		}

		$this->data['title']	= 'Form Tambah Gejala Penyakit';
		$this->data['content']	= 'form_tambah_gejala_penyakit';
		$this->template($this->data, $this->module);
	}

	public function hapus_gejala_penyakit()
	{
		$this->data['id_penyakit'] 	= $this->GET('id_penyakit');
		$this->check_allowance(!isset($this->data['id_penyakit']));

		$this->load->model('Penyakit_m');
		$this->data['penyakit'] = Penyakit_m::find($this->data['id_penyakit']);
		$this->check_allowance(!isset($this->data['penyakit']), ['Data not found', 'danger']);

		$this->data['id_gejala']	= $this->GET('id_gejala');
		$this->check_allowance(!isset($this->data['id_gejala']));

		$this->load->model('Gejala_m');
		$this->data['gejala'] = Gejala_m::find($this->data['id_gejala']);
		$this->check_allowance(!isset($this->data['gejala']), ['Data not found', 'danger']);

		$this->load->model('GejalaPenyakit_m');
		GejalaPenyakit_m::where('id_penyakit', $this->data['id_penyakit'])
						->where('id_gejala', $this->data['id_gejala'])
						->delete();

		$this->flashmsg('Gejala penyakit berhasil dihapus');
		redirect('admin/tambah-gejala-penyakit/' . $this->data['id_penyakit']);
		exit;

	}
}