<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function Age(){
        return view('age.age');
    }
    public function Processing(Request $request){
        session(['user_age'=>$request->age]);
        return redirect('/checkAge');
    } 
        
    

}
