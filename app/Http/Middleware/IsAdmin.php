<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 30/03/15
 * Time: 14:21
 */

namespace CourseL5\Http\Middleware;


class IsAdmin extends IsType {

    public function getType()
    {
        return "admin";
    }
}