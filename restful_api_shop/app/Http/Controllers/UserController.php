<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\User;
use Validator;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->showAll($users);
    }

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
                return $this->showOne($user,201);
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
        $user = User::find($id);
        if($user){
            return $this->showOne($user);
        }else{
            return $this->errorResponse('User not found',404);
        }
    }

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
                return $this->errorResponse('Only verfied users can modify the admin field',409);
            }
            $user->admin = $request->admin;
        }
        if(!$user->isDirty()){
            return $this->errorResponse('You need to specify a different value to update',422);
        }
        $user->save();
        return $this->showOne($user);

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

        return $this->showOne($user);
    }
    public function verify($token){
        $user = User::where('verification_token',$token)->firstOrFail();

        $user->verified = User::VERIFIED_USER;
        $user->verification_token = null;

        $user->save();

        return $this->showMessage('The account has been verified succesfully');
    }
}
