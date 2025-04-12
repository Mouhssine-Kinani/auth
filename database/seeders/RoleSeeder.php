<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Administrateur',
            'Formateur',
            'Apprenant'
        ];

        foreach ($roles as $roleName) {
            Role::create(['name' => $roleName]);
        }
    }
}
