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
        
        $dados = food::all(); //food para tabela food na BD
        return view("admin.foodmenu", compact("dados"));
    }
//====================================================================
    public function update(Request $request,$id){
        $data = food::find($id);

        $image = $request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('foodimage',$imagename);

            $data->image = $imagename;

            $data->title=$request->title;
            $data->price=$request->price;
            $data->description=$request->description;
            $data->save();

            return redirect()->back();
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

//====================================================================

    public function deletemenu($id){
        $dados = food::find($id);
        $dados->delete();
        return redirect()->back();
}
//====================================================================
    public function updateview($id){
        $data = food::find($id);
        return view("admin.updateview", compact("data"));
}

//====================================================================
    //
}
