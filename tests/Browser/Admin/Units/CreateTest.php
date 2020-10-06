<?php

namespace Tests\Browser\Admin\Units;

use App\Unit;
use App\UnitCategory;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateTest extends DuskTestCase
{
    /** @var \App\Unit */
    protected $unit;
    /** @var \App\User */
    protected $user;
    /** @var \App\UnitCategory */
    protected $categories;

    public function setUp(): void
    {
        parent::setUp();
        $this->categories = factory(UnitCategory::class, 4)->create();
        $this->unit = factory(Unit::class)->make([
            'name' => 'Escola Municipal Santa Cruz',
        ]);
        $this->user = factory(User::class)->create();
    }

    public function testSucessfullyCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.unit'));

            $category = $this->categories->first();

            $browser->type('name', $this->unit->name)
                    ->type('address', $this->unit->address)
                    ->type('phone', $this->unit->phone)
                    ->click('div.unit_category_id #unit_category_id-selectized')
                    ->click("div.unit_category_id .selectize-dropdown .option[data-value='{$category->id}']")
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

    public function testFailureCreate(): void
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

    public function testFailureValidateCaracteresPhone(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.unit'));
            $category = $this->categories->first();
            

            $browser->type('name', $this->unit->name)
                    ->type('address', $this->unit->address)
                    ->type('phone', '12')
                    ->click('div.unit_category_id #unit_category_id-selectized')
                    ->click("div.unit_category_id .selectize-dropdown .option[data-value='{$category->id}']")
                    ->press('Criar Unidade');

    

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });


            $browser->with('div.unit_phone', function ($flash) {
                $flash->assertSee('O campo telefone deve ter pelo menos 10 caracteres.');
            });
        });
    }

    public function testUniquenessOnCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.unit'));
            $newData = factory(Unit::class)->create();
            $category = $this->categories->first();
            

            $browser->type('name', $newData->name)
                    ->type('address', $this->unit->address)
                    ->type('phone', $newData->phone)
                    ->click('div.unit_category_id #unit_category_id-selectized')
                    ->click("div.unit_category_id .selectize-dropdown .option[data-value='{$category->id}']")
                    ->press('Criar Unidade');

    

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });


            $browser->with('div.unit_name', function ($flash) {
                $flash->assertSee('O campo nome já está sendo utilizado.');
            });

            $browser->with('div.unit_phone', function ($flash) {
                $flash->assertSee('O campo telefone já está sendo utilizado.');
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
