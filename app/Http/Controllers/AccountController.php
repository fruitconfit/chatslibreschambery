<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
use App\User;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('newPassword','newPasswordPage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.account');
    }

    public function modify(Request $request)
    {
        $message = '';
        if(null !== $request->input('email')){
            $message = 'Vos informations ont bien été enregistrées.';
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if($request->input('password') != '')
            {
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();
            Auth::login($user);
            $messageValida = 'Vos informations ont été modifiées';
        }
        return view('auth.account',['message'=>$message]);
    }

    public function logout(){
        Auth::logout();
        return view('welcome');
    }

    public function newPasswordPage(){
        return view('auth.passwords.email');
    }

    public function newPassword(){
        return view('welcome');

        // A tester !

        $user = User::where('email',$email) -> first();
        if($user !== null){

            // Destinataire
            $to .= $request->input('email');
            $from_name = 'Les chats libres de Chambery';
            $from_mail = 'chatslibresdechambery@gmail.com';
            // Sujet
            $subject = 'Nouveau mot de passe';
            // Nouveau mot de passe
            $newPassword = $this->generatePassword(10);
            // message
            $message = "
                Pour assurer la sécurité de vos informations, nous vous avons assigné un nouveau mot de passe aléatoire.\n
                Votre nouveau mot de passe est : ".$newPassword."\n
                Nous vous conseillons de réinitialiser votre mot de passe immédiatement après vous être connecté.\n
                \n
                Cordialement,\n
                \n
                Les chats libres de Chambéry
                    ";

            // En-tête additionnel
            $headers .= "From: ".$from_name." <".$from_mail."> \r\n";

            // Envoi
            $result = mail($to, $subject, $message, $headers);
        }
        if($result == true){
            $user->password = bcrypt($newPassword);
            $user->save();
        }
        return view('welcome');
    }

    private function generatePassword($nbChar){
        $password = "";
		for($i = 0; $i <= $nbChar; $i++)
		{
			$random = rand(97,122);
			$password .= chr($random);
		}
		return $password;
    }
    
    // Par Anaïs le 24/04/2018
    // Renomme un utilisateur
    public function renameUser(Request $request, $userid)
    {
        $user = User::find($userid);
        $message = '';
        if(null !== $request->input('name')){
            $message = 'Vos informations ont bien été enregistrées.';
            $user = User::find($userid);
            $user->name = $request->input('name');
            $user->save();
        }
        return view('admin.renameUser',['user'=>$user, 'message'=>$message]);
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return view('admin.users',['users'=>$this->getAllUser(), 'roles'=>AdminController::getAllRoleName()]);
    }

    function cmp($a, $b)
    {
        return strcasecmp($a->name, $b->name);
    }

    public function manageUsers()
    {
        $users = $this->getAllUser();
        usort($users, array($this, "cmp"));
        return view('admin.users',['users'=>$users, 'roles'=>AdminController::getAllRoleName()]);
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
