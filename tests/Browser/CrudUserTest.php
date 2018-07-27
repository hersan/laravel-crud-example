<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CrudUserTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test initial page
     *
     * @test
     * @throws \Throwable
     */
    public function it_show_root_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    /**
     * Show a list of users
     *
     * @test
     * @throws \Throwable
     */
    public function it_show_all_users()
    {
        $this->browse(function(Browser $browser){
            $browser->visit('/users')
                ->assertSee('User List')
            ;
        });
    }

    /**
     * Test user creation
     *
     * @test
     * @throws \Throwable
     */
    public function it_creates_a_new_user()
    {
        $this->browse(function(Browser $browser){

            $browser->visit('/users/create')
                ->assertSee('New User')
                ->type('name', 'John Doe')
                ->type('email', 'john.doe@hotmail.com')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Register')
                ->assertPathIs('/users/create')
                ->waitForText('The user was created')
            ;

            $this->assertDatabaseHas('users',[
                'name' => 'John Doe',
                'email' => 'john.doe@hotmail.com',
            ]);

        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function it_edit_a_user_data()
    {
        $user = factory(User::class)->create();

        $this->browse(function(Browser $browser) use($user) {
            $browser->visit("/users/$user->id/edit")
                ->assertSee('Edit User')
                ->value('#name', $user->name)
                ->value('#email', $user->email)
                ->type('name', 'John Doe')
                ->type('email', 'john.doe@hotmail.com')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Edit')
                ->assertPathIs("/users/$user->id/edit")
                ->waitForText('The user was updated')
            ;
        });

        $this->assertDatabaseHas('users',[
            'name' => 'John Doe',
            'email' => 'john.doe@hotmail.com',
        ]);
    }

    /**
     * Show user info
     *
     * @test
     * @throws \Throwable
     */
    public function it_show_a_user()
    {
        $user = factory(User::class)->create();

        $this->browse(function(Browser $browser) use($user) {
            $browser->visit("/users/$user->id")
                ->assertSee('Show User')
                ->assertSee($user->name)
                ->assertSee($user->email)
            ;
        });
    }

    /**
     * test the deletion of a user
     *
     * @test
     * @throws \Throwable
     */
    public function it_delete_a_user()
    {
        $user = factory(User::class)->create();

        $this->browse(function(Browser $browser) use($user) {
            $browser->visit('/users')
                ->assertSee('User List')
                ->click("#delete-{$user->id}")
                ->assertPathIs("/users")
                ->waitForText('The user was deleted')
            ;
        });

    }
}
