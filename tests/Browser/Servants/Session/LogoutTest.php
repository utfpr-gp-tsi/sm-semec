<?php

namespace Tests\Browser\Servants\Session;

use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use App\Servant;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test 
     *
     * @return void
     */
    public function test_success_logout()
    {
        $servant = factory(Servant::class)->create();
        $this->browse(function ($browser) use ($servant){
            $browser->loginAs($servant, 'servant')->visit('/servant');
            $browser->click('div.header a.nav-link')
                    ->clickLink('Sair')
                    ->assertPathIs('/servant/login');
        });
    }
}