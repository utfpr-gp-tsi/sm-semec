<?php

namespace Tests\Browser\Home\Edicts;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Pdf;

class IndexTest extends DuskTestCase
{
    public function testIndexList(): void
    {
        $pdfs = factory(Pdf::class)->create();
        $this->browse(function ($browser) use ($pdfs) {
                $browser->visit('/edicts')
                ->press('2020')
                ->press($pdfs->edict->title)
                ->assertSeeLink($pdfs->name);
        });
    }
}
