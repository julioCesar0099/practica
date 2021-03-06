<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(UsersTableSeeder::class);
        $this->call(CombocatoriasTbleSeeder::class);
        $this->call(PersonasSeeder::class);
        $this->call(OcupacionSeeder::class);
        $this->call(PostulanteSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
