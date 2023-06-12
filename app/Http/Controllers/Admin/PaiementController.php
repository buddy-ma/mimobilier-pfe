<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Paiement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Image;
class PaiementController extends Controller
{
    public function paiements(){
        $paiement=Paiement::all();
        return view('admin.mains-admin.paiement.list',compact('paiement'));
        }
        public function ShowAddpaiement(){
        $annonce=Annonce::all();
        return view('admin.mains-admin.paiement.add',compact('annonce'));
        }
        public function paiementAdd(Request $request){
          $validated = $request->validate([
            'nom_opération' =>'required',
            'id_client' => 'required',
            'id_annonce' => 'required',
            'montant_paiement' => 'required',
            'date_paiement' => 'required',
            'photo_virement' => 'required',
        ]);
            $image=$request->file('photo_virement');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,600)->save('upload/virement/'.$name_gen);
            $save_url='upload/virement/'.$name_gen;
            $images=$save_url;
          Paiement::insert([
                'nom_opération'=>$request->nom_opération, 
                'id_client'=>$request->id_client, 
                'id_annonce'=>$request->id_annonce, 
                'montant_paiement'=>$request->montant_paiement, 
                'date_paiement'=>$request->date_paiement, 
                'photo_virement'=>$images, 
                'created_at'=>Carbon::now(), 
            ]);

            return Redirect::to("admin/paiement")->with('success', 'le paiement est ajoutée avec succes');
    
        }
        public function paiementShow($id){
            $paiement=Paiement::find($id);
            $annonce=Annonce::all();
            return view('admin.mains-admin.paiement.edit',compact('paiement','annonce'));
        }
        public function paiementUpdate(Request $request){
             $paiement_id=$request->id;
             $paiement=Paiement::findOrfail($paiement_id);
             $imgs=$request->photo_virement;
             if($imgs){
              unlink($paiement->photo_virement);
              $make_gen=hexdec(uniqid()).'.'.$imgs->getClientOriginalExtension();
              Image::make($imgs)->resize(600,600)->save('upload/virement/'.$make_gen);
              $save='upload/virement/'.$make_gen;
            paiement::findOrFail($paiement_id)->update([
                'nom_opération'=>$request->nom_opération, 
                'id_client'=>$request->id_client, 
                'id_annonce'=>$request->id_annonce, 
                'montant_paiement'=>$request->montant_paiement, 
                'date_paiement'=>$request->date_paiement, 
                'photo_virement'=>$save, 
                'created_at'=>Carbon::now(), 
              ]);
            }
            else{
              paiement::findOrFail($paiement_id)->update([
                'nom_opération'=>$request->nom_opération, 
                'id_client'=>$request->id_client, 
                'id_annonce'=>$request->id_annonce, 
                'montant_paiement'=>$request->montant_paiement, 
                'date_paiement'=>$request->date_paiement, 
                'created_at'=>Carbon::now(), 
              ]);

            }
              return Redirect::to("admin/paiement")->with('success', 'le paiement est modifiée avec succes');
            }
            public function  deletepaiment($id){
              $paiement=Paiement::findOrfail($id);
              unlink($paiement->photo_virement);
                Paiement::findOrFail($id)->delete();
                return Redirect::to("admin/paiement")->with('success', 'le paiement est supprimée avec succes');
                
              }
}