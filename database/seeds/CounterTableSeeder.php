<?php

use Illuminate\Database\Seeder;

class CounterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_counter')->insert([
            'visit' => 0,
            'downloads' => 0,
        ]);
    }
}
