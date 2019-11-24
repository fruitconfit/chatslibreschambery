<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscountFormRequest;
use Illuminate\Support\Facades\DB;
use App\Liasse;
use App\Discount;
use App\Fournisseur;
use App\Coupon;
use App\Trace;

class CouponController extends Controller
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
        return view('home');
    }

    /* --------------------------------------------------- COUPONS --------------------------------------------------- */

    // Par samuel et théo le 03/05/2018
    // Retrouve le coupon par son id (si il existe)
    //  L'ajoute si il n'existe pas et que les champs ne sont pas remplis
    //  Le modifie si des champs ont été remplis ou modifiés
    //  Sinon on affiche la page d'ajout d'un nouveau coupon
    public function modifyCoupon(Request $request, $id)
    {
        $message = '';
        $coupon = Coupon::find($id);

        // Modification du coupon

        if ($coupon != NULL && $request != NULL){
            $befCoupon = clone $coupon;
            $couponModExists = false;
            if ( $request->input('referentName') != NULL){
                $coupon->referentName = $request->input('referentName');
                $coupon->commentaire = $request->input('commentaire');
                $couponModExists = true;
                $message = 'Le coupon a bien été modifié.';
            }
            if ($request->input('referentPhone') != NULL){
                $coupon->referentPhone = $request->input('referentPhone');
                $couponModExists = true;
                $message = 'Le coupon a bien été modifié.';
            }
            if ($request->input('benevoleName') != NULL){
                $coupon->benevoleName = $request->input('benevoleName');
                $couponModExists = true;
                $message = 'Le coupon a bien été modifié.';
            }
            if ($request->input('benevolePhone') != NULL){
                $coupon->benevolePhone = $request->input('benevolePhone');
                $couponModExists = true;
                $message = 'Le coupon a bien été modifié.';
            }
            if ($request->input('dateExpiration') != NULL){
                $coupon->dateExpiration = $request->input('dateExpiration');
                $couponModExists = true;
                $message = 'Le coupon a bien été modifié.';
            }

            if( $couponModExists ){
                $coupon->save();
                Trace::traceUpdate('Coupon', $request, $befCoupon);
            }            
            $coupon = Coupon::find($id);

        // Ajout du coupon
        } elseif ($request->input('referentName') != NULL) {
            $coupon = new Coupon();
            $coupon->referentName = $request->input('referentName');


            if ($request->input('referentPhone') != NULL){
                $coupon->referentPhone = $request->input('referentPhone');
            }
            if ($request->input('benevoleName') != NULL){
                $coupon->benevoleName = $request->input('benevoleName');
            }
            if ($request->input('benevolePhone') != NULL){
                $coupon->benevolePhone = $request->input('benevolePhone');
            }
            if ($request->input('dateExpiration') != NULL){
                $coupon->dateExpiration = $request->input('dateExpiration');
            }
            if ($request->input('commentaire') != NULL){
                $coupon->commentaire = $request->input('commentaire');
            }
            $coupon->save();
            $id = str_pad($coupon->id,3,"0",STR_PAD_LEFT);
            $coupon->refCoupon = date("y")."1".$id;
            $coupon->save();
            $coupon = Coupon::find($coupon->id);
            Trace::traceCreate('Coupon', $request);
            $message = 'Le coupon a bien été ajouté.';

        // Affiche la page de création du coupon
        } else {
            $coupon = new Coupon();
            $coupon->id = 0;
        }
        return view('compta.coupon',
            ['coupon'=>$coupon,
            'message'=>$message]);
    }

    // Par samuel et théo le 03/05/2018
    // Affiche la liste de touts les coupons
    public function manageCoupon(Request $request)
    {
        return view('compta.listCoupon',['coupons'=>Coupon::getAllCoupons()]);
    }

    // Par samuel et théo le 03/05/2018
    // Supprime le coupon et update la vue
    public function deleteCoupon($id)
    {
        $coupon = Coupon::findOrFail($id);
        Coupon::destroy($id);
        Trace::traceDelete('Coupon', $coupon);
        \Session::flash('success', 'Le coupon a bien été supprimé!');
        return view('compta.listCoupon',['coupons'=>Coupon::getAllCoupons()]);
    }
}
