<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Esther',
            'email' => 'esther@example.com',
            'password'=> bcrypt('test1234'),
            'role'=> 'user',
            'character' => '',
            'history' => '',
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password'=> bcrypt('admin1234'),
            'role'=> 'admin',
            'character' => '',
            'history' => '',
        ]);
        User::factory()->create([
            'name' => 'Manuel',
            'email' => 'manuel@example.com',
            'password'=> bcrypt('manu1234'),
            'role'=> 'user',
            'character' => '',
            'history' => '',
        ]);
        User::factory()->create([
            'name' => 'Ana',
            'email' => 'ana@example.com',
            'password'=> bcrypt('ana1234'),
            'role'=> 'user',
            'character' => '',
            'history' => '',
        ]);

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
    }

    
}
