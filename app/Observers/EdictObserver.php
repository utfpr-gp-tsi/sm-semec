<?php

namespace App\Observers;

use App\Edict;
use App\Pdf;
use File;

class EdictObserver
{
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
    * @param  \App\Edict  $edict
    * @return void
    */
    private function deletePdfFile($edict)
    {
        $pdfDirectory = public_path('uploads/edicts/' . $edict->id);
        File::deleteDirectory($pdfDirectory);
    }
}
