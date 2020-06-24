<?php

namespace Tests\Browser\Servant\Session;

use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use App\User;
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
        $user = factory(User::class)->create();

        //dd(Auth::guard('servant')->login($servant)); exit();
           Auth::guard('web')->login($user);

        $this->browse(function ($browser) use ($user){
            $browser->loginAs($user)->visit('/admin');

            $browser->click('div.header a.nav-link')
                    ->clickLink('Sair')
                    ->assertPathIs('/servant/login');
        });
    }
}