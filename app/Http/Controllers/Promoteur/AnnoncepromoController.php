<?php

namespace App\Http\Controllers\Promoteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\AnnonceImage;
use App\Models\TypeAnnonce;
use App\Models\Ville;
use App\Models\User;
use App\Models\Quartier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Image;
class AnnoncepromoController extends Controller
{
    public function annonces(){
        $annonces=Annonce::where('id_promoteur',auth::user()->id)->get();
        return view('promoteur.mains-promoteur.annonces.list',compact('annonces'));
        }
        public function ShowAddAnnonce(){
            $user=User::where('id',auth()->id())->get();
            $Type=TypeAnnonce::all();
            $quartier=Quartier::all();
            $ville=Ville::all();
            return view('promoteur.mains-promoteur.annonces.add',compact('Type','ville','quartier','user'));
        }
        public function AnnonceAdd(Request $request){
          $validated = $request->validate([
            'images' =>'required',
            'Titre' => 'required',
            'type_id' => 'required',
            'id_promoteur' => 'required',
            'id_ville' => 'required',
            'id_quartier' => 'required',
            'Adresse' => 'required',
            'extras' => 'required',
            'Position' => 'required',
            'surface' => 'required',
            'nbr_chambres' => 'required',
            'prix' => 'required',
            'Status' => 'required',
            'is_dispo' => 'required',
            'is_sponsorised' => 'required',
            'vues' => 'required',
        ]);
          $annonce_id=annonce::insertGetId([
                'Titre'=>$request->Titre, 
                'type_id'=>$request->type_id, 
                'id_promoteur'=>$request->id_promoteur, 
                'id_ville'=>$request->id_ville, 
                'id_quartier'=>$request->id_quartier,
                'Adresse'=>$request->Adresse,
                'extras'=>$request->extras,
                'Position'=>$request->Position,
                'surface'=>$request->surface,
                'nbr_chambres'=>$request->nbr_chambres,
                'prix'=>$request->prix,
                'Status'=>$request->Status,
                'is_dispo'=>$request->is_dispo,
                'is_sponsorised'=>$request->is_sponsorised,
                'vues'=>$request->vues
    
            ]);
            $image=$request->file('images');
            foreach($image as $item){
            $name_gen=hexdec(uniqid()).'.'.$item->getClientOriginalExtension();
            Image::make($item)->resize(500,500)->save('upload/annonces/'.$name_gen);
            $save_url='upload/annonces/'.$name_gen;
            $images=$save_url;
            AnnonceImage::insert([
              'annonce_id'=>$annonce_id,
              'image'=>$images,
              'created_at'=>Carbon::now(),
           ]);
          }
            return Redirect::to("promoteur/annonces")->with('success', 'l annonce est ajouté avec succes');
    
        }
        public function AnnonceShow($id){
            $annonce=Annonce::find($id);
            $annonceImages=AnnonceImage::where('annonce_id',$id)->get();
            $quartier=Quartier::all();
            $ville=Ville::all();
            $user=User::where('id',auth::user()->id)->get();
            return view('promoteur.mains-promoteur.annonces.edit',compact('annonce','annonceImages','ville','quartier','user'));
        }
        public function annonceUpdate(Request $request){
             $annonce_id=$request->id;
            annonce::findOrFail($annonce_id)->update([
              'Titre' => $request->Titre,
              'type_id' => $request->type_id,
              'id_promoteur' =>$request->id_promoteur,
              'id_ville' =>$request->id_ville,
              'id_quartier' => $request->id_quartier,
              'extras' => $request->extras,
              'Position' => $request->Position,
              'surface' => $request->surface,
              'nbr_chambres' => $request->nbr_chambres,
              'prix' => $request->prix,
              'Status' => $request->Status,
              'is_dispo' => $request->is_dispo,
              'is_sponsorised' => $request->is_sponsorised,
              'vues' => $request->vues,
        
              ]);
              return Redirect::to("promoteur/annonces")->with('success', 'l annonce est modifier avec succes');
            }
           
        public function annonceImagesUpdate(Request $request){
            $imgs=$request->images;
            foreach($imgs as $id=>$img){
            $image=AnnonceImage::findOrfail($id);
            unlink($image->image);
            $make_gen=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(500,500)->save('upload/annonces/'.$make_gen);
            $save='upload/annonces/'.$make_gen;
            AnnonceImage::where('id',$id)->update([
              'image'=>$save,
              'updated_at'=>Carbon::now(),
            ]);
    
          }
          return Redirect::to("promoteur/annonces")->with('success', 'l annonce est modifier avec succes');
    
        }
    
        public function  deleteannonce($id){
            $annonce=annonce::findOrFail($id);
            $images=AnnonceImage::where('annonce_id',$annonce)->get();
            foreach($images as $imgs){
            unlink($imgs->image);
            AnnonceImage::findOrfail($imgs)->delete();
          }
            annonce::findOrFail($id)->delete();
            return Redirect::to("promoteur/annonces")->with('success', 'l annonce est supprimé avec succes');
            
          }
        public function deleteImages($id){
            $oldimg=AnnonceImage::findOrFail($id);
            unlink($oldimg->image);
            AnnonceImage::findOrFail($id)->delete();
            
            return Redirect::to("promoteur/annonces")->with('success', 'les images sont supprimé avec succes');
    
          }
}