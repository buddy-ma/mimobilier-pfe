<?php

namespace App\Http\Controllers\Admin;

use  App\Models\Reservation;
use  App\Models\Annonce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
class ReservationController extends Controller
{
    public function reservations(){
        $reservation=Reservation::all();
        return view('admin.mains-admin.reservation.list',compact('reservation'));
        }
        public function ShowAddReservation(){
        $annonce=Annonce::all();
        return view('admin.mains-admin.reservation.add',compact('annonce'));
        }
        public function reservationAdd(Request $request){
          Reservation::insert([
                'id_promoteur'=>$request->id_promoteur, 
                'id_client'=>$request->id_client, 
                'id_annonce'=>$request->id_annonce, 
                'Date'=>$request->Date, 
                'created_at'=>Carbon::now(),
    
            ]);

            return Redirect::to("admin/Reservation")->with('success', 'la reservation est ajoutée avec succes');
    
        }
        public function reservationShow($id){
            $reservation=Reservation::find($id);
            $annonce=Annonce::all();
            return view('admin.mains-admin.reservation.edit',compact('reservation','annonce'));
        }
        public function ReservationUpdate(Request $request){
             $reservation_id=$request->id;
            Reservation::findOrFail($reservation_id)->update([
                'id_promoteur'=>$request->id_promoteur, 
                'id_client'=>$request->id_client, 
                'id_annonce'=>$request->id_annonce, 
                'Date'=>$request->Date, 
                'updated_at'=>Carbon::now(),
              ]);
              return Redirect::to("admin/Reservation")->with('success', 'la reservation est modifiée avec succes');
            }
            public function  deletereservation($id){
                Reservation::findOrFail($id)->delete();
                return Redirect::to("admin/Reservation")->with('success', 'la reservation est supprimée avec succes');
                
              }
}