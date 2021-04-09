<?php

namespace Tests\Feature;

use Hadikhah\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function makeUser()
    {
        return $this->Post(Route('register'), [
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'mobile' => '09992223345',
            'password' => 'User1#123',
            'password_confirmation' => 'User1#123'
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_page()
    {
        $response = $this->get(Route('register'));

        $response->assertStatus(200);
    }

    public function test_if_user_can_register()
    {
        $response = $this->makeUser();
        $response->assertRedirect(Route('home'));

        $this->assertCount(1, User::all());
    }

    public function test_user_should_verify_email_after_registration()
    {
        $this->makeUser();
        $response = $this->get(Route('home'));
        $response->assertRedirect(Route('verification.notice'));
    }

    public function test_if_verified_user_can_see_home_page()
    {
        $this->makeUser();
        $this->assertAuthenticated();
        Auth()->user()->markEmailAsVerified();
        $response = $this->get(route('home'));
        $response->assertOk();
    }
}
