<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function groups()
    {
        //$role = Role::create(['name' => 'reader']);
        return view('admin.groups',['roles'=>$this->getAllRole()]);
    }

    public function deleteRole($id)
    {
        Role::destroy($id);
        return view('admin.groups',['roles'=>$this->getAllRole()]);
    }

    public function manageGroups()
    {
        return view('admin.groups',['roles'=>$this->getAllRole()]);
    }

    private function getAllRole(){
        $roles = DB::table('roles')->get();
        $listRole = array();
        foreach($roles as $role){
            $roleTemp = Role::findById($role->id);
            array_push($listRole, $roleTemp);
        }
        return $listRole;
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return view('admin.users',['users'=>$this->getAllUser()]);
    }

    public function manageUsers()
    {
        return view('admin.users',['users'=>$this->getAllUser()]);
    }

    private function getAllUser(){
        return DB::table('users')->get();
    }
}
