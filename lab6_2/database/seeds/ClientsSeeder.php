<?php

use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => 'Костенкова Арина',
            'telephone' => '+79914453421',
        ]);
        DB::table('clients')->insert([
            'name' => 'Крылова Анна',
            'telephone' => '+77813204211',
        ]);
        DB::table('clients')->insert([
        'name' => 'Грушко Евгения',
            'telephone' => '+74916201000',
        ]);
    }
}
