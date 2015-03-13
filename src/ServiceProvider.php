<?php namespace Intentor\LaravelForm;

use View;

/**
 * Form service provider.
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register() {
		//Register Facade class.
		$this->app->bind(
			'intentor.laravel-form',
			'Intentor\LaravelForm\Service'
		);

		//Require the blade template.		
		require base_path(__DIR__ .'/resources/helpers/form.php');

		//Register the views' path.
		View::addLocation(__DIR__ .'/resources/views');
	}
}
