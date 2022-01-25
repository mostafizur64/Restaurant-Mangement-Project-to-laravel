<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chefs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            return redirect('redirects');
        } else {

            $data = food::all();
            $data2 = Chefs::all();
            return view('home', compact('data', 'data2'));
        }
    }

    public function redirects(Request $req)
    {
        $data = food::all();
        $data2 = Chefs::all();
        $total = Cart::all();
        $userType = Auth::user()->usertype;

        if ($userType == '1') {
            return view('admin.admin');
        } else {

            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();


            return view('home', compact('data', 'data2', 'count'));
        }
    }
    public function addtocard(Request $req, $id)
    {
        if (Auth::id()) {
            $user_id = Auth::id();
            $foodid = $id;
            $quantity = $req->quantity;
            //  dd($user_id, $foodid, $quantity);
            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->food_id  = $foodid;
            $cart->quantity = $quantity;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }
    public function showcart(Request $req, $id)
    {
        $count = Cart::where('user_id', $id)->count();
        if (Auth::id() == $id) {
            $data2 = Cart::select('*')->where('user_id', '=', $id)->get();
            $data = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
            return view('showcart', compact('count', 'data', 'data2'));
        } else {
            return redirect()->back();
        }
    }
    public function removecart($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orderconfirm(Request $req)
    {
        foreach ($req->foodname as $key => $foodname) {
            $data = new Order();
            $data->foodname = $foodname;
            $data->price = $req->price[$key];
            $data->quantity = $req->quantity[$key];
            $data->name = $req->name;
            $data->number = $req->number;
            $data->address = $req->address;
            $data->save();
        }
        return redirect()->back();
    }
}
