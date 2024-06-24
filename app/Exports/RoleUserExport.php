<?php

namespace App\Exports;

use App\Models\Role_User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class RoleUserExport implements FromCollection, WithTitle
{
    public function collection()
    {
        return Role_User::all();
    }

    public function title(): string
    {
        return 'RoleUser';
    }

}
