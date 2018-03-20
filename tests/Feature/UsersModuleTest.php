<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test */

    public function it_loads_new_user_page()
    {
        $this->get('/usuario/nuevo')
            ->assertStatus(200)
            ->assertSee('Crear nuevo usuario');
    }

    /** @test */

    public function it_loads_the_users_details_page()
    {
        $this->get('/usuario/10')
            ->assertStatus(200)
            ->assertSee("Usuario:");
    }

    /** @test */

    public function it_loads_all_users()
    {
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Usuarios registrados');
    }

    /** @test */

    public function it_loads_delete_user()
    {
        $this->get('/usuario/delete/3')
            ->assertStatus(200)
            ->assertSee('Borrando al usuario 3');
    }

    /** @test */

    public function it_loads_edit_form_user()
    {
        $this->get('/usuario/edit')
            ->assertStatus(200)
            ->assertSee('Editar usuario');
    }

    /** @test */

    public function it_loads_updated_user_page()
    {
        $this->get('/usuario/3/edit')
            ->assertStatus(200)
            ->assertSee('Usuario 3 editado');
    }
}
