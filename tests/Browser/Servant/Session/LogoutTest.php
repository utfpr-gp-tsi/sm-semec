<?php

namespace Tests\Browser\Servant\Session;

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

        dd($servant); exit();

        $this->browse(function ($browser) use ($servant){
            $browser->loginAs($servant)->visit('/servant');

            $browser->click('div.header a.nav-link')
                    ->clickLink('Sair')
                    ->assertPathIs('/servant/login');
        });
    }
}