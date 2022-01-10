<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrateur',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'display_name' => 'Utilisateur standard',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
        ));
        
        
    }
}