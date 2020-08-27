<?php

namespace Tests\Browser\Admin\Edicts\Pdfs;

use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use App\Edict;
use App\User;
use App\Pdf;
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
        $this->pdf = factory(Pdf::class)->create();
    }

    // public function testFailureCreate(): void
    // {
    //     $this->browse(function ($browser) {
    //         $browser->loginAs($this->user)->visit(route('admin.new.pdf', $this->edict->id));

    //         $browser->press('Adicionar Pdf');

    //         $browser->with('span.invalid-feedback', function ($flash) {
    //             $flash->assertSee('O campo nome é obrigatório.');
    //         });

    //         $browser->with('div.alert', function ($flash) {
    //             $flash->assertSee('Existem dados incorretos! Por favor verifique!');
    //         });
    //     });
    // }

    public function testSuccessCreatePdf(): void
    {
        $this->browse(function ($browser) {

            $file = new UploadedFile(
                'public/uploads/edicts/',
                'test.pdf',
                'application/pdf',
                250210,
            );

            dd($this->pdf);
            exit();

            $browser->loginAs($this->user)->visit(route('admin.new.pdf', $this->edict->id));
            $browser->type('name', 'Servidor1')
            ->attach('pdf', $file)
            ->press('Adicionar Pdf');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Pdf adicionado com sucesso');
            });
        });
    }

    // public function testWrongFile(): void
    // {
    //     $this->browse(function ($browser) {
    //         $browser->loginAs($this->user)->visit(route('admin.new.pdf', $this->edict->id));
    //         $browser->type('name', 'example')
    //         ->attach('pdf', 'resoureces/images/logo.ong')
    //         ->press('Adicionar Pdf');

    //         // $browser->assertUrlIs(route('admin.edicts'));
    //         $browser->with('div.alert', function ($flash) {
    //             $flash->assertSee('Existem dados incorretos! Por favor verifique!');
    //         });
    //     });
    // }
}
