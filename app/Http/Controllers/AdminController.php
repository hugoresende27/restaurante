<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Foodchef;

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
    public function reservation(Request $request){
    
        $data = new reservation;



        $data->name=$request->name;

        $data->email=$request->email;

        $data->phone=$request->phone;

        $data->guest=$request->guest;

        $data->date=$request->date;

        $data->time=$request->time;

        $data->message=$request->message;

        $data->save();

        return redirect()->back();
}

//====================================================================
public function viewreservation(){
    $data = reservation::all();
    return view("admin.adminreservation", compact("data"));
}

//====================================================================
public function viewchef(){
    
    return view("admin.adminchef");
}

//====================================================================
public function uploadchef(Request $request){
    
    $data = new foodchef;

    $image=$request->image;//gera nome random para imagem
    $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('chefimage',$imagename);

            $data->image = $imagename;

            $data->name =$request-> name;
            $data->speciality =$request-> speciality;

            $data->save();
            return redirect()->back();
}
}