<?php

namespace App\Http\Controllers;
use App\Models\chambre;
use Illuminate\Http\Request;

class chambrecontroller extends Controller
{

    //
    public function formchambre() {
        return view("formchambre"); 
           }  

           public function meschambre() {
            $meschambre=chambre::orderBy("created_at","DESC")->get();
    return view("meschambre",compact ("meschambre")); 
       } 

   
           public function storechambre(Request $request) {

            $chambre= new chambre();
            $request->validate([
              'type'=>'required',
              'statut'=>'required',
              'douche'=>'required',
              'netoyer'=>'required',
              'toilette'=>'required',
              'numero'=>'required',
              'etage'=>'required',
              'image'=>'required',
              'bain'=>'required',
              'tele'=>'required',
              'capacite'=>'required',
              'tarif'=>'required',
              'clim'=>'required',
              'message'=>'required',
            ]); 
            $chambre-> type= $request->type;
            $chambre-> statut=$request->statut;
            $chambre-> etage=$request->etage;
            $chambre-> numero=$request->numero;
            $chambre-> douche=$request->douche;
            $chambre-> toilette=$request->toilette;
            $chambre-> netoyer=$request->netoyer;
            $chambre-> image=$request->image;
            $chambre-> bain=$request->bain;
            $chambre-> tele=$request->tele;
            $chambre-> capacite=$request->capacite;
            $chambre-> tarif=$request->tarif;
            $chambre-> clim=$request->clim;
            $chambre-> message=$request->message;
            if($request->hasfile("image")){
                $file=$request->file("image");
                $extension=$file->getClientOriginalExtension();

                 $filename=time().'.'. $extension;
                $file->move('public/assets',$filename);
             $chambre->image=$filename;
                 
                    } else{
                     return $request;
                     $chambre->image= '';
                    }
             
              $cham=$chambre->save();
      
            if($cham){
              return back()->with('success','la chambre est bien enregistrer ');
            }
            else{
                 return back()->with('fail','erreur!');
            }
                     
            return redirect()-> back()->with('reservation réussi avec succes','vos donnes sont bien enregistrer');
              }   
          
}
