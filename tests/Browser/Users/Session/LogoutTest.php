<?php

namespace Tests\Browser\Users\Session;

use App\User;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testSucessLogout()
    {
        $user = factory(User::class)->create();
        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin');

            $browser->click('div.header a.nav-link')
                    ->clickLink('Sair')
                    ->assertPathIs('/admin/login');
        });
    }
}
