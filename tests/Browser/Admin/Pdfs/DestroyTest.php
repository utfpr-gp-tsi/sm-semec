<?php

namespace Tests\Browser\Admin\Pdfs;

use App\Edict;
use App\User;
use App\Pdf;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DestroyTest extends DuskTestCase
{
    /** @var \App\Edict */
    protected $edict;
    /** @var \App\User */
    protected $user;
    /** @var \App\Pdf */
    protected $pdf;

    public function setUp(): void
    {
        parent::setUp();
        $this->edict = factory(Edict::class)->create();
        $this->user = factory(User::class)->create();
        $this->pdf = factory(Pdf::class)->create();
    }

    public function testDestroy(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.index.pdf', $this->edict->id));
            $browser->loginAs($this->user)->visit('/admin/edicts/2/pdfs');

            $browser->with("table.table tbody", function ($row) {
                $row->assertSee($this->pdf->name);
                $row->click('button')
                    ->acceptDialog()
                    ->assertDontSee($this->pdf->name);
            });
        });
    }
}
