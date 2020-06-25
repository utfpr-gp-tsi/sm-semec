<?php

namespace Tests\Browser\Servants\Session;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Servant;
use Illuminate\Support\Facades\DB;
use App\User;

class ResetTest extends DuskTestCase
{
    protected $servant;

    public function setUp(): void
    {
        parent::setUp();
        $this->servant = factory(Servant::class)->create();
    }

    /**
     * A Dusk test link to reset password
     *
     * @return void
     */
    public function test_link_to_reset_password()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/servant/password/reset')
                ->type('email', $this->servant->email)
                ->click('.btn-block')
                ->assertPathIs('/servant/password/reset');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Enviamos seu link de redefinição de senha por e-mail!');
            });
             //dd(DB::table('servants')->select('email_verified_at')->get());
             //dd(DB::table('password_resets')->select('email')->get());exit();
        });
    }

    // /**
    //  * A Dusk test back login page.
    //  *
    //  * @return void
    //  */
    public function test_back_login_page()
    {

        $this->browse(function ($browser){
            $browser->visit('/servant/password/reset')
                    ->assertSee('Modificar Senha')
                    ->clickLink('me envie de volta');

            $browser->with('div.card-title', function ($flash) {
                $flash->assertSee('Faça login na sua conta');
            });
        });
    }

    /**
     * A Dusk test test link to change password
     *
     * @return void
     */
    public function test_link_change_password()
    {
        $request = Request();
        dd($token = $request->input('token'));exit;

        $this->browse(function (Browser $browser) {
            $browser->visit('/servant/password/reset');
            });

         dd(DB::table('password_resets')->select('email')->get());exit();
    }
}
