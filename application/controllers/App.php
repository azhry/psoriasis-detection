<?php 

class App extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'home';
	}

	public function test()
	{
		$this->load->model('Gejala_m');
		$this->data['gejala'] = Gejala_m::with(['gejala_penyakit', 'gejala_penyakit.penyakit'])
									->get();

		$this->load->library('dss/DempsterShafer');
		$result = $this->dempstershafer->predict($this->data['gejala']);
		$this->dump($result);
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
			redirect('app/input-gejala');
		}

		$this->data['title']	= 'Input Gejala';
		$this->data['content']	= 'input_gejala';
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
		if ($this->POST('submit'))
		{
			$this->load->model('Penyakit_m');
			$penyakit = new Penyakit_m();
			$penyakit->nama_penyakit 	= $this->POST('nama_penyakit');
			$penyakit->kode 			= $this->POST('kode');
			$penyakit->save();
			$this->flashmsg('Penyakit baru berhasil ditambahkan');
			redirect('app/input-penyakit');
		}

		$this->data['title']	= 'Input Penyakit';
		$this->data['content']	= 'input_penyakit';
		$this->template($this->data, $this->module);
	}
}