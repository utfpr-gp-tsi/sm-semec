<?php

namespace Tests\Browser\Admin\UnitsCategory;

use App\UnitCategory;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateTest extends DuskTestCase
{
    /** @var \App\UnitCategory*/
    protected $category;
    /** @var \App\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = factory(UnitCategory::class)->create();
        $this->user = factory(User::class)->create();
    }

    public function testFilledFields(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.category', $this->category->id));

            $browser->assertInputValue('name', $this->category->name);
        
        });
    }

    public function testSucessfullyUpdate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.category', $this->category->id));

            $newData = factory(UnitCategory::class)->make([
                'name' => 'Cmei',
            ]);

            $browser->type('name', $newData->name)
                    ->press('Atualizar Categoria');

            $browser->assertUrlIs(route('admin.categories'));
            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Categoria atualizada com sucesso');
            });
            $browser->with('table.table', function ($table) use ($newData) {
                $table->assertSee($newData->name);
                $table->assertDontSee($this->category->name);
            });
        });
    }

    public function testFailuteUpdate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.category', $this->category->id));

            $browser->type('name', '')
                    ->press('Atualizar Categoria');

            $browser->assertUrlIs(route('admin.show.category', $this->category->id));
            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });

            $browser->with('div.UnitCategory_name', function ($flash) {
                $flash->assertSee('O campo nome é obrigatório.');
            });
        });
    }

    public function testAssertLinksPresent(): void
    {
        $this->category = factory(UnitCategory::class)->create();

        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.category', $this->category->id));

            $backLinkSelector = "#main-card a[href='" . route('admin.categories') . "']";
            $browser->assertSeeIn($backLinkSelector, 'Voltar');

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.categories') . "']";
            $thirdBreadcrumbSelector = ".breadcrumb li:nth-child(3)";
            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumbSelector, 'Categorias');
            $browser->assertSeeIn($thirdBreadcrumbSelector, "Editar Categoria #{$this->category->id}");
        });
    }



}
