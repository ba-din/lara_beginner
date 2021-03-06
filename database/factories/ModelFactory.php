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
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Widget::class, function ($faker) {

    $name = $faker->unique()->word . ' ' . $faker->unique()->word;
    $slug = str_slug($name, "-");
    $user_id = rand(1,4);

    return [
        'name' => $name,
        'slug' => $slug,
        'user_id' => $user_id,


    ];
});
// Begin Category Factory

$factory->define(App\Category::class, function (Faker\Generator $faker) {

        $uniqueWord = $faker->unique()->word;
        $slug = str_slug($uniqueWord, "-");

    return [

        'name' => $uniqueWord,
        'slug' => $slug,

    ];

});

// End Category Factory
// Begin Subcategory Factory

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {

       $uniqueWord = $faker->unique()->word;
       $slug = str_slug($uniqueWord, "-");

    return [

        'name' => $uniqueWord,
        'category_id' => $faker->numberBetween($min = 1, $max = 4),
        'slug' => $slug,

    ];

});

// End Subcategory Factory