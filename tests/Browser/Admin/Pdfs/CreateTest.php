<?php

namespace Tests\Browser\Admin\Pdfs;

use App\Edict;
use App\User;
use App\Pdf;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Http\UploadedFile;

class CreateTest extends DuskTestCase
{
    /** @var \App\Edict */
    protected $edict;
    /** @var \App\User */
    protected $user;
    /** @var \App\Pdf */
    protected $pdf;

    public function setUp(): void
    {
        parent::setUp();
        $this->edict = factory(Edict::class)->create();
        $this->user = factory(User::class)->create();
        // $this->pdf = factory(Pdf::class)->create();
    }

    public function testFailureCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.pdf', $this->edict->id));

            $browser->press('Adicionar Pdf');

            $browser->with('span.invalid-feedback', function ($flash) {
                $flash->assertSee('O campo nome é obrigatório.');
            });

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });
        });
    }

    public function testSuccessUploadPdf(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.pdf', $this->edict->id));

            $browser->type('name', 'Teste Pdf')
            ->attach('pdf', 'tests/files/pdfs/test.pdf')
            ->press('Adicionar Pdf');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Pdf adicionado com sucesso');
            });
        });
    }

    public function testWrongFile(): void
    {
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)->visit(route('admin.new.pdf', $this->edict->id));
            $browser->type('name', 'example')
            ->attach('pdf', 'resources/images/logo.png')
            ->press('Adicionar Pdf');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });
        });
    }
}
