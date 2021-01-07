<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\YouthInfo;
use Faker\Generator as Faker;

$factory->define(YouthInfo::class, function (Faker $faker) {
    // 'uuid','name','dob','age','gender','nationality','email','phone',
    // 'education','occupation','thematic_area','data_source','year'

    $arrayValues = ['Male', 'Female'];
    return [
        'name' => $faker->name, 'uuid' => $faker->uuid, 'nationality' => $faker->country,
        'dob' => $faker->date,
        'gender' => $arrayValues[rand(0, 1)],
        'education' => $faker->realText(20), 'thematic_area' => $faker->realText(20),
        'phone' => $faker->phoneNumber,
        'year' => $faker->year,
        'email' => $faker->unique()->safeEmail, 'occupation' => $faker->domainName
    ];
});
