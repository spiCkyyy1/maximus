<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create([
            'value' => 'al-jouf',
            'text' => 'Al Jouf'
        ]);

        Region::create([
            'value' => 'al-baha',
            'text' => 'Al Baha'
        ]);

        Region::create([
            'value' => 'asir',
            'text' => 'Asir'
        ]);

        Region::create([
            'value' => 'eastern-province',
            'text' => 'Eastern Province'
        ]);

        Region::create([
            'value' => "hail",
            'text' => "Ha'il"
        ]);

        Region::create([
            'value' => 'jizan',
            'text' => 'Jizan'
        ]);

        Region::create([
            'value' => 'madinah',
            'text' => 'Madinah'
        ]);

        Region::create([
            'value' => 'makkah',
            'text' => 'Makkah'
        ]);

        Region::create([
            'value' => 'najran',
            'text' => 'Najran'
        ]);

        Region::create([
            'value' => 'northern-borders',
            'text' => 'Nothern Borders'
        ]);

        Region::create([
            'value' => 'qassim',
            'text' => 'Qassim'
        ]);

        Region::create([
            'value' => 'riyadh',
            'text' => 'Riyadh'
        ]);

        Region::create([
            'value' => 'tabuk',
            'text' => 'Tabuk'
        ]);

        Region::create([
            'value' => 'hijaz',
            'text' => 'Hijaz'
        ]);
    }
}
