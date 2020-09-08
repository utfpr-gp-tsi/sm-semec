<?php

namespace App\Observers;

use App\Pdf;
use Illuminate\Support\Str;
use File;

class PdfObserver
{
    /**
     * Handle the pdf "creating" event.
     *
     * @param  \App\Pdf $pdf
     * @return void
     */
    public function creating(Pdf $pdf)
    {
        $this->savePdfFile($pdf);
    }

    /**
     * Save file in disk
     *
     * @param  \App\Pdf $pdf
     * @return void
     */
    private function savePdfFile($pdf)
    {
        if ($pdf->pdf != null) {
            $date = now()->toShortDateTime();
            $pdfName = Str::slug($pdf->edict_id . '-' . $pdf->name . '-' . $date, '-') . '.' . $pdf->pdf->extension();
            $storePath = public_path('uploads/edicts/' . $pdf->edict_id);

            $pdf->pdf->move($storePath, $pdfName);
            $pdf->pdf = $pdfName;
        }
    }
}
