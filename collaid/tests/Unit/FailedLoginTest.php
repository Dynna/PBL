<?php


use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\TestCase;

class FailedLoginTest extends TestCase
{
    use DatabaseTransactions;

    public function test_failed_login_attempts_are_recorded()
    {
        $this->visit('/login')
            ->type('john@doe.com', 'email')
            ->type('incorrect password', 'password')
            ->press('Log In');

        $this->seeInDatabase('failed_login_attempts', [
            'user_id' => null,
            'email_address' => 'john@doe.com'
        ]);
    }

    public function test_existing_user_is_recorded()
    {
        $user = factory(User::class)->create();

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('incorrect password', 'password')
            ->press('Log In');

        $this->seeInDatabase('failed_login_attempts', [
            'user_id' => $user->id,
            'email_address' => $user->email,
        ]);
    }

}
