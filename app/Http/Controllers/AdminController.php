<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Route;


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

    public function manageRole(Request $request,$id)
    {
        $routeCollection = Route::getRoutes(); // RouteCollection object
        $routes = $routeCollection->getRoutes(); // array of route objects
        $permissionGroup = array();
        foreach($routes as $route){
            if(isset($route->getAction()['group_name'])){
                if(!isset($permissionGroup[$route->getAction()['group_name']])){
                    $permissionGroup[$route->getAction()['group_name']] = array();
                }
                array_push($permissionGroup[$route->getAction()['group_name']] ,$route);
            }
        }
        $role = Role::find($id);
        $permissions = $role->permissions;
        $userHasGroup = array();
        $uriInGroup = $permissionGroup;
        foreach($permissionGroup as $key => $group){
            $uriInGroup[$key] = array();
            foreach($group as $route){
                array_push($uriInGroup[$key],$route->uri);
            }
        }
        foreach($uriInGroup as $groupName => $group){
            foreach($permissions as $permission){
                if(in_array($permission['name'], $group)){
                    array_push($userHasGroup,$groupName);
                    break;
                }
            }
        }
        $message = "";

        if(isset($_GET["checkList"]) || isset($_GET["_token"])){
            // Checklist empty because any permission for this role
            if(!isset($_GET["checkList"])){
                $_GET["checkList"] = array();
            }
            foreach($_GET["checkList"] as $perm){
                // Not create a duplicata if role already exist
                if(!in_array($perm,$userHasGroup)){
                    foreach($uriInGroup[$perm] as $permGroup){
                        $role->givePermissionTo(Permission::findByName($permGroup));
                    }
                }
            }
            
            $noCheckGroup = array_diff_key($uriInGroup,array_flip($_GET["checkList"]));
            foreach($noCheckGroup as $perm => $value){
                foreach($uriInGroup[$perm] as $permGroup){
                    $role->revokePermissionTo($permGroup);       
                }
            }

            $message = "Modification réussi";
        }
        return view('admin.manageRole',['permissions'=>$userHasGroup,'permissionGroup'=>array_keys($permissionGroup),'roleId'=>$id,'message'=>$message]);
    }

    public static function getAllRole(){
        $roles = DB::table('roles')->get();
        $listRole = array();
        foreach($roles as $role){
            $roleTemp = Role::findById($role->id);
            array_push($listRole, $roleTemp);
        }
        return $listRole;
    }

    public static function getAllRoleName(){
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


    public static function getAllUser(){
        $users = DB::table('users')->get();
        $listUser = array();
        foreach($users as $user){
            $userTemp = User::find($user->id);
            array_push($listUser, $userTemp);
        }
        return $listUser;
    }
}
