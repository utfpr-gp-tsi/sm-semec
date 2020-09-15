<?php

namespace Tests\Browser\Admin\Units;

use App\Unit;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateTest extends DuskTestCase
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

    public function testFilledFields(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.unit', $this->unit->id));

            $browser->assertInputValue('name', $this->unit->name)
                    ->assertInputValue('address', str_replace("\n", "", $this->unit->address))
                    ->assertInputValue('phone', $this->unit->phone)
                    ->assertSelected('category_id', $this->unit->category_id);
        });
    }

    public function testSucessfullyUpdate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.unit', $this->unit->id));

            $newData = factory(Unit::class)->make([
                'name' => 'Escola Municipal Stange',
                
            ]);

            $browser->type('name', $newData->name)
                    ->type('address', $newData->address)
                    ->type('phone', $newData->phone)
                    ->select('category_id', $newData->category_id)
                    ->press('Atualizar Unidade');

            $browser->assertUrlIs(route('admin.units'));
            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Unidade atualizada com sucesso');
            });
            $browser->with('table.table', function ($table) use ($newData) {
                $table->assertSee($newData->name);
                $table->assertDontSee($this->unit->name);
            });
        });
    }

    public function testFailuteUpdate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.unit', $this->unit->id));

            $browser->type('name', '')
                    ->type('address', '')
                    ->type('phone', '')
                    ->select('category_id', '')
                    ->press('Atualizar Unidade');

            $browser->assertUrlIs(route('admin.show.unit', $this->unit->id));
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
            $browser->loginAs($this->user)->visit(route('admin.edit.unit', $this->unit->id));

            $backLinkSelector = "#main-card a[href='" . route('admin.units') . "']";
            $browser->assertSeeIn($backLinkSelector, 'Voltar');

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.units') . "']";
            $thirdBreadcrumbSelector = ".breadcrumb li:nth-child(3)";
            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumbSelector, 'Unidades');
            $browser->assertSeeIn($thirdBreadcrumbSelector, "Editar Unidade #{$this->unit->id}");
        });
    }
}
