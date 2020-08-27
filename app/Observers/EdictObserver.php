<?php

namespace App\Observers;

use App\Edict;
use App\Pdf;
use File;

class EdictObserver
{
    /**
    * Handle the edict "created" event.
    *
    * @param  \App\Edict  $edict
    * @return void
    */
    public function created(Edict $edict)
    {
        //
    }

    /**
    * Handle the edict "updated" event.
    *
    * @param  \App\Edict  $edict
    * @return void
    */
    public function updated(Edict $edict)
    {
        //
    }

    /**
    * Handle the edict "deleted" event.
    *
    * @param  \App\Edict  $edict
    * @return void
    */
    public function deleted(Edict $edict)
    {
        $this->deletePdfFile($edict);
    }

    /**
    * Delete a pdf from file.
    *
    * @param  \App\Pdf  $pdf
    * @return void
    */
    private function deletePdfFile($edict)
    {
        $pdfDirectory = public_path('uploads/edicts/edict-' . $edict->id);
        File::deleteDirectory($pdfDirectory);
    }
}
