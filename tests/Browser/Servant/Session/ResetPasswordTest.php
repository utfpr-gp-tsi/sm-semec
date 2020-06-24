<?php

namespace Tests\Browser\Servant\Session;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Servant;

class ResetTest extends DuskTestCase
{
    protected $servant;

    public function setUp(): void
    {
        parent::setUp();
        $this->servant = factory(Servant::class)->create();
    }

    /**
     * A Dusk test home page.
     *
     * @return void
     */
    public function test_home_page()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                    ->assertSee('Acessar Área do Servidor');
        });
    }

    /**
     * A Dusk test login page success.
     *
     * @return void
     */
    public function test_password_reset_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/servant/password/reset')
                ->type('email', $this->servant->email)
                ->click('.btn-block')
                ->assertPathIs('/servant/password/reset')
                ->assertSee('Enviamos seu link de redefinição de senha por e-mail!');
        });
    }

    /**
     * A Dusk test back login page.
     *
     * @return void
     */
    public function test_back_login_page()
    {

        $this->browse(function ($browser){
            $browser->visit('/servant/password/reset')
                    ->assertSee('Modificar Senha')
                    ->clickLink('me envie de volta')
                    ->assertSee('Faça login na sua conta');
        });
    }

}
