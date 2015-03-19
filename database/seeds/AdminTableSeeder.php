<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 19/02/15
 * Time: 12:26
 */

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {

    public function run()
    {
        \DB::table('users')->insertGetId(array(
            'first_name' => 'Yoel',
            'last_name' => 'Monzon',
            'email'     => 'yoelfme@hotmail.com',
            'password'  => \Hash::make('secret'),
            'type'      => 'admin',
            'full_name' => 'Yoel Monzon'
        ));

        \DB::table('user_profiles')->insert(array(
            'user_id' => 1,
            'birthdate' => '1995-07-23'
        ));
    }
}