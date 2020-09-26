<?php

use Illuminate\Database\Seeder;

use App\Models\Kabupaten;
use App\Models\Kecamatan;

class DataWilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabupaten = new Kabupaten;
        $kabupaten->nama = 'Paser';
        $kabupaten->save();

        $kecamatan = new Kecamatan;
        $kecamatan->nama = 'Batu Sopang';
        $kecamatan->kabupaten_id = $kabupaten->id;
        $kecamatan->save();

        $kecamatan1 = new Kecamatan;
        $kecamatan1->nama = 'Muara Samu';
        $kecamatan1->kabupaten_id = $kabupaten->id;
        $kecamatan1->save();

        $kecamatan2 = new Kecamatan;
        $kecamatan2->nama = 'Batu Engau';
        $kecamatan2->kabupaten_id = $kabupaten->id;
        $kecamatan2->save();

        $kecamatan3 = new Kecamatan;
        $kecamatan3->nama = 'Tanjung Harapan';
        $kecamatan3->kabupaten_id = $kabupaten->id;
        $kecamatan3->save();

        $kecamatan4 = new Kecamatan;
        $kecamatan4->nama = 'Pasir Belengkong';
        $kecamatan4->kabupaten_id = $kabupaten->id;
        $kecamatan4->save();

        $kecamatan5 = new Kecamatan;
        $kecamatan5->nama = 'Tanah Grogot';
        $kecamatan5->kabupaten_id = $kabupaten->id;
        $kecamatan5->save();

        $kecamatan6 = new Kecamatan;
        $kecamatan6->nama = 'Kuara';
        $kecamatan6->kabupaten_id = $kabupaten->id;
        $kecamatan6->save();

        $kecamatan7 = new Kecamatan;
        $kecamatan7->nama = 'Long Ikis';
        $kecamatan7->kabupaten_id = $kabupaten->id;
        $kecamatan7->save();

        $kecamatan8 = new Kecamatan;
        $kecamatan8->nama = 'Muara Komam';
        $kecamatan8->kabupaten_id = $kabupaten->id;
        $kecamatan8->save();

        $kecamatan9 = new Kecamatan;
        $kecamatan9->nama = 'Long Ikis';
        $kecamatan9->kabupaten_id = $kabupaten->id;
        $kecamatan9->save();
    }
}
