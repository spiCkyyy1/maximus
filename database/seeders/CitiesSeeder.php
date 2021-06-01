<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cities::create([
            'value' => 'abha',
            'text' => 'Abha'
        ]);

        Cities::create([
            'value' => 'al-ahsaa',
            'text' => 'Al Ahsaa'
        ]);

        Cities::create([
            'value' => 'al-baha',
            'text' => 'Al Baha'
        ]);
        Cities::create([
            'value' => 'al-hufuf',
            'text' => 'Al Hufuf'
        ]);

        Cities::create([
            'value' => 'al-jubail',
            'text' => 'Al Jubail'
        ]);

        Cities::create([
            'value' => 'al-kharj',
            'text' => 'Al Kharj'
        ]);

        Cities::create([
            'value' => 'al-khobar',
            'text' => 'Al Khobar'
        ]);
        Cities::create([
            'value' => 'al-majmaah',
            'text' => "Al Majma'ah"
        ]);

        Cities::create([
            'value' => 'al-mubarraz',
            'text' => 'Al Mubarraz'
        ]);
        Cities::create([
            'value' => 'al-qatif',
            'text' => 'Al Qatif'
        ]);
        Cities::create([
            'value' => 'al-qurayyat',
            'text' => 'Al Qurayyat'
        ]);
        Cities::create([
            'value' => 'al-uLA',
            'text' => 'Al Ula'
        ]);
        Cities::create([
            'value' => 'ar-rass',
            'text' => 'AR Rass'
        ]);

        Cities::create([
            'value' => 'arar',
            'text' => 'Arar'
        ]);

        Cities::create([
            'value' => 'biljurashi',
            'text' => 'Biljurashi'
        ]);

        Cities::create([
            'value' => 'bishah',
            'text' => 'Bishah'
        ]);

        Cities::create([
            'value' => 'buraidah',
            'text' => 'Buraidah'
        ]);

        Cities::create([
            'value' => 'dammam',
            'text' => 'Dammam'
        ]);
    }
}
