<?php

namespace Tests\Browser\Admin\UnitsCategory;

use App\UnitCategory;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class IndexTest extends DuskTestCase
{
    /** @var \App\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    public function testIndexList(): void
    {
        $categories = factory(UnitCategory::class, 3)->create();
        $categories = $categories->sortBy('name')->reverse();

        $this->browse(function ($browser) use ($categories) {
            $browser->loginAs($this->user)->visit('/admin/categories');

            $browser->with("table.table tbody", function ($row) use ($categories) {
                $pos = 0;
                foreach ($categories as $category) {
                    $pos += 1;
                    $baseSelector = "tr:nth-child({$pos}) ";

                    $editSelector = $baseSelector . "a[href='" .
                     route('admin.edit.category', $category->id) . "']";
                    $deleteSelector = $baseSelector . "form[action='" .
                    route('admin.destroy.category', $category->id) . "']";
                    $row->assertPresent($editSelector);
                    $row->assertPresent($deleteSelector);
                }
            });
        });
    }

    public function testSearchField(): void
    {
        $category = factory(UnitCategory::class)->create(['name' => 'Unit category name']);

        $this->browse(function ($browser) use ($category) {
            $browser->loginAs($this->user);

            $browser->visit('/admin/categories')
                    ->type('#search_input', $category->name)
                    ->press('#search')
                    ->assertUrlIs(route('admin.search.categories', $category->name));

            $term = time();
            $browser->type('#search_input', $term);
            $browser->keys('#search_input', '{enter}')->assertUrlIs(route('admin.search.categories', $term));

            $browser->assertDontSee($category->name);
        });
    }

    public function testAssertLinksPresent(): void
    {
        factory(UnitCategory::class, 22)->create();

        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit('/admin/categories');

            $newLinkSelector = "#main-card a[href='" . route('admin.new.category') . "']";
            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumSelector = ".breadcrumb li:nth-child(2)";

            $browser->assertSeeIn($newLinkSelector, 'Nova Categoria');
            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumSelector, 'Categorias');

            $browser->with('.pagination', function ($pagination) {
                $pagination->assertSee('1');
                $pagination->assertSeeLink('2');
            });
        });
    }
}
