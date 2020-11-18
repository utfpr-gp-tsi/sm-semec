<?php

namespace Tests\Browser\Admin\ServantCompletaryData;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\ServantCompletaryData;
use App\Models\Movement;
use App\Models\Servant;

class IndexTest extends DuskTestCase
{
    /** @var \App\Models\User */
    protected $user;

    /** @var \App\Models\ServantCompletaryData */
    protected $completaryData;

    /** @var \App\Models\Servant */
    protected $servant;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->completaryData = ServantCompletaryData::factory()->create();
    }

    public function testIndexList(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit('/admin/servants/1/completary-datas')
            ->press('.collapse-completaryData')->assertSee('Servidor:')
            ->driver->executeScript('window.scrollTo(0, 500);');

            $browser->with('#main-card .completaryData', function ($body) {
                $body->assertSee($this->completaryData->contract->servant->name);
                $body->assertSee($this->completaryData->contract->role);
                $body->assertSee($this->completaryData->contract->place);
                $body->assertSee($this->completaryData->occupation);
                $body->assertSee($this->completaryData->workload->workload);
            });
        });
    }

    public function testIndexListMovements(): void
    {
        $movements = Movement::factory()->count(3)->create();
        $completaryData = ServantCompletaryData::factory()->create();

        $this->browse(function ($browser) use ($completaryData) {
            $browser->loginAs($this->user)->visit('/admin/servants/2/completary-datas')
            ->press('.collapse-completaryData')
            ->assertSee('Servidor:')->driver->executeScript('window.scrollTo(0, 500);');

            $browser->scrollIntoView('table');

            $browser->with("table.completaryData tbody", function ($row) use ($completaryData) {
                $pos = 0;

                foreach ($completaryData->moviments as $movements) {
                    $pos += 1;
                    $baseSelector = "tr:nth-child({$pos}) ";

                    $row->assertSeeIn($baseSelector, $movements->role->name);
                    $row->assertSeeIn($baseSelector, $movements->unit->name);
                    $row->assertSeeIn($baseSelector, $movements->started_at->toShortDate());
                }
            });
        });
    }

    public function testAssertLinksPresent(): void
    {
        $this->servant = Servant::factory()->create();

        $this->browse(function ($browser) {
             $browser->loginAs($this->user)->visit('/admin/servants/1/completary-datas');

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.servants') . "']";
            $thirdBreadcrumbSelector = ".breadcrumb li:nth-child(3)";
            $fourthBreadcrumbSelector = ".breadcrumb li:nth-child(4)";

            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumbSelector, 'Servidores');
            $browser->assertSeeIn($thirdBreadcrumbSelector, "Servidor #1");
            $browser->assertSeeIn($fourthBreadcrumbSelector, 'Cadastro Complementar');
        });
    }
}
