<?php

namespace Tests\Browser\Admin\UnitsCategory;

use App\UnitCategory;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DestroyTest extends DuskTestCase
{
    /** @var \App\UnitCategory */
    protected $category;
    /** @var \App\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = factory(UnitCategory::class)->create();
        $this->user = factory(User::class)->create();
    }

    public function testDestroy(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit('/admin/categories');

            $browser->with("table.table tbody", function ($row) {
                $row->assertSee($this->category->name);
                $row->click('button')
                    ->acceptDialog()
                    ->assertDontSee($this->category->name);
            });
        });
    }
}
