<?php 

class GejalaCest
{
    public function inputGejalaTest(AcceptanceTester $I)
    {
    	$data = [
    		[
    			'nama_gejala'	=> 'Timbulnya bintik merah',
    			'belief'		=> 0.6,
    			'penyakit'		=> ['PV']
    		],
    		[
    			'nama_gejala'	=> 'Timbulnya lesi merah yang melebar',
    			'belief'		=> 0.7,
    			'penyakit'		=> ['PV', 'PP', 'PA', 'PG', 'PI', 'PE']
    		],
    		[
    			'nama_gejala'	=> 'Ditumbuhi sisik putih yang berlapis-lapis',
    			'belief'		=> 0.6,
    			'penyakit'		=> ['PV', 'PP', 'PA', 'PG', 'PE']
    		],
    		[
    			'nama_gejala'	=> 'Sering mengelupas',
    			'belief'		=> 0.7,
    			'penyakit'		=> ['PV']
    		],
    		[
    			'nama_gejala'	=> 'Gatal',
    			'belief'		=> 0.8,
    			'penyakit'		=> ['PV', 'PP', 'PA', 'PG', 'PI', 'PE']
    		],
    		[
    			'nama_gejala'	=> 'Sakit dan perih',
    			'belief'		=> 0.6,
    			'penyakit'		=> ['PV']
    		],
    		[
    			'nama_gejala'	=> 'Sering tertutup lapisan putih keperakan',
    			'belief'		=> 0.5,
    			'penyakit'		=> ['PV', 'PP', 'PA', 'PG', 'PE']
    		],
    		[
    			'nama_gejala'	=> 'Timbul di sekitar alis, lutut, kepala, siku, dan bagian belakang panggul',
    			'belief'		=> 0.7,
    			'penyakit'		=> ['PV']
    		],
    		[
    			'nama_gejala'	=> 'Kulit tebal dan keras',
    			'belief'		=> 0.5,
    			'penyakit'		=> ['PP', 'PA', 'PG']
    		],
            [
                'nama_gejala'   => 'Timbul pada bagian tangan dan kaki',
                'belief'        => 0.7,
                'penyakit'      => ['PP']
            ],
            [
                'nama_gejala'   => 'Nyeri pada sendi',
                'belief'        => 0.7,
                'penyakit'      => ['PA']
            ],
            [
                'nama_gejala'   => 'Sendi terasa bengkak dan kaku',
                'belief'        => 0.8,
                'penyakit'      => ['PA']
            ],
            [
                'nama_gejala'   => 'Timbul pada badan dan kaki',
                'belief'        => 0.7,
                'penyakit'      => ['PG']
            ],
            [
                'nama_gejala'   => 'Kulit berwarna sangat merah',
                'belief'        => 0.7,
                'penyakit'      => ['PI', 'PE']
            ],
            [
                'nama_gejala'   => 'Lesi tampak licin dan bersinar',
                'belief'        => 0.6,
                'penyakit'      => ['PI']
            ],
            [
                'nama_gejala'   => 'Timbul pada lipatan-lipatan kulit',
                'belief'        => 0.7,
                'penyakit'      => ['PI']
            ],
            [
                'nama_gejala'   => 'Kedinginan',
                'belief'        => 0.7,
                'penyakit'      => ['PE']
            ]
    	];

    	$I->amOnPage('/app/input-gejala');

    	foreach ($data as $row)
    	{
    		$I->fillField('nama_gejala', $row['nama_gejala']);
	        $I->fillField('belief', $row['belief']);

	        foreach ($row['penyakit'] as $penyakit)
	        {
	        	$I->checkOption($penyakit);
	        }

	        $I->click('submit');
	        $I->see('Gejala baru berhasil ditambahkan');
    	}
    }
}
