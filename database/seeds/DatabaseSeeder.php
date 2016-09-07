<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['content' => 'PHP'],
            ['content' => 'Ruby'],
            ['content' => 'HTML'],
        ]);
    }

}
