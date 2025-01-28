<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Csapattag;

class CsapattagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('sample_data\csapattagok.txt');
        $file = fopen($path,"r");
        while(! feof($file)){
            $row = fgets($file);
            $data = explode(";",$row);
            $csapattag = new Csapattag;
            $csapattag->cs_id = trim($data[0]);
            $csapattag->nev = trim($data[1]);
            $csapattag->szuletesi_ido = trim($data[2]);
            $csapattag->poszt = trim($data[3]);
            $csapattag->save();
        }
        fclose($file);
    }
}
