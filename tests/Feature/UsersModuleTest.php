<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
  /** @test */
  function it_loads_the_users_list_page()
  {
    $this->get('/users')
    ->assertStatus(200)
    ->assertSee('Users');
  }

  /** @test */
  function it_loads_the_users_details_page()
  {
    $this->get('/users/5')
    ->assertStatus(200)
    ->assertSee('Showing user detail: 5');
  }

  /** @test */
  function it_loads_the_new_users_page()
  {
    $this->get('/users/new')
    ->assertStatus(200)
    ->assertSee('create new user');
  }

}
