<?php

namespace App\Http\Controllers;
use App\Models\client;
use App\Models\reservation;
use Illuminate\Http\Request;

class clientcontroller extends Controller
{
    //
    public function formClient() {
        return view("formClient"); 
           }  
           

           public function heritad() {
            return view("heritad"); 
               } 
               
               public function mesclient() {
                $mesclient=client::orderBy("created_at","DESC")->get();
        return view("mesclient",compact ("mesclient")); 
           }   
      
           public function mesreservation() {
            $mesreservation=reservation::select()->where("choix","chambre a coucher")->orderBy("created_at","DESC")->get();
    return view("mesreservation",compact ("mesreservation")); 
       }   


               public function storeclient(Request $request) {

                $client= new client();
                $request->validate([
                  'nom'=>'required',
                  'prenom'=>'required',
                  'photo'=>'required',
                  'civil'=>'required',
                  'phone'=>'required',
                  'adress'=>'required',
                  'ville'=>'required',
                  'pays'=>'required',
                  'email'=>'required',
                ]); 
                $client-> nom= $request->nom;
                $client-> prenom=$request->prenom;
                $client-> photo=$request->photo;
                $client-> civil=$request->civil;
                $client-> email=$request->email;
                $client-> pays=$request->pays;
                $client-> ville=$request->ville;
                $client-> adress=$request->adress;
                $client-> phone=$request->phone;

                if($request->hasfile("photo")){
                    $file=$request->file("photo");
                     $extension=$file->getClientOriginalExtension();
                     $filename=time().'.'. $extension;
                    $file->move('public/assets',$filename);
                 $client->photo=$filename;
                     
                        } else{
                         return $request;
                         $client->image= '';
                        }
                 
                  $res=$client->save();
          
                if($res){
                  return back()->with('success','le cilent est bien enregistrer ');
                }
                else{
                     return back()->with('fail','erreur!');
                }
                         
                return redirect()-> back()->with('reservation réussi avec succes','vos donnes sont bien enregistrer');
                  }   
              
// delete client

public function deletecl(client $client){
           
          
  $client->delete();
  return back()->with('success','client supprimer avec succes!');
  
}
//delete reservation
public function deleteres(reservation $reservation){
                   
  $reservation->delete();
  return back()->with('success','client supprimer avec succes!');
  
}




        
   
}