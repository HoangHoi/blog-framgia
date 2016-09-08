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
            ['content' => 'Laravel'],
            ['content' => 'Ruby'],
            ['content' => 'Rails'],
            ['content' => 'HTML'],
            ['content' => 'Javascript'],
            ['content' => 'CSS'],
            ['content' => 'SASS'],
            ['content' => 'XML'],
            ['content' => 'Angular'],
            ['content' => 'Jquery'],
            ['content' => 'Node.js'],
            ['content' => 'MySQL'],
            ['content' => 'PHPUnit'],
            ['content' => 'Git'],
            ['content' => 'Bootstrap'],
            ['content' => 'ASP.NET'],
            ['content' => 'AJAX'],
        ]);

        factory(App\User::class, 50)->create()
                ->each(function ($user) {
                    for($i = 0; $i<10; $i++){
                    $user->entries()->save(factory(App\Entry::class)->make());
                    }
                });
    }

}
