<?php

namespace Naoray\Test\Test;

class RouteTest extends TestCase
{
	/** @test */
    public function it_returns_true_if_the_test_route_is_visited()
    {
        $response = $this->get('/test');

        $response->assertStatus(200);
    }
}