<?php

namespace Tests\Browser\Admin\UnitsCategory;

use App\UnitCategory;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateTest extends DuskTestCase
{
    /** @var \App\UnitCategory */
    protected $category;
    /** @var \App\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = factory(UnitCategory::class)->make([
            'name' => 'Cmei',
        ]);
        $this->user = factory(User::class)->create();
    }

    public function testSucessfullyCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.category'));

            $browser->type('name', $this->category->name) 
                    ->press('Criar Categoria');
            
            $browser->assertUrlIs(route('admin.categories'));
            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Categoria cadastrada com sucesso');
            });

        });
    }

    public function testFailureUpdate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.category'));

            $browser->press('Criar Categoria');

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
            $browser->loginAs($this->user)->visit(route('admin.new.category'));

            $backLinkSelector = "#main-card a[href='" . route('admin.categories') . "']";
            $browser->assertSeeIn($backLinkSelector, 'Voltar');

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.categories') . "']";
            $thirdBreadcrumbSelector = ".breadcrumb li:nth-child(3)";
            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumbSelector, 'Categorias');
            $browser->assertSeeIn($thirdBreadcrumbSelector, "Nova Categoria");
        });
    }
}
