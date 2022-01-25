<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\USER;
use App\Models\Food;
use App\Models\Chefs;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class AdminController extends Controller
{
    function userlist()
    {
        $userdata = USER::all();
        return view('admin.user', compact('userdata'));
    }
    function Deleteuser($id)
    {
        $detetedata = USER::find($id);
        $detetedata->delete();
        return redirect('/user');
    }

    function Foodmenu()
    {
        if (Auth::id()) {
            $data = Food::all();
            return view('admin.foodmenu', compact('data'));
        } else {
            return redirect('login');
        }
    }
    function Uploadfood(Request $req)
    {
        $data = new Food;
        $image = $req->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $req->image->move('foodimage', $imagename);
        $data->image = $imagename;
        $data->title = $req->title;
        $data->price = $req->price;
        $data->description = $req->description;
        $data->save();
        return redirect()->back();
    }
    public function editfood($id)
    {
        $data = Food::find($id);
        return view('admin.editfood', compact('data'));
    }
    public function deletefood($id)

    {
        $val = Food::find($id);
        $val->delete();
        return redirect()->back();
    }
    function updatefood(Request $req, $id)
    {
        $data = Food::find($id);
        $image = $req->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $req->image->move('foodimage', $imagename);
            $data->image = $imagename;
        }

        $data->title = $req->title;
        $data->price = $req->price;
        $data->description = $req->description;
        $data->save();
        return redirect()->back();
    }

    function reservation(Request $req)
    {
        $data = new Reservation();
        $data->name = $req->name;
        $data->email = $req->email;
        $data->phonenumber = $req->phonenumber;
        $data->guest = $req->guest;
        $data->date = $req->date;
        $data->time = $req->time;
        $data->message = $req->message;
        $data->save();
        return redirect()->back();
    }
    public function viewreservation()
    {
        if (Auth::id()) {
            $data = Reservation::all();
            return view('admin.reservation', compact('data'));
        } else {
            return redirect('login');
        }
    }
    public function adminchefs()
    {
        $data = Chefs::all();
        return view('admin.adminchefs', compact('data'));
    }
    public function Uploadchefs(Request $req)
    {
        $data = new Chefs();
        $image = $req->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $req->image->move('chefsimage', $imagename);
        $data->image = $imagename;

        $data->name = $req->name;
        $data->speciality = $req->speciality;
        $data->save();
        return redirect()->back();
    }
    public function editchef($id)
    {
        $data = Chefs::find($id);
        return view('admin.editchef', compact('data'));
    }
    public function updatechef(Request $req, $id)
    {
        $data = Chefs::find($id);
        $image = $req->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $req->image->move('chefsimage', $imagename);
            $data->image = $imagename;
        }

        $data->name = $req->name;
        $data->speciality = $req->speciality;
        $data->save();
        return redirect()->back();
    }
    public function deletechef($id)
    {
        $data = Chefs::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function order()
    {
        $data = Order::all();
        return view('/admin.order', compact('data'));
    }
    public function search(Request $req)
    {

        $search = $req->search;
        $data = Order::where('name', 'like', '%' . $search . '%')
            ->orwhere('foodname', 'like', '%' . $search . '%')
            ->get();
        return view('/admin.order', compact('data'));
    }
}
