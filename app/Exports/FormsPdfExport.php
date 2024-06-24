<?php

namespace App\Exports;

use App\Models\Form;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PDF;

class UsersPdfExport implements FromView
{
    public function view(): View
    {
        $forms = Form::all();
        return view('pdf.forms', ['forms' => $forms]);
    }
}
