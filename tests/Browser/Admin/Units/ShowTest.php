<?php

namespace Tests\Browser\Admin\Units;

use App\Unit;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowTest extends DuskTestCase
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

    public function testShow(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.show.unit', $this->unit->id));

            $browser->with('#main-card .card-body', function ($body) {
                $body->assertSee($this->unit->name);
                $body->assertSee($this->unit->address);
                $body->assertSee($this->unit->phone);
                $body->assertSee($this->unit->category->name);
            });
        });
    }

    public function testAssertLinksPresent(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.show.unit', $this->unit->id));

            $backLinkSelector = "#main-card a[href='" . route('admin.units') . "']";
            $editLinkSelector = "#main-card a[href='" . route('admin.edit.unit', $this->unit->id) . "']";
            $browser->assertSeeIn($backLinkSelector, 'Voltar');
            $browser->assertSeeIn($editLinkSelector, 'Editar');

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.units') . "']";
            $thirdBreadcrumbSelector = ".breadcrumb li:nth-child(3)";
            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumbSelector, 'Unidades');
            $browser->assertSeeIn($thirdBreadcrumbSelector, "Unidade #{$this->unit->id}");
        });
    }
}
