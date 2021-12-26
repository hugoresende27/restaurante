<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Card;
use App\Models\Order;

class HomeController extends Controller
{
//====================================================================
    public function index(){
        
        $data = food::all();

        $data2 = Foodchef::all();

        $user_id=Auth::id();

        $count=card::where('user_id',$user_id)->count();

        return view ("home", compact("data","data2","count"));
    }

//====================================================================
    public function redirects(){//vai ler na DB o campo usertype

        $data = food::all();

        $data2 = Foodchef::all();

        $usertype = Auth::user() -> usertype;

        if ($usertype == '1'){
            
            return view('admin.adminhome');
        }else {
            $user_id=Auth::id();

            $count=card::where('user_id',$user_id)->count();

            return view('home',compact("data","data2","count"));
        }
    }

//====================================================================

    public function addcard(Request $request, $id){
        if (Auth::id()) //Auth::id() para verificar se user está logado
        {

            $user_id=Auth::id();

            $foodid=$id;

            $qtd = $request->qtd;
            

            $card = new card;

            $card->user_id=$user_id;

            $card->food_id=$foodid;

            $card->qtd=$qtd;

            $card->save();

            //dd($user_id);

            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }
//====================================================================

    public function showcard(Request $request, $id){

        $count=card::where('user_id',$id)->count();

        $data2=card::select('*')->where('user_id','=', $id)->get();

        $data = card::where('user_id',$id)->join('food', 'cards.food_id', '=', 'food.id')->get();

        return view ('showcard',compact ("count","data","data2"));
    }

//====================================================================

    public function remove( $id){
        $dados = card::find($id);
        $dados->delete();
        return redirect()->back();
    }

//====================================================================

    public function orderconfirm(Request $request){

        foreach($request->foodname as $key => $foodname){

            $data = new order;

            $data->foodname=$foodname;
            $data->price=$request->price[$key];
            $data->qtd=$request->qtd[$key];

            $data->name=$request->name;
            $data->address=$request->address;
            $data->phone=$request->phone;

            $data->save();

            
        }
        return redirect()->back();
    }
}
