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
        // $this->call(UsersTableSeeder::class);
        
        DB::table('perfil')->insert([
            'nombre' => 'Secretaria',
            'estado' => 'Habilitado',
        ]);
        DB::table('perfil')->insert([
            'nombre' => 'Paciente',
            'estado' => 'Habilitado',
        ]);
        DB::table('users')->insert([
            'name' => 'Paula',
            'email' => 'paula@gmail.com',
            'password' => bcrypt('admin'),
            'perfil_id' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Alejandro',
            'email' => 'alejandro@gmail.com',
            'password' => bcrypt('admin'),
            'perfil_id' => '2'
        ]);
    }
}
