<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Card;

class HomeController extends Controller
{
//====================================================================
    public function index(){
        
        $data = food::all();

        $data2 = Foodchef::all();

        return view ("home", compact("data","data2"));
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

            dd($user_id);

            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

}
