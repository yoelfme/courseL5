<?php namespace CourseL5\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidatorServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        Validator::resolver(function($translator, $data, $rules, $messages)
        {
            return new \CourseL5\Core\Validator($translator, $data, $rules, $messages);
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
