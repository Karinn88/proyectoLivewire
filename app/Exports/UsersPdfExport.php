<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PDF;

class UsersPdfExport implements FromView
{
    public function view(): View
    {
        $todolists = User::all();
        return view('pdf.users', ['users' => $todolists]);
    }
}