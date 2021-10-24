<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin')
        ]);

        $adminRole = Role::create(['name' => 'admin']);

        $admin->assignRole($adminRole);


        $staff = User::create([
            'name'=>'staff',
            'email'=>'staff@admin.com',
            'password'=>Hash::make('staff')
        ]);

        $staffRole = Role::create(['name' => 'staff']);

        $staff->assignRole($staffRole);
    }
}
