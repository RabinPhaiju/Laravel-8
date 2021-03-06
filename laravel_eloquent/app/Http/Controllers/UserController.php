<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Post;
use App\Models\Role;

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

    // One to Many
    public function getOneToMany()
    {
        $user = User::find(1)->posts;

        if (count($user) > 0) {
            return view('oneToMany', ['users' => $user]);
        }
        return view('oneToMany', ['users' => []]);
    }

    public function insertOneToMany(Request $req)
    {
        $user = User::find(1);
        $post = new Post(['title' => $req->title, 'body' => $req->body]);
        $user->posts()->save($post);
        return redirect('oneToMany');
    }

    public function updateOneToMany(Request $req)
    {
        $user = User::find(1);
        $post = Post::find($req->id);
        if ($post) {

            $user->posts()->where('id', $req->id)->update(['title' => $req->title, 'body' => $req->body]);
        }

        return redirect('oneToMany');
    }

    public function deleteOneToMany($id)
    {
        $user = User::find(1);
        // $user->posts()->where('user_id', 1)->delete(); // delete all posts related to user_id
        $user->posts()->where('id', $id)->delete(); // delete post with post_id

        return redirect('oneToMany');
    }

    // Many to Many
    public function getManyToMany()
    {
        $user = User::find(1);
        return view('manyToMany', ['users' => $user->roles]);
    }

    public function insertManyToMany(Request $req)
    {
        $user = User::find(1);

        $role = new Role(['name' => $req->role]);

        $user->roles()->save($role);
        return redirect('manyToMany');
    }

    public function updateManyToMany(Request $req)
    {
        $user = User::find(1);
        $roles = Role::find($user->id);
        if ($user->has('roles')) {
            foreach ($user->roles as $role) {
                if ($role->name == $roles->name) {
                    $role->name = $req->newRole;
                    $role->save();
                }
            }
        }
        return redirect('manyToMany');
    }

    public function deleteManyToMany($id)
    {
        $user = User::find(1);

        foreach ($user->roles as $role) {
            $role->where('id', $id)->delete();
        }

        return redirect('manyToMany');
    }
}
