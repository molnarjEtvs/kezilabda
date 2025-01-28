<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Csapat;

class CsapatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('sample_data\csapatok.txt');
        $file = fopen($path,"r");
        while(! feof($file)){
            $row = fgets($file);
            $data = explode(";",$row);
            $csapat1 = new Csapat;
            $csapat1->csapat_nev = trim($data[0]);
            $csapat1->szekhely = trim($data[1]);
            $csapat1->alapitasi_ev = trim($data[2]);
            $csapat1->vezeto_edzo = trim($data[3]);
            $csapat1->save();
        }
        fclose($file);
    }
}
