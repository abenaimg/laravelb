<?php

namespace App\Services\Html;

use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->registerHtmlBuilder();
		$this->registerFormBuilder();
		$this->registerPanelBuilder();
	}

	protected function registerHtmlBuilder()
	{
        $this->app->singleton('html', function ($app) {
            return new HtmlBuilder($app['url'], $app['view']);
        });
	}

	protected function registerFormBuilder()
	{
        $this->app->singleton('form', function ($app) {
            $form = new FormBuilder($app['html'], $app['url'], $app['view'], $app['session.store']->token());

            return $form->setSessionStore($app['session.store']);
        });
	}

	protected function registerPanelBuilder()
	{
		$this->app->singleton('panel', function()
		{
			return new PanelBuilder;
		});
	}

}
