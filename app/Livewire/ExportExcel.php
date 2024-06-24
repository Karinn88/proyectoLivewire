<?php

namespace App\Livewire;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MultipleSheetsExport;

class ExportExcel extends Component
{
    public function export()
    {
        return Excel::download(new MultipleSheetsExport, 'data.xlsx');
    }

    public function render()
    {
        return view('livewire.export-excel');
    }
}
