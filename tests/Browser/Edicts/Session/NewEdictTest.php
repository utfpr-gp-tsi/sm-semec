<?php

namespace Tests\Browser;

use App\Edict;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class IndexTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testNewEdict()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin/edicts/new')
                                    ->type('title', 'Oi')
                                    ->keys('textarea', 'Descrição do edital')
                                    ->type('started_at', '24/10/2020 20:20')
                                    ->type('ended_at', '26/10/2020 20:20')
                                    ->press('Criar Edital');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Edital cadastrado com sucesso');
                                    
        });
    });

    }

    public function testFailureNewEdict()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin/edicts/new')
                                    ->type('title', 'Oi')
                                    ->keys('textarea', 'Descrição do edital')
                                    ->type('started_at', '24/10/2020 20:20')
                                    ->press('Criar Edital');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
                                    
        });
    });

    }
}