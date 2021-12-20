<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Food;

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
//====================================================================

    public function uploadfood(Request $request){
        
        $dados = new food;
        $image = $request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('foodimage',$imagename);

            $dados->image = $imagename;

            $dados->title=$request->title;
            $dados->price=$request->price;
            $dados->description=$request->description;
            $dados->save();

            return redirect()->back();
    }
    //
}
