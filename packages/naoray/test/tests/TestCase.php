<?php

namespace Naoray\Test\Test;

use Illuminated\Testing\TestingTools;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    use TestingTools;
    
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Naoray\Test\TestServiceProvider::class,
        ];
    }

    /**
     * @param  [type] $app [description]
     * 
     * @return [type]      [description]
     */
    protected function getPackageAliases($app)
	{
	    return [
	        'Test' => 'Naoray\Test\facades\Test',
	    ];
	}
}