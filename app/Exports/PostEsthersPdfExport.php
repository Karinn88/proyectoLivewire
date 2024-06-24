<?php

namespace App\Exports;

use App\Models\PostEsther;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PDF;

class UsersPdfExport implements FromView
{
    public function view(): View
    {
        $postEsthers = PostEsther::all();
        return view('pdf.postEsthers', ['postEsthers' => $postEsthers]);
    }
}