<?php namespace Younggeeks\InfobipL4;

use Illuminate\Support\ServiceProvider;

class InfobipL4ServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['Infobip']=$this->app->share(function($app){
			return new InfobipL4($app['config']);
		});
	}

	public function boot()
	{
		$this->package('younggeeks/infobip-l4');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('Infobip');
	}

}
