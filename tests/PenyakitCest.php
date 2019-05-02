<?php 

class PenyakitCest
{
    public function inputPenyakitTest(AcceptanceTester $I)
    {
    	$data = [
    		['Psoriasis Vulgaris', 'PV'],
    		['Psoriasis Inverse', 'PI'],
    		['Psoriasis Arthritis', 'PA'],
    		['Psoriasis Eritoderma', 'PE'],
    		['Psoriasis Guttate', 'PG'],
    		['Psoriasis Pultolosa', 'PP']
    	];

    	$I->amOnPage('/app/input-penyakit');

    	foreach ($data as $row)
    	{
    		$I->fillField('nama_penyakit', $row[0]);
	        $I->fillField('kode', $row[1]);
	        $I->click('submit');
	        $I->see('Penyakit baru berhasil ditambahkan');
    	}
    }
}
