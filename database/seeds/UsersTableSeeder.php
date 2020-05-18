<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();

        $adminRole= Role::create(['name' => 'Admin']);
        $comiteRole= Role::create(['name' => 'Comite']);

        $admin= new User;
        $admin -> name = 'julio';
        $admin -> email= 'julio@gmail.com';
        $admin -> password = Hash::make('123123');
        $admin -> save();

        $admin->assignRole($adminRole);

        $comite= new User;
        $comite -> name = 'cesar';
        $comite -> email= 'cesar@gmail.com';
        $comite -> password = Hash::make('123123');
        $comite -> save();

        $comite->assignRole($comiteRole);
    }
}
