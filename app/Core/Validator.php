<?php namespace CourseL5\Core;
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 25/03/15
 * Time: 21:34
 */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator as LaravelValidator;

class Validator extends LaravelValidator {

    public function validateCurrentPassword($attribute, $value, $parameters)
    {
        return Hash::check($value,Auth::user()->password);
    }
}