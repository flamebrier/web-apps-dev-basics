<?php

use Illuminate\Database\Seeder;

class VisitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->insert([
            'client' => '1',
            'date' => '2020-04-13',
            'time' => '09:20',
            'service' => 'Педикюр'
        ]);
        DB::table('visits')->insert([
            'client' => '2',
            'date' => '2020-04-17',
            'time' => '14:20',
            'service' => 'Маникюр'
        ]);
        DB::table('visits')->insert([
            'client' => '3',
            'date' => '2020-04-20',
            'time' => '11:30',
            'service' => 'Наращивание ногтей'
        ]);
        DB::table('visits')->insert([
            'client' => '2',
            'date' => '2020-04-24',
            'time' => '14:20',
            'service' => 'Окрашивание'
        ]);
    }
}
