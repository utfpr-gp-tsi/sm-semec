<?php

namespace Tests\Browser\Admin\Units;

use App\Unit;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DestroyTest extends DuskTestCase
{
    /** @var \App\Unit */
    protected $unit;
    /** @var \App\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->unit = factory(Unit::class)->create();
        $this->user = factory(User::class)->create();
    }

    public function testDestroy(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit('/admin/units');

            $browser->with("table.table tbody", function ($row) {
                $row->assertSee($this->unit->name);
                $row->click('button')
                    ->acceptDialog()
                    ->assertDontSee($this->unit->name);
            });
        });
    }
}
