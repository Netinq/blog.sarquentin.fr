<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Quentin Sar',
                'email' => 'comptes@sarquentin.fr',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$AMruF1RoZ/h/gJJzNw78c.iN3iXlC1VVF6JKbBDx1DKn81O8eWbRq',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2022-01-09 00:00:41',
                'updated_at' => '2022-01-09 00:00:41',
            ),
        ));
        
        
    }
}