<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadminUser = new User;
        $superadminUser->name = 'Superadmin';
        $superadminUser->username = 'superadmin';
        $superadminUser->email = 'Superadmin@admin.com';
        $superadminUser->password = bcrypt('secret');
        $superadminUser->rule = 1;
        // $superadminUser->icon = 'default-icon.png';
        $superadminUser->save();
    }
}
