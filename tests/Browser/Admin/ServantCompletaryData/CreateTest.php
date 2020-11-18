<?php

namespace Tests\Browser\Admin\ServantCompletaryData;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\ServantCompletaryData;
use App\Models\User;
use App\Models\Contract;
use App\Models\Workload;

class CreateTest extends DuskTestCase
{
    /** @var \App\Models\User */
    protected $user;

    /** @var \App\Models\Workload */
    protected $workloads;

    /** @var \App\Models\Contract */
    protected $contract;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->contract = Contract::factory()->create();
        $this->workloads = Workload::factory()->count(4)->create();
    }

    public function testSucessfullyCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.completary_data', ['servant_id' =>
                $this->contract->servant->id, 'id' => $this->contract->id]))
            ->driver->executeScript('window.scrollTo(0, 500);');

            $workload = $this->workloads->first();

            $browser->type('occupation', 'Professora')->driver->executeScript('window.scrollTo(0, 600);');
            $browser->waitFor('#servantCompletaryData_workload_id-selectized')
            ->driver->executeScript('window.scrollTo(0, 500);');
            $browser->click('div.servantCompletaryData_workload_id #servantCompletaryData_workload_id-selectized');
            $browser->waitFor('#servantCompletaryData_workload_id-selectized');

            $browser->click("div.servantCompletaryData_workload_id .option[data-value='{$workload->id}']")
            ->radio('span.custom-control-label', 'morning')->driver->executeScript('window.scrollTo(0, 400);');
            $browser->press('Criar Cadastro');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Cadastro Complementar adicionado com sucesso');
            });
        });
    }

    public function testFailureCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.completary_data', ['servant_id' =>
                $this->contract->servant->id, 'id' => $this->contract->id]))
            ->driver->executeScript('window.scrollTo(0, 500);');

            $browser->press('Criar Cadastro')->driver->executeScript('window.scrollTo(0, 700);');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });

            $browser->with('div.servantCompletaryData_occupation', function ($flash) {
                $flash->assertSee('O campo função é obrigatório.');
            });
            $browser->with('div.servantCompletaryData_workload_id', function ($flash) {
                $flash->assertSee('O campo carga horária é obrigatório.');
            });
        });
    }

    public function testAssertLinksPresent(): void
    {
        $this->browse(function ($browser) {
             $browser->loginAs($this->user)->visit(route('admin.new.completary_data', ['servant_id' =>
                $this->contract->servant->id, 'id' => $this->contract->id]));

            $backLinkSelector = "#main-card a[href='" .
            route('admin.index.completary_data', $this->contract->servant_id) . "']";
            $browser->assertSeeIn($backLinkSelector, 'Voltar');

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.servants') . "']";
            $thirdBreadcrumbSelector = ".breadcrumb li:nth-child(3)";
            $fourthBreadcrumbSelector = ".breadcrumb li:nth-child(4)";

            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumbSelector, 'Servidores');
            $browser->assertSeeIn($thirdBreadcrumbSelector, "Servidor #{$this->contract->servant_id}");
            $browser->assertSeeIn($fourthBreadcrumbSelector, 'Cadastro Complementar');
        });
    }
}
