<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\YouthOrg;
use Faker\Generator as Faker;

$factory->define(YouthOrg::class, function (Faker $faker) {
    return [
        'name' => $faker->name, 'uuid' => $faker->uuid, 'country' => $faker->country,
        'location' => $faker->realText(20),
        'legal_status' => $faker->realText(20), 'thematic_focus' => $faker->realText(20), 'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail, 'website' => $faker->domainName
    ];
});
