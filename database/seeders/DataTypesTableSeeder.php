<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'Utilisateur',
                'display_name_plural' => 'Utilisateurs',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Rôle',
                'display_name_plural' => 'Rôles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-01-09 00:00:13',
                'updated_at' => '2022-01-09 00:00:13',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'articles',
                'slug' => 'articles',
                'display_name_singular' => 'Article',
                'display_name_plural' => 'Articles',
                'icon' => NULL,
                'model_name' => 'App\\Models\\Article',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-01-09 00:06:00',
                'updated_at' => '2022-01-09 04:26:02',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'categories',
                'slug' => 'categories',
                'display_name_singular' => 'Category',
                'display_name_plural' => 'Categories',
                'icon' => NULL,
                'model_name' => 'App\\Models\\Category',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-01-09 00:07:03',
                'updated_at' => '2022-01-09 00:07:33',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'article_categories',
                'slug' => 'article-categories',
                'display_name_singular' => 'Article Category',
                'display_name_plural' => 'Article Categories',
                'icon' => NULL,
                'model_name' => 'App\\Models\\ArticleCategory',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-01-09 00:08:00',
                'updated_at' => '2022-01-10 06:58:45',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'article_contents',
                'slug' => 'article-contents',
                'display_name_singular' => 'Article Content',
                'display_name_plural' => 'Article Contents',
                'icon' => NULL,
                'model_name' => 'App\\Models\\ArticleContent',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-01-09 00:12:25',
                'updated_at' => '2022-01-09 00:21:38',
            ),
            7 => 
            array (
                'id' => 11,
                'name' => 'readers',
                'slug' => 'readers',
                'display_name_singular' => 'Reader',
                'display_name_plural' => 'Readers',
                'icon' => NULL,
                'model_name' => 'App\\Models\\Reader',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2022-01-10 06:58:15',
                'updated_at' => '2022-01-10 06:58:15',
            ),
        ));
        
        
    }
}