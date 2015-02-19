<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 19/02/15
 * Time: 12:26
 */

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {
        \DB::table('users')->insert(array(
            'name'      => 'Yoel Monzon',
            'email'     => 'yoelfme@hotmail.com',
            'password'  => \Hash::make('secret')
        ));
    }
}