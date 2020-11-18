<?php

namespace Tests\Browser\Admin\ServantCompletaryData;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\ServantCompletaryData;
use App\Models\User;
use App\Models\Contract;
use App\Models\Workload;

class UpdateTest extends DuskTestCase
{

    /** @var \App\Models\User */
    protected $user;

    /** @var \App\Models\ServantCompletaryData */
    protected $completaryData;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->completaryData = ServantCompletaryData::factory()->create();
    }

    public function testFilledFields(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.completary_data', ['servant_id' =>
            $this->completaryData->contract->servant_id, 'contract_id' =>
            $this->completaryData->contract_id, 'id' => $this->completaryData->id]))
            ->driver->executeScript('window.scrollTo(0, 600);');

            $browser->assertInputValue('occupation', $this->completaryData->occupation)
                    ->assertSelected('workload_id', $this->completaryData->workload_id)
                    ->assertRadioSelected('period', $this->completaryData->period);
        });
    }

    public function testSucessfullyUpdate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.completary_data', ['servant_id' =>
                $this->completaryData->contract->servant_id, 'contract_id' =>
                $this->completaryData->contract_id, 'id' => $this->completaryData->id]))
            ->driver->executeScript('window.scrollTo(0, 600);');

            $completaryData = ServantCompletaryData::factory()->create();

            $browser->type('occupation', $completaryData->occupation)
                    ->press('Atualizar Cadastro');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Cadastro Complementar atualizado com sucesso');
            });

            $browser->press('.collapse-completaryData')->assertSee('Servidor:')
            ->driver->executeScript('window.scrollTo(0, 500);');

            $browser->with('#main-card .completaryData', function ($body) use ($completaryData) {
                $body->assertSee($completaryData->occupation);
                $body->assertDontSee($this->completaryData->occupation);
            });
        });
    }

    public function testFailuteUpdate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.completary_data', ['servant_id' =>
                $this->completaryData->contract->servant_id, 'contract_id' =>
                $this->completaryData->contract_id, 'id' => $this->completaryData->id]))
            ->driver->executeScript('window.scrollTo(0, 600);');

            $browser->type('occupation', '')
                    ->press('Atualizar Cadastro');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });

            $browser->with('div.servantCompletaryData_occupation', function ($flash) {
                $flash->assertSee('O campo função é obrigatório.');
            });
        });
    }

    public function testAssertLinksPresent(): void
    {
        $this->completaryData = ServantCompletaryData::factory()->create();

        $this->browse(function ($browser) {
             $browser->loginAs($this->user)->visit(route('admin.edit.completary_data', ['servant_id' =>
                $this->completaryData->contract->servant_id, 'contract_id' =>
                $this->completaryData->contract_id, 'id' => $this->completaryData->id]));

            $backLinkSelector = "#main-card a[href='" .
            route('admin.index.completary_data', $this->completaryData->contract->servant_id) . "']";
            $browser->assertSeeIn($backLinkSelector, 'Voltar');

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.servants') . "']";
            $thirdBreadcrumbSelector = ".breadcrumb li:nth-child(3)";
            $fourthBreadcrumbSelector = ".breadcrumb li:nth-child(4)";
            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumbSelector, 'Servidores');
            $browser->assertSeeIn($thirdBreadcrumbSelector, "Servidor #{$this->completaryData->contract->servant_id}")
            ->assertSeeIn($fourthBreadcrumbSelector, "Editar Cadastro Complementar #{$this->completaryData->id}");
        });
    }
}
