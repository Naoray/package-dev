<?php

namespace Naoray\Test\Facades;

use Illuminate\Support\Facades\Facade;

class Test extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'naoray-test';
    }
}