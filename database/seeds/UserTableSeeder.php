<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 19/02/15
 * Time: 14:51
 */

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        for($i=0; $i<500; $i++)
        {
            $first_name = $faker->firstName;
            $last_name = $faker->lastName;

            $id = \DB::table('users')->insertGetId(array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $faker->unique()->email,
                'password' => \Hash::make('123456'),
                'type' => 'user',
                'full_name' => "$first_name $last_name"
            ));

            \DB::table('user_profiles')->insert(array(
                'user_id' => $id,
                'bio' => $faker->paragraph(rand(2,5)),
                'website' => 'http://www.' . $faker->domainName,
                'twitter' => 'http://.twitter.com/' . $faker->userName,
                'birthdate' => $faker->dateTimeBetween('-45 years','-15 years')->format('Y-m-d')
            ));
        }
    }

}