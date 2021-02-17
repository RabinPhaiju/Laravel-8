<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['data'=>$users],200);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }else if($request->password==$request->password_confirmation){
            $data = $request->all();
            $data['password']=bcrypt($request->password);
            $data['verified']=User::UNVERIFIED_USER;
            $data['verification_token']= User::generateVerificationCode();
            $data['admin']=User::REGULAR_USER;

            $user = User::create($data);
        
            if($user){
                return response()->json(['data'=>$user],201);
            }else{
                return ['data'=>'user register fail.'];
            }
        }else{
            return ['data'=>'Password error'];
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['data'=>$user],200) ;
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $rules =[
            'email'=> 'email|unique:users,email,'.$user->id,
            'password'=>'min:6|confirmed',
            'admin'=> 'in:'. User::ADMIN_USER.','.User::REGULAR_USER,
        ];
        if ($request->has('name')){
            $user->name = $request->name;
        }
        if($request->has('email') && $user->email != $request->email){
            $user->verified = User::UNVERIFIED_USER;
            $user->verfication_token = User::generateVerificationCode();
            $user->email = $request->email;
        }
        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }
        if($request->has('admin')){
            if(!$user->isVerified()){
                return response()->json(['error'=>'Only verfied users can modify the admin field',
                'code'=>409],409);
            }
            $user->admin = $request->admin;
        }
        if(!$user->isDirty()){
            return response()->json(['error'=>'You need to specify a different value to update',
                'code'=>422],422);
        }
        $user->save();
        return response()->json(['data'=>$user],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['data'=>$user],200);
    }
}
