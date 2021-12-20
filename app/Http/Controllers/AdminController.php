<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function user(){
        $dados = user::all();
        return view("admin.users", compact("dados"));
    }
//====================================================================

    public function deleteuser($id){
        $dados = user::find($id);
        $dados->delete();
        return redirect()->back();
    }
//====================================================================

    public function foodmenu(){
        
        return view("admin.foodmenu");
    }
    //
}
