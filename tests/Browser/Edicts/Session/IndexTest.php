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
    public function testLinkNewEdict()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin/edicts');

            $browser->clickLink('Novo Edital')
                ->assertPathIs('/admin/edicts/new');
        });
    }

    public function testLinkEdit()
    {
        $user = factory(User::class)->create();
        $edict = factory(Edict::class)->create([
            'title' => 'Edital 2016',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin/edicts')
                ->click('#icon_edit')
                ->assertPathIs('/admin/edicts/1/edit');
        });
    }

    public function testLinkShow()
    {
        $user = factory(User::class)->create();
        $edict = factory(Edict::class)->create([
            'title' => 'Edital 2016',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin/edicts')
                ->clickLink('Edital 2016')
                ->assertPathIs('/admin/edicts/1');

        });
    }
    public function testLinkDelete()
    {
        $user = factory(User::class)->create();
        $edict = factory(Edict::class)->create([
            'title' => 'Edital 2016',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin/edicts')
                ->press('button.btn-link')
                ->acceptDialog();
            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Edital removido com sucesso.');

            });
        });
    }
}
