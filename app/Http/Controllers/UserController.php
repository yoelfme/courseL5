<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 19/02/15
 * Time: 16:00
 */

namespace CourseL5\Http\Controllers;


use Carbon\Carbon;
use CourseL5\User;

class UserController extends Controller {

    public function getOrm()
    {
        $result = User::with('profile')
            ->where('first_name','<>','Yoel')
            ->orderBy('first_name','ASC')
            ->get();

        dd($result->toArray());
    }

    public function getIndex()
    {
        $result = \DB::table('users')
                        ->select(
                            'users.id',
                            'first_name',
                            'last_name',
                            'user_profiles.id as profile_id',
                            'user_profiles.twitter',
                            'user_profiles.birthdate'
                        )
                        ->orderBy('id','ASC')
                        ->join('user_profiles','users.id','=','user_profiles.user_id')
                        ->get();

        foreach($result as $row)
        {
            $row->full_name = $row->first_name . ' ' . $row->last_name;
            $row->age = Carbon::parse($row->birthdate)->age;
        }

        dd($result);
    }

}