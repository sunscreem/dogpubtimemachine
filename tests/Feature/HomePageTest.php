<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    /** @test */
    public function the_homepage_loads_correctly()
    {
        $this->get('/')
             ->assertSee('Dog Pub Time Machine');
    }
}
