<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_homepage_loads_correctly()
    {
        $response = $this->get('/')
          ->assertStatus(200)
          ->assertSee('Craft Beer For The People');
    }
}
