<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('users');
        $this->truncateTable($table);
        $this->command->info('Insertanto usuarios');
        $this->createUser();
        $this->showInfoMessage();
    }
    private function truncateTable($table)
    {
        if (User::count()>0){
            $this->command->info('Borrando usuarios existentes');
            $table->truncate();
            $this->command->info('Usuarios borrados');
        }
    }

    /**
     * create user docente
     */
    private function createUser()
    {
        User::create([
            'id' => Str::uuid(),
            'name' => 'Pepito plus',
            'email' => 'pepito@docente.com',
            'password' => bcrypt('@docente.1'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

}
