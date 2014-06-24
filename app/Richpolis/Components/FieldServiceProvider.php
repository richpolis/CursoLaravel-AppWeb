<?php namespace Richpolis\Components;

use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    /*
     * Register Service provider
     */
    public function register() 
    {
        $this->app['field'] = $this->app->share(function($app){
            $fieldBuilder = new FieldBuilder();
            return $fieldBuilder;
        });
    }

}
