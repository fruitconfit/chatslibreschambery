<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


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
        //Auth::User()->assignRole('admin');
        //Role::find(1)->givePermissionTo(Permission::find(1));
        //$role = Role::create(['name' => 'admin']);
        //$permission = Permission::create(['name' => '/admin/role/add']);
        //Role::find(3)->givePermissionTo($permission);
        return view('admin.groups',['roles'=>$this->getAllRole()]);
    }

    public function viewRole()
    {
      return view('admin.groups',['roles'=> $this->getAllRole()]);
    }

    public function addRole(Request $request)
    {
        $message = '';
        if($request->input('name')!==null){
            $roles = $this->getAllRole();
            foreach($roles as $role){
                if($role->name == $request->input('name')){
                    $message = 'le role existe déjà';
                    return view('admin.addRole',['message'=>$message]);
                }
            }
            $role = Role::create(['name' => $request->input('name')]);
            $message = 'Le role a bien été ajouté';
        }
        return view('admin.addRole',['message'=>$message]);
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

    private function getAllRoleName(){
        $roles = DB::table('roles')->get();
        $listRole = array();
        foreach($roles as $role){
            $roleTemp = Role::findById($role->id);
            $listRole[$role->id] = $roleTemp->name;
        }
        return $listRole;
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return view('admin.users',['users'=>$this->getAllUser(), 'roles'=>$this->getAllRoleName()]);
    }

    public function manageUsers()
    {
        return view('admin.users',['users'=>$this->getAllUser(), 'roles'=>$this->getAllRoleName()]);
    }

    public function addRoleToUser(Request $request,$id)
    {
        $user = User::find($id);
        $roles = $user->getRoleNames();
        $newRole = Role::findById($request->input('nameAdd'));
        foreach($roles as $role){
            if($role == $newRole->name){
                return view('admin.users',['users'=>$this->getAllUser(), 'roles'=>$this->getAllRoleName()]);
            }
        }
        $user->assignRole($newRole);
        return view('admin.users',['users'=>$this->getAllUser(), 'roles'=>$this->getAllRoleName()]);
    }
    public function deleteRoleToUser(Request $request,$id)
    {
        $user = User::find($id);
        $newRole = Role::findById($request->input('nameDelete'));
        $user->removeRole($newRole);
        return view('admin.users',['users'=>$this->getAllUser(), 'roles'=>$this->getAllRoleName()]);
    }


    private function getAllUser(){
        $users = DB::table('users')->get();
        $listUser = array();
        foreach($users as $user){
            $userTemp = User::find($user->id);
            array_push($listUser, $userTemp);
        }
        return $listUser;
    }
}
