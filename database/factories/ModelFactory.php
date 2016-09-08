<?php

/*
  |--------------------------------------------------------------------------
  | Model Factories
  |--------------------------------------------------------------------------
  |
  | Here you may define all of your model factories. Model factories give
  | you a convenient way to create models for testing and seeding your
  | database. Just tell the factory how a default model should look.
  |
 */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('12344321'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Entry::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->paragraph,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'category_id' => function () {
            $category = App\Category::inRandomOrder()->first();
            return $category->id;
        },
        'published_at' => function () {
            $r = rand(0, 1);
            if ($r) {
                return Carbon\Carbon::now();
            } else {
                return 0;
            }
        }
    ];
});
