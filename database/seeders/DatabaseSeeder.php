<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles
        $this->call(RoleSeeder::class);

        // Create admin user
        $adminRole = Role::where('name', 'Administrateur')->first();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@formation.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        // Create formateur user
        $formateurRole = Role::where('name', 'Formateur')->first();
        User::create([
            'name' => 'Formateur Test',
            'email' => 'formateur@formation.com',
            'password' => Hash::make('password'),
            'role_id' => $formateurRole->id,
        ]);

        // Create apprenant user
        $apprenantRole = Role::where('name', 'Apprenant')->first();
        User::create([
            'name' => 'Apprenant Test',
            'email' => 'apprenant@formation.com',
            'password' => Hash::make('password'),
            'role_id' => $apprenantRole->id,
        ]);
    }
}
