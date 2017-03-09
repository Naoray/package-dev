<?php

namespace Naoray\Test\Test;

use Naoray\Test\facades\Test;

class FacadeTest extends TestCase
{
    /** @test */
    function it_returns_true_if_facade_returns_right_string()
    {
        $this->assertEquals('You used the TestFacade to call this method!', Test::saySomething());
    }
}