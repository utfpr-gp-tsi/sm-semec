<?php

namespace Tests\Browser;

use App\Edict;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class IndexTest extends DuskTestCase
{
      /** @var \App\Edict */
      protected $edict;

    public function setUp(): void
    {
          parent::setUp();
          $this->edict = factory(Edict::class)->create([
            'title' => 'Edital 2016',
          ]);
    }
    /**
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
    /**
     *
     * @return void
     */

    public function testLinkEdit()
    {
        $user = factory(User::class)->create();
        
        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin/edicts')
                ->click('#icon_edit')
                ->assertPathIs('/admin/edicts/1/edit');
        });
    }
    /**
     *
     * @return void
     */

    public function testLinkShow()
    {
        $user = factory(User::class)->create();
        
        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)->visit('/admin/edicts')
                ->clickLink('Edital 2016')
                ->assertPathIs('/admin/edicts/1');
        });
    }
    /**
     *
     * @return void
     */
    
    public function testLinkDelete()
    {
        $user = factory(User::class)->create();
        
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
