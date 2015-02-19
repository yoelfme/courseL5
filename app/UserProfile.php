<?php namespace CourseL5;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserProfile extends Model {

    protected $table ='user_profiles';

	public function getAgeAttribute()
    {
        return Carbon::parse($this->birthdate)->age;
    }

}
