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

        factory(App\User::class, 50)->create()
                ->each(function ($user) {
                    $user->entries()->save(factory(App\Entry::class)->make());
                });
    }

}
