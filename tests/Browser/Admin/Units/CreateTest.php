<?php

namespace Tests\Browser\Admin\Units;

use App\Unit;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateTest extends DuskTestCase
{
    /** @var \App\UnitCategory */
    protected $unit;
    /** @var \App\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->unit = factory(Unit::class)->make([
            'name' => 'Escola Municipal Santa Cruz',
            
        ]);
        $this->user = factory(User::class)->create();
    }

    public function testSucessfullyCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.unit'));

            $browser->type('name', $this->unit->name)
                    ->type('address', $this->unit->address)
                    ->type('phone', $this->unit->phone)
                    ->select('category_id', $this->unit->category_id)
                    ->press('Criar Unidade');

            $browser->assertUrlIs(route('admin.units'));
            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Unidade cadastrada com sucesso');
            });
            $browser->with('table.table', function ($table) {
                $table->assertSee($this->unit->name);
            });
        });
    }

    public function testFailureUpdate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.unit'));

            $browser->press('Criar Unidade');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });

            $browser->with('div.unit_name', function ($flash) {
                $flash->assertSee('O campo nome é obrigatório.');
            });
            $browser->with('div.unit_address', function ($flash) {
                $flash->assertSee('O campo endereço é obrigatório.');
            });
            $browser->with('div.unit_phone', function ($flash) {
                $flash->assertSee('O campo telefone é obrigatório.');
            });
    
        });
    }

    public function testAssertLinksPresent(): void
    {
        $this->unit = factory(Unit::class)->create();

        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.unit'));

            $backLinkSelector = "#main-card a[href='" . route('admin.units') . "']";
            $browser->assertSeeIn($backLinkSelector, 'Voltar');

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.units') . "']";
            $thirdBreadcrumbSelector = ".breadcrumb li:nth-child(3)";
            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumbSelector, 'Unidades');
            $browser->assertSeeIn($thirdBreadcrumbSelector, "Nova Unidade");
        });
    }
}
