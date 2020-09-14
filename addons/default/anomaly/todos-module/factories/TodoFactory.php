<?php

$factory->define(
    Anomaly\TodosModule\Todo\TodoModel::class,
    function (Faker\Generator $faker) {

        $name = $faker->text();
        $slug = str_slug($name, '-');

        return [
            'name' => $name,
            'slug' => $slug,
            'creator' => rand(1, 2),
        ];
    }
);
