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

    /** @var \App\Models\Movement */
    protected $movement;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->completaryData = ServantCompletaryData::factory()->create();
        $this->movement = Movement::factory()->create(['servant_completary_data_id' => 1]);
    }

    public function testIndexList(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit('/admin/servants/1/contracts/1/completary-datas');

            $browser->assertInputValue('contract_id', $this->completaryData->contract->registration)
            ->driver->executeScript('window.scrollTo(0, 500);');
            $browser->assertSee('Dados Adicionais')
            ->assertInputValue('formation', $this->completaryData->formation)
            ->assertInputValue('workload_id', $this->completaryData->workload->hours)
            ->assertInputValue('observation', $this->completaryData->observation);


            $browser->assertSee('Movimentações');
            $browser->scrollIntoView('.table');

            $browser->with('.table', function ($body) {
                $body->assertSee($this->movement->servantCompletaryData->contract->registration);
                $body->assertSee($this->movement->occupation);
                $body->assertSee(__($this->movement->period));
                $body->assertSee($this->movement->unit->name);
            });
        });
    }

    public function testAssertLinksPresent(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit('/admin/servants/1/contracts/1/completary-datas');

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.servants') . "']";
            $thirdBreadcrumbSelector = ".breadcrumb li:nth-child(3)";
            $fourthBreadcrumbSelector = ".breadcrumb li:nth-child(4)";
            $fifthBreadcrumbSelector = ".breadcrumb li:nth-child(5)";

            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumbSelector, 'Servidores');
            $browser->assertSeeIn($thirdBreadcrumbSelector, "Servidor #{$this->completaryData->contract->servant_id}");
            $browser->assertSeeIn($fourthBreadcrumbSelector, 'Cadastro Complementar');
            $browser->assertSeeIn($fifthBreadcrumbSelector, 'Dados Complementares');
        });
    }
}
