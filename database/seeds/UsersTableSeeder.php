<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*User::truncate();
        DB::table('role_user')->truncate();*/

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $autor = User::create([
            'name' => 'autor',
            'email' => 'autor@autor.com',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $autorRole = Role::where('name', 'autor')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin->roles()->attach($adminRole);
        $autor->roles()->attach($autorRole);
        $user->roles()->attach($userRole);
    }
}
