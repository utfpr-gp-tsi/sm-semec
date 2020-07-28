<?php

namespace Tests\Browser\Admin\Edicts;

use App\Edict;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateTest extends DuskTestCase
{
    /** @var \App\Edict */
    protected $edict;
    /** @var \App\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->edict = factory(Edict::class)->make();
        $this->user = factory(User::class)->create();
    }

    public function testSucessfullyCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.edict'));

            $browser->type('title', $this->edict->title)
                ->type('description', $this->edict->description)
                ->type('started_at', $this->edict->started_at->toShortDateTime())
                ->type('ended_at', $this->edict->ended_at->toShortDateTime())
                ->press('Criar Edital');

            $browser->assertUrlIs(route('admin.edicts'));
            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Edital cadastrado com sucesso');
            });
            $browser->with('table.table', function ($table) {
                $table->assertSee($this->edict->title);
            });
        });
    }

    public function testFailuteUpdate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.edict'));

            $browser->press('Criar Edital');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });

            $browser->with('div.edict_title', function ($flash) {
                $flash->assertSee('O campo Título é obrigatório.');
            });
            $browser->with('div.edict_description', function ($flash) {
                $flash->assertSee('O campo Descrição é obrigatório.');
            });
            $browser->with('div.edict_started_at', function ($flash) {
                $flash->assertSee('O campo Início é obrigatório.');
            });
            $browser->with('div.edict_ended_at', function ($flash) {
                $flash->assertSee('O campo Término é obrigatório.');
            });
        });
    }

    public function testAssertLinksPresent(): void
    {
        $this->edict = factory(Edict::class)->create();

        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.edit.edict', $this->edict->id));

            $backLinkSelector = "#main-card a[href='" . route('admin.edicts') . "']";
            $browser->assertSeeIn($backLinkSelector, 'Voltar');

            $rootBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.dashboard') . "']";
            $secondBreadcrumbSelector = ".breadcrumb-item a[href='" . route('admin.edicts') . "']";
            $thirdBreadcrumbSelector = ".breadcrumb li:nth-child(3)";
            $browser->assertSeeIn($rootBreadcrumbSelector, 'Página Inicial');
            $browser->assertSeeIn($secondBreadcrumbSelector, 'Editais');
            $browser->assertSeeIn($thirdBreadcrumbSelector, "Editar Edital #{$this->edict->id}");
        });
    }
}
