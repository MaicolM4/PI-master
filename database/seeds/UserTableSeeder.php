<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'Juan Angulo';
        $user->identification = 'Admin';
        $user->email = 'user@example.com';
        $user->user = 'jeangulou';
        $user->password = bcrypt('secret');
        $user->estado = '1';
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'Juan Angulo';
        $user->identification = 'Admin';
        $user->email = 'admin@example.com';
        $user->user = 'jeanguloa';
        $user->password = bcrypt('secret');
        $user->estado = '1';
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
