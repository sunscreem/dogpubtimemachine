<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
