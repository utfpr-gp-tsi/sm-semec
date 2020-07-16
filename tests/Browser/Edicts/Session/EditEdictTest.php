<?php

namespace Tests\Browser;

use App\Edict;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditEdictTest extends DuskTestCase
{
   /** @var \App\Edict */
    protected $edict;
 
    public function setUp(): void
    {
        parent::setUp();
        $this->edict = factory(Edict::class)->create([
          'title' => 'Edital 2016',
          'started_at' => '24/10/2020 20:20',
          'ended_at' => '26/10/2020 20:20',
        ]);
    }
   
    /**
     * A Dusk test example.
     *
     */
    public function testSucessEditEdict()
    {
        $user = factory(User::class)->create();
       
        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin/edicts')
                ->clickLink('Edital 2016')
                ->clickLink('Editar')
                ->keys('textarea', 'Descrição do edital')
                ->press('Atualizar Edital');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Edital atualizado com sucesso');
            });
        });
    }

    public function testFailuteEditEdict()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin/edicts')
                ->clickLink('Edital 2016')
                ->clickLink('Editar')
                ->type('ended_at', '26/9/2020 20:20')
                ->press('Atualizar Edital');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });
        });
    }
}
