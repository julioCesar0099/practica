<?php

use App\User;
use App\personas;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Permission::truncate();
        User::truncate();
        Role::truncate();

        $adminRole= Role::create(['name' => 'Admin']);
        $comiteRole= Role::create(['name' => 'Comite']);

        $permiso1=Permission::create(['name' =>'ver convocatorias']);
        $permiso2=Permission::create(['name' =>'crear convocatorias']);
        $permiso3=Permission::create(['name' =>'eliminar convocatorias']);

        $permiso4=Permission::create(['name' =>'ver roles']);
        $permiso5=Permission::create(['name' =>'eliminar roles']);
        $permiso6=Permission::create(['name' =>'crear roles']);
        $permiso7=Permission::create(['name' =>'editar roles']);
        $permiso8=Permission::create(['name' =>'asignar roles']);
        
        $permiso9=Permission::create(['name' =>'ver usuarios']);
        $permiso10=Permission::create(['name' =>'eliminar usuarios']);
        $permiso11=Permission::create(['name' =>'editar usuarios']);
        $permiso12=Permission::create(['name' =>'crear usuarios']);

        $permiso13=Permission::create(['name' =>'registrar estudiantes especiales']);
        $permiso14=Permission::create(['name' =>'publicar notas']);
        $permiso15=Permission::create(['name' =>'calificar postulantes']);
        $permiso16=Permission::create(['name' =>'editar convocatorias']);
        $permiso17=Permission::create(['name' =>'agregar nuevo usuario']);

        

        $adminRole->givePermissionTo($permiso1);
        $adminRole->givePermissionTo($permiso2);
        $adminRole->givePermissionTo($permiso3);
        $adminRole->givePermissionTo($permiso4);
        $adminRole->givePermissionTo($permiso5);
        $adminRole->givePermissionTo($permiso6);
        $adminRole->givePermissionTo($permiso7);
        $adminRole->givePermissionTo($permiso8);
        $adminRole->givePermissionTo($permiso9);
        $adminRole->givePermissionTo($permiso10);
        $adminRole->givePermissionTo($permiso11);
        $adminRole->givePermissionTo($permiso12);
        $adminRole->givePermissionTo($permiso13);
        $adminRole->givePermissionTo($permiso14);
        $adminRole->givePermissionTo($permiso15);
        $adminRole->givePermissionTo($permiso16);
        $adminRole->givePermissionTo($permiso17);


        // $comiteRole->givePermissionTo($permiso1);

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
