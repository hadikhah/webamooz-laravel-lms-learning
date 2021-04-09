<?php

namespace Tests\Feature;

use Hadikhah\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use  withFaker, RefreshDatabase;

    public function userObject()
    {
        return [
            'name' => $this->faker()->name,
            'email' => $this->faker()->safeEmail,
            'mobile' => '09' . $this->faker()->numberBetween('100000000', '999999999'),
            'password' => 'Name1#123',
            'password_confirmation' => 'Name1#123'
        ];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_login_page_loads()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    public function test_if_registered_user_can_login_with_email()
    {
        $user = $this->userObject();
        $this->Post(Route('register'), $user);
        $this->assertCount(1, User::all());
        $this->assertAuthenticated();
        Auth()->user()->markEmailAsVerified();
        Auth()->logout();
        $response = $this->post(route('login'), [
            'username' => $user['email'],
            'password' => $user['password']
        ]);
        $response->assertRedirect(route('home'));
        $this->assertAuthenticated();
        $this->get(route('home'))->assertOk();
    }

    public function test_if_registered_user_can_login_with_mobile()
    {
        $user = $this->userObject();
        $this->password = $user['password'];
        $user['password'] = bcrypt($user['password']);
        User::create($user);
        $response = $this->post(route('login'), [
            'username' => $user['mobile'],
            'password' => $this->password
        ]);
        $response->assertRedirect(
            route('home')
        );
        $this->assertAuthenticated();
        Auth()->user()->markEmailAsVerified();
        $this->get(route('home'))
            ->assertOk();
    }
}
