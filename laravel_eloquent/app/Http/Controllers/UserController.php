<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;

class UserController extends Controller
{
    public function index()
    {
        $address = Address::get();
        if (count($address) > 0) {
            $user = User::find(1)->address->name;
            return view('oneToOne', ['users' => $user]);
        }
        return view('oneToOne', ['users' => 'empty']);
    }
    public function insertOneToOne(Request $req)
    {
        $user = User::find(1);
        $address = new Address(['name' => $req->address]);
        $user->address()->save($address);
        return redirect('oneToOne');
    }
    public function updateOneToOne(Request $req)
    {
        $address = Address::where('user_id', 1)->first();
        $address->name = $req->address;
        $address->save();
        return redirect('oneToOne');
    }

    public function deleteOneToOne()
    {
        $address = Address::where('user_id', 1)->first();
        if ($address) {
            $address->delete();
        }

        return redirect('oneToOne');
    }
}
