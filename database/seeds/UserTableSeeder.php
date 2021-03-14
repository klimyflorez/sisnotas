<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = \Illuminate\Support\Facades\DB::table('users');
        $this->truncateTable($table);
        $this->command->info('Insertanto usuarios');
        $this->createUserAdmin();
        $this->createUserTeacher();
        $this->showInfoMessage();
    }
/*
* @param $table
*/
    private function truncateTable($table)
    {
        if (\App\User::count() > 0){
            $this->command->info('Borrando usuarios existentes');

            $table->truncate();

            $this->command->info('Usuarios borrados');
        }
    }

    private function createUserAdmin()
    {

        $roleAdmin = config('roles.models.role')::where('slug', '=', 'admin')->first();
        $user = \App\User::create([
            'id' => \Illuminate\Support\Str::uuid(),
            'first_name' => 'Pepito',
            'last_name' => 'Plus',
            'email' => 'admin@sisnotas.com',
            'password' => bcrypt('@admin.1'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user->attachRole($roleAdmin);
    }

    private function createUserTeacher()
    {

        $roleAdmin = config('roles.models.role')::where('slug', '=', 'teacher')->first();
        $user = \App\User::create([
            'id' => \Illuminate\Support\Str::uuid(),
            'first_name' => 'Pepito',
            'last_name' => 'Plus',
            'email' => 'teacher@sisnotas.com',
            'password' => bcrypt('@docente.1'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user->attachRole($roleAdmin);
    }

    /**
     *
     */
    private function showInfoMessage()
    {
        if (\App\User::count() > 0){
            $this->command->info('Usuarios registrados');
        } else{
            $this->command->info('No se registraron usuarios');
        }
    }
}
