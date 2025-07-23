<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table;
class tablecontroller extends Controller
{
    //
    public function formtable() {
        return view("formtable"); 
           } 

           public function mestable() {
            $mestable=table::orderBy("created_at","DESC")->get();
    return view("mestable",compact ("mestable")); 
       }   

           public function storetable(Request $request) {

            $table= new table();
            $request->validate([
              'capacite'=>'required',
              'tarif'=>'required',

            ]); 
            $table-> capacite= $request->capacite;
            $table-> tarif=$request->tarif;

            $ta=$table->save();
          
            if($ta){
              return back()->with('success','la table est bien enregistrer ');
            }
            else{
                 return back()->with('fail','erreur!');
            }
                     
            return redirect()-> back()->with('reservation réussi avec succes','vos donnes sont bien enregistrer');
              }   
}
