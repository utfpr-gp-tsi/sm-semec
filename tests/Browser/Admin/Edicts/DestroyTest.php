<?php

namespace Tests\Browser\Admin\Edicts;

use App\Edict;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DestroyTest extends DuskTestCase
{
    /** @var \App\Edict */
    protected $edict;
    /** @var \App\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->edict = factory(Edict::class)->create();
        $this->user = factory(User::class)->create();
    }

    public function testDestroy(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit('/admin/edicts');

            $browser->with("table.table tbody", function ($row) {
                $row->assertSee($this->edict->title);
                $row->click('button')
                    ->acceptDialog()
                    ->assertDontSee($this->edict->title);
            });
        });
    }
}
