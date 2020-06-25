<?php

namespace Tests\Browser\Servants\Session;

use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use App\Servant;

class LoginTest extends DuskTestCase
{
     /** @var \App\Servant */
    protected $servant;

    public function setUp(): void
    {
        parent::setUp();
        $this->servant = factory(Servant::class, 'servant')->create();
    }
    
    /**
     * A Dusk test login fail.
     *
     * @return void
     */
    public function test_failure_login()
    {
        $this->browse(function ($browser) {
            $browser->visit('/servant/login')
                    ->type ('CPF', $this->servant->CPF)
                    ->type('password', 'wrong-password')
                    ->press('Entrar')
                    ->assertPathIs('/servant/login');
  
            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Usuário ou senha incorretas.');
            });
        });
    }

    /**
     * A Dusk test login success.
     *
     * @return void
     */
     public function test_login_page_success()
    {
        $this->browse(function ($browser) {
            $browser->visit('/servant/login')
                    ->type ('CPF', $this->servant->CPF)
                    ->type('password', 'password')
                    ->press('Entrar')
                    ->assertPathIs('/servant');
  
            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Login efetuado com sucesso.');
            });

            $browser->with('div.header', function ($header) {
                $header->assertSee($this->servant->name);
                $header->assertSee($this->servant->email);
            });
        });
    }
}