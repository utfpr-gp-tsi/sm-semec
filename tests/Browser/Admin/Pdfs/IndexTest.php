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
        $pdfs = factory(Pdf::class)->create();

        $this->browse(function ($browser) use ($pdfs) {
            $browser->loginAs($this->user)->visit('/admin/edicts/2/pdfs');

            $browser->with("table.table tbody", function ($row) use ($pdfs) {
                $pos = 0;
                    $pos += 1;
                    $baseSelector = "tr:nth-child({$pos}) ";
                    $route = route('admin.show.pdf', ['edict_id' => $pdfs->edict->id, 'id' => $pdfs->id]);

                    $showSelector = $baseSelector . "a[href='" . $route . "']";
                    $row->assertSeeIn($showSelector, $pdfs->name);
                    $row->assertSeeIn($baseSelector, $pdfs->edict->title);
                    $row->assertSeeIn($baseSelector, $pdfs->created_at->toShortDateTime());
                    $row->assertSeeIn($baseSelector, $pdfs->updated_at->toShortDateTime());

                    $deleteSelector = $baseSelector . "form[action='" . route('admin.destroy.pdf', $pdfs->id) . "']";
                    $row->assertPresent($deleteSelector);
            });
        });
    }

    public function testAssertLinksPresent(): void
    {
        factory(Pdf::class, 2)->create();

        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.index.pdf', $this->edict->id));

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumSelector = ".breadcrumb li:nth-child(2)";
            $thirdBreadcrumSelector = ".breadcrumb li:nth-child(3)";

            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumSelector, 'Editais');
            $browser->assertSeeIn($thirdBreadcrumSelector, 'Novo PDF');
        });
    }
}
