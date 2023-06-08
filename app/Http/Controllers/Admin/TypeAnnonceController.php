<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TypeAnnonce;
use Illuminate\Support\Facades\Redirect;
class TypeAnnonceController extends Controller
{
    public function Typeannonce(){
        $Type=TypeAnnonce::all();
        return view('admin.mains-admin.TypeAnnonce.list',compact('Type'));
    }
    public function ShowAddType(){
        return view('admin.mains-admin.TypeAnnonce.add');
    }
    public function TypeAdd(Request $request ){
        $validated = $request->validate([
            'Titre' =>'required',
        ]);
        TypeAnnonce::create([
            'Titre'=>$request->Titre,
        ]);
        return Redirect::to("admin/Typeannonce")->with('success', 'le type est ajouté avec succes');
    }
    public function TypeShow($id){
        $Type=TypeAnnonce::find($id);
        return view('admin.mains-admin.Typeannonce.edit',compact('Type'));
    }
    public function TypeUpdate(Request $request ,$id){
        $idType=$request->id;
        Typeannonce::findOrFail($idType)->update([
            'Titre' => $request->Titre,
            ]);
        return Redirect::to("admin/Typeannonce")->with('success', 'le type d annonce  est modifier avec succes');
        
    }
    public function deletetype($id){
        $Typeannonce=TypeAnnonce::findOrFail($id);
        TypeAnnonce::findOrFail($id)->delete();
        return Redirect::to("admin/Typeannonce")->with('success', 'le type d annonce est supprimé avec succes');
    }
}