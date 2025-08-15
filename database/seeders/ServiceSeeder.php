<?php

namespace Database\Seeders;

use App\Models\ServiceSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceSection::insert([
            [
                'title' => 'Prosedur Kunjungan',
                'day' => 'Senin - Jumat',
                'time' => '08:00 - 16:00',
                'procedure' => '<ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Museum Maritim Indonesia hanya menerima kunjungan rombongan minimal 20 peserta.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Reservasi kunjungan dapat bersurat ke EGM Regional 2 Tanjung Priok.</li></ol>',
                'thumbnail' => null,
                'url' => 'https://maritimemuseum.id/'
            ],
        ]);
    }
}
