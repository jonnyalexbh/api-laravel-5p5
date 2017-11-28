<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
  /** @test */
  function it_welcomes_users_with_nickname()
  {
    $this->get('greeting/jonnyalexbh/nano')
    ->assertStatus(200)
    ->assertSee('Welcome Jonnyalexbh, your nickname is nano');
  }

  /** @test */
  function it_welcomes_users_without_nickname()
  {
    $this->get('greeting/jonnyalexbh')
    ->assertStatus(200)
    ->assertSee('Welcome Jonnyalexbh');
  }
}
