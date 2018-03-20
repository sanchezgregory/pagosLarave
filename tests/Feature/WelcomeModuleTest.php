<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeModuleTest extends TestCase
{
    /** @test */

    public function it_loads_welcome_page_with_nickname()
    {
        $this->get('/welcome/gregory/mcgregox')
        ->assertStatus(200)
        ->assertSee("Bienvenido Gregory, tu apodo es: MCGREGOX");
    }

    /** @test */

    public function it_loads_welcome_page_without_nickname()
    {
        $this->get('/welcome/gregory')
            ->assertStatus(200)
            ->assertSee("Bienvenido Gregory");
    }
}
