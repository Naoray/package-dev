<?php

namespace Naoray\Test\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class TestController extends BaseController
{
    public function index()
    {
        return view('test::test');
    }
}