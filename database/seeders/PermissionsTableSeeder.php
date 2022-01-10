<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_articles',
                'table_name' => 'articles',
                'created_at' => '2022-01-09 00:06:00',
                'updated_at' => '2022-01-09 00:06:00',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'read_articles',
                'table_name' => 'articles',
                'created_at' => '2022-01-09 00:06:00',
                'updated_at' => '2022-01-09 00:06:00',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'edit_articles',
                'table_name' => 'articles',
                'created_at' => '2022-01-09 00:06:00',
                'updated_at' => '2022-01-09 00:06:00',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'add_articles',
                'table_name' => 'articles',
                'created_at' => '2022-01-09 00:06:00',
                'updated_at' => '2022-01-09 00:06:00',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'delete_articles',
                'table_name' => 'articles',
                'created_at' => '2022-01-09 00:06:00',
                'updated_at' => '2022-01-09 00:06:00',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'browse_categories',
                'table_name' => 'categories',
                'created_at' => '2022-01-09 00:07:03',
                'updated_at' => '2022-01-09 00:07:03',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'read_categories',
                'table_name' => 'categories',
                'created_at' => '2022-01-09 00:07:03',
                'updated_at' => '2022-01-09 00:07:03',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'edit_categories',
                'table_name' => 'categories',
                'created_at' => '2022-01-09 00:07:03',
                'updated_at' => '2022-01-09 00:07:03',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'add_categories',
                'table_name' => 'categories',
                'created_at' => '2022-01-09 00:07:03',
                'updated_at' => '2022-01-09 00:07:03',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'delete_categories',
                'table_name' => 'categories',
                'created_at' => '2022-01-09 00:07:03',
                'updated_at' => '2022-01-09 00:07:03',
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'browse_article_categories',
                'table_name' => 'article_categories',
                'created_at' => '2022-01-09 00:08:00',
                'updated_at' => '2022-01-09 00:08:00',
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'read_article_categories',
                'table_name' => 'article_categories',
                'created_at' => '2022-01-09 00:08:00',
                'updated_at' => '2022-01-09 00:08:00',
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'edit_article_categories',
                'table_name' => 'article_categories',
                'created_at' => '2022-01-09 00:08:00',
                'updated_at' => '2022-01-09 00:08:00',
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'add_article_categories',
                'table_name' => 'article_categories',
                'created_at' => '2022-01-09 00:08:00',
                'updated_at' => '2022-01-09 00:08:00',
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'delete_article_categories',
                'table_name' => 'article_categories',
                'created_at' => '2022-01-09 00:08:00',
                'updated_at' => '2022-01-09 00:08:00',
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'browse_article_contents',
                'table_name' => 'article_contents',
                'created_at' => '2022-01-09 00:12:25',
                'updated_at' => '2022-01-09 00:12:25',
            ),
            41 => 
            array (
                'id' => 42,
                'key' => 'read_article_contents',
                'table_name' => 'article_contents',
                'created_at' => '2022-01-09 00:12:25',
                'updated_at' => '2022-01-09 00:12:25',
            ),
            42 => 
            array (
                'id' => 43,
                'key' => 'edit_article_contents',
                'table_name' => 'article_contents',
                'created_at' => '2022-01-09 00:12:25',
                'updated_at' => '2022-01-09 00:12:25',
            ),
            43 => 
            array (
                'id' => 44,
                'key' => 'add_article_contents',
                'table_name' => 'article_contents',
                'created_at' => '2022-01-09 00:12:25',
                'updated_at' => '2022-01-09 00:12:25',
            ),
            44 => 
            array (
                'id' => 45,
                'key' => 'delete_article_contents',
                'table_name' => 'article_contents',
                'created_at' => '2022-01-09 00:12:25',
                'updated_at' => '2022-01-09 00:12:25',
            ),
            45 => 
            array (
                'id' => 46,
                'key' => 'browse_readers',
                'table_name' => 'readers',
                'created_at' => '2022-01-10 06:58:15',
                'updated_at' => '2022-01-10 06:58:15',
            ),
            46 => 
            array (
                'id' => 47,
                'key' => 'read_readers',
                'table_name' => 'readers',
                'created_at' => '2022-01-10 06:58:15',
                'updated_at' => '2022-01-10 06:58:15',
            ),
            47 => 
            array (
                'id' => 48,
                'key' => 'edit_readers',
                'table_name' => 'readers',
                'created_at' => '2022-01-10 06:58:15',
                'updated_at' => '2022-01-10 06:58:15',
            ),
            48 => 
            array (
                'id' => 49,
                'key' => 'add_readers',
                'table_name' => 'readers',
                'created_at' => '2022-01-10 06:58:15',
                'updated_at' => '2022-01-10 06:58:15',
            ),
            49 => 
            array (
                'id' => 50,
                'key' => 'delete_readers',
                'table_name' => 'readers',
                'created_at' => '2022-01-10 06:58:15',
                'updated_at' => '2022-01-10 06:58:15',
            ),
        ));
        
        
    }
}