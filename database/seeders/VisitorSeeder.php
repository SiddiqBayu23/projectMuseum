<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $startDate = Carbon::now()->subYear(); // 1 tahun terakhir

        $data = [];

        // Loop setiap hari selama 1 tahun terakhir
        for ($date = $startDate; $date->lte(Carbon::now()); $date->addDay()) {
            // Jumlah pengunjung per hari random 5 - 20 orang
            $visitorCount = rand(5, 20);

            for ($i = 0; $i < $visitorCount; $i++) {
                $data[] = [
                    'ip_address' => $faker->ipv4,
                    'visit_date' => $date->format('Y-m-d'),
                    'created_at' => $date->copy()->setTime(rand(0, 23), rand(0, 59)),
                    'updated_at' => $date->copy()->setTime(rand(0, 23), rand(0, 59)),
                ];
            }
        }

        // Insert ke database
        DB::table('visitors')->insert($data);
    }
}
