<?php

namespace Tests\Browser\Admin\Pdfs;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Edict;
use App\User;
use App\Pdf;

class IndexTest extends DuskTestCase
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

    public function testIndexList(): void
    {
        $pdfs = factory(Pdf::class, 3)->create();

        $this->browse(function ($browser) use ($pdfs) {
            $browser->loginAs($this->user)->visit(route('admin.new.pdf', $this->edict->id))
                    ->driver->executeScript('window.scrollTo(0, 400);');

            $browser->with("table.table tbody", function ($row) use ($pdfs) {
                $pos = 0;
                foreach ($pdfs as $pdf) {
                    $pos += 1;
                    $baseSelector = "tr:nth-child({$pos}) ";

                    $showSelector = $baseSelector . "a[href='" . route('admin.show.pdf', $pdf->id) . "']";
                    $row->assertSeeIn($showSelector, $pdf->name);
                    $row->assertSeeIn($baseSelector, $pdf->edict->title);
                    $row->assertSeeIn($baseSelector, $pdf->created_at->toShortDateTime());
                    $row->assertSeeIn($baseSelector, $pdf->updated_at->toShortDateTime());
                }
            });
        });
    }

    public function testAssertLinksPresent(): void
    {
        factory(Pdf::class, 22)->create();

        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.pdf', $this->edict->id));

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumSelector = ".breadcrumb li:nth-child(2)";
            $thirdBreadcrumSelector = ".breadcrumb li:nth-child(3)";

            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumSelector, 'Editais');
            $browser->assertSeeIn($thirdBreadcrumSelector, 'Novo Pdf');

            $browser->with('.pagination', function ($pagination) {
                $pagination->assertSee('1');
                $pagination->assertSeeLink('2');
            });
        });
    }
}
