<?php

namespace Naoray\Test\Test;

class CommandTest extends TestCase
{
    /** @test */
    function it_returns_true_if_command_logs_expected_string()
    {
        $this->artisan('test:test');

        $this->seeArtisanOutput('Test command executed!');
    }
}