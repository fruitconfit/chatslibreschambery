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
        $routes = Route::getRoutes()->getRoutes();
        $routesStorage = array();
        foreach($routes as $value){
            if(!in_array($value->uri, $routesStorage)){
                array_push($routesStorage,$value->uri);
            }
        }
        foreach($routesStorage as $routeName){
            $permission = Permission::create(['name' => $routeName]);
            $role->givePermissionTo($permission);
        }
    }
}
