<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Liasse;

class ComptaController extends Controller
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
    public function index()
    {
        return view('compta.liasse');
    }

    public function manageLiasse(Request $request, $id)
    {
        $message = '';
        $liasse = Liasse::find($id);
        if ($liasse != NULL){
            //modification de la liasse
            if ( $request->input('creationDate') != NULL){
                $liasse->creationDate = $request->input('creationDate');
            }
            if ($request->input('transmission') != NULL){
                $liasse->transmission = $request->input('transmission');
            }
            if ($request->input('creditate') != NULL){
                $liasse->creditate = $request->input('creditate');
            }
            $liasse->save();
            $liasse = Liasse::find($id);
            $message = 'La liasse a bien été modifiée.';
        } elseif ($request->input('creationDate') != NULL) {
            //on ajoute la liasse
            $liasse = new Liasse();
            if ( $request->input('creationDate') != NULL){
                $liasse->creationDate = $request->input('creationDate');
            }
            if ($request->input('transmission') != NULL){
                $liasse->transmission = $request->input('transmission');
            }
            if ($request->input('creditate') != NULL){
                $liasse->creditate = $request->input('creditate');
            }
            $liasse->save();
            $liasse = Liasse::find($liasse->id);
            $message = 'La liasse a bien été ajoutée.';
        } else {
            //affichage de la page standard
            $liasse = new Liasse();
            $liasse->id = 0;
        }
        return view('compta.liasse',['liasse'=>$liasse],['message'=>$message]);
    }
}