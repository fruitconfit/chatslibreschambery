<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Route;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'all']);
        $role->givePermissionTo($permission);
        $routes = Route::getRoutes()->getRoutes();
        $routesStorage = array();
        foreach($routes as $value){
            // Remove twice name and route with parameter (id,...)
            if($value->uri != '/' && preg_match("/\/\{[a-z]*\}/i",$value->uri) == 0 && !in_array($value->uri, $routesStorage)){
               array_push($routesStorage,$value->uri);
            }
        }
        foreach($routesStorage as $routeName){
            $permission = Permission::create(['name' => $routeName]);
        }
    }
}
