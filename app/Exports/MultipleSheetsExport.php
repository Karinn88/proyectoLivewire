<?php

namespace App\Exports;

use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\Permission;
use App\Models\PermissionUser;
use App\Models\Form;
use App\Models\Todolist;
use App\Models\PostEsther;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class MultipleSheetsExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [];

      
        $sheets[] = new class implements FromCollection, WithTitle {
            public function collection()
            {
                return User::all();
            }
            public function title(): string
            {
                return 'Users'; 
            }
        };

        $sheets[] = new class implements FromCollection, WithTitle {
            public function collection()
            {
                return Role::all();
            }
            public function title(): string
            {
                return 'Role'; 
            }
        };
        
        $sheets[] = new RoleUserExport();

        $sheets[] = new class implements FromCollection, WithTitle {
            public function collection()
            {
                return Permission::all();
            }
            public function title(): string
            {
                return 'Permission'; 
            }
        };

        $sheets[] = new PermissionUserExport();

        $sheets[] = new class implements FromCollection, WithTitle {
            public function collection()
            {
                return Form::all();
            }
            public function title(): string
            {
                return 'Form'; 
            }
        };
        $sheets[] = new class implements FromCollection, WithTitle {
            public function collection()
            {
                return PostEsther::all();
            }
            public function title(): string
            {
                return 'PostEsther'; 
            }
        };
        $sheets[] = new class implements FromCollection, WithTitle {
            public function collection()
            {
                return Todolist::all();
            }
            public function title(): string
            {
                return 'Todolist'; 
            }
        };

        return $sheets;
    }
}