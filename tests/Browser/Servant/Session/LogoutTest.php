<?php

namespace Tests\Browser\Servant\Session;

use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use App\Servant;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LogoutTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test 
     *
     * @return void
     */
    public function test_success_logout()
    {
        $servant = factory(Servant::class)->create();

        //dd(Auth::guard('servant')->login($servant)); exit();
           Auth::guard('servant')->login($servant);

        $this->browse(function ($browser) use ($servant){
            $browser->loginAs($servant)->visit('/servant');

            $browser->click('div.header a.nav-link')
                    ->clickLink('Sair')
                    ->assertPathIs('/servant/login');
        });
    }
}