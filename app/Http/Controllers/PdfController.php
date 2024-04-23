<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function __invoke(User $student)
    {
        $data = [
            'student' => $student,
        ];

        $pdf = Pdf::loadView('pages.pdf.index', $data);

        return $pdf->download('test.pdf');
    }
}
