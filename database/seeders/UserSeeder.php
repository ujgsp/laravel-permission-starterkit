<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role
        $superAdminRole = Role::create(['name' => 'superadmin']);
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Buat permission
        $permissions = [
            'view.user',
            'create.user',
            'edit.user',
            'delete.user',
            'view.role',
            'create.role',
            'edit.role',
            'delete.role',
            'view.permission',
            'create.permission',
            'edit.permission',
            'delete.permission',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign semua permission ke superadmin
        $superAdminRole->syncPermissions(Permission::all());

        // Assign beberapa permission ke admin
        $adminRole->syncPermissions(['view.user', 'create.user', 'edit.user']);

        // Buat user dan assign role
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'superadmin',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'user',
            ]
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'email_verified_at' => $userData['email_verified_at'],
                'password' => $userData['password'],
                'remember_token' => $userData['remember_token'],
                'created_at' => $userData['created_at'],
                'updated_at' => $userData['updated_at'],
            ]);

            // Assign role ke user
            $user->assignRole($userData['role']);
        }
    }
}
