<?php

namespace App\Http\Controllers;
use App\Models\reservation;
use App\Models\client;
use App\Models\chambre;

use Illuminate\Http\Request;

class accueilcontroller extends Controller
{
    //
    public function accueil() {
        return view("accueil"); 
           }   

           public function shop() {
            return view("shop"); 
               }   
               public function apartuser() {
                  $meschambre=chambre::orderBy("created_at","DESC")->get();
                  $mesclient=client::orderBy("created_at","DESC")->get();
                return view("apartuser",compact ("meschambre","mesclient")); 
                   }   
                   public function tableuser() {
                    return view("tableuser"); 
                       } 
                       public function bususer() {
                        return view("bususer"); 
                           }   
                  
      
           public function DBadmin(){
            $reservations=reservation::orderBy("created_at","DESC")->get();
            return view ("DBadmin",compact ("reservations"));
                 
           }
  
           public function reservationtable(){
            //$reservations=reservation::orderBy("created_at","DESC")->get();
            $reservations=reservation::select()->where("choix","table a manger")->orderBy("created_at","DESC")->get();
            $meschambre=chambre::orderBy("created_at","DESC")->get();
            $mesclient=client::orderBy("created_at","DESC")->get();

            return view ("reservationtable",compact("reservations","meschambre","mesclient"));
                 
           }

           public function mesresapart(){
            //$reservations=reservation::orderBy("created_at","DESC")->get();
            $reservations=reservation::select()->where("choix","appartement")->orderBy("created_at","DESC")->get();
            return view ("mesresapart",compact("reservations"));
                 
           }
  

           public function admin() {
            return view("admin"); 
               }   
               public function heder() {
                return view("heder"); 
                   }   
           

                   public function reservation() {
                    $meschambre=chambre::orderBy("created_at","DESC")->get();
                    $mesclient=client::orderBy("created_at","DESC")->get();
                    return view("reservation",compact ("mesclient","meschambre")); 
                       }  
                       
                       public function resdash() {
                        $meschambre=chambre::orderBy("created_at","DESC")->get();
                        $mesclient=client::orderBy("created_at","DESC")->get();
                        return view("DBadmin",compact ("mesclient","meschambre")); 
                           } 
               
                       //ajou diplome
                public function storereservation(Request $request) {

                  $reservation= new reservation();
                  $request->validate([
                    'client'=>'required',
                    'nom'=>'required',
                    'chambre'=>'required',
                    'datedeb'=>'required',
                    'datefin'=>'required',
                    'phone'=>'required',
                    'message'=>'required',
                    'heur'=>'required',
                    'choix'=>'required',
                    'email'=>'required',

                    
            
                  ]);
                  $reservation-> client= $request->client;
                  $reservation-> nom= $request->nom;
                  $reservation-> chambre= $request->chambre;               
                  $reservation-> datedeb=$request->datedeb;
                  $reservation-> datefin=$request->datefin;
                  $reservation-> email=$request->email;
                  $reservation-> choix=$request->choix;
                  $reservation-> heur=$request->heur;
                  $reservation-> message=$request->message;
                  $reservation-> phone=$request->phone;


                    $res=$reservation->save();
            
                  if($res){
                    return back()->with('success','reservation réussi avec succes ');
            
                  }
                  else{
                       return back()->with('fail','erreur!');
                  }
            
                 
                   
            
                  
                  return redirect()-> back()->with('reservation réussi avec succes','vos donnes sont bien enregistrer');
               
            
                    }   
                
                
                
        
             
    
           

}