<?php

namespace App\Http\Controllers;

use Faker\Generator;
use Faker\Factory;

class Test extends Controller
{
    public function test()
    {
//        $faker = Factory::create('zh_CN');

        $faker = app(Generator::class);
        $name = $faker->name;
        echo $name;
    }

}
