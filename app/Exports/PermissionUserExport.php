<?php

namespace App\Exports;

use App\Models\Permission_User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class PermissionUserExport implements FromCollection, WithTitle
{
    public function collection()
    {
        return Permission_User::all();
    }

    public function title(): string
    {
        return 'PermissionUser';
    }
}