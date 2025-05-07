<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users=User::orderBy('id','desc')->paginate(10);
        return view('admin.user.index',compact('users'));
    }
    public function create(){
        return view('admin.user.createOrEdit');
    }
    public function store(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'email'=>'unique:users,email',
                'password'=>'required|confirmed|min:6|max:12'
            ]);
            $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->save();
            return redirect()->route('user.index')->with('success','User created');
        }catch(Exception $exception){
            return redirect()->route('user.create')->with('error',$exception->getMessage());
        }
    }
    public function edit($user_ID){
        $userEdit=User::find($user_ID);
        return view('admin.user.createOrEdit',compact('userEdit'));
    }

    public function update(Request $request ,$user_ID){
        try{
            $request->validate([
                'name'=>'required',
                'email'=>'unique:users,email',
                'password'=>'confirmed|min:6|max:12'
            ]);
            $user = User::find($user_ID);
            $user->name=$request->name;
            $user->email=$request->email;

            if($request->filled('password')){
                $user->password=Hash::make($request->password);
            }
            $user->update();
            return redirect()->route('user.index')->with('success','User updated');
        }catch(Exception $exception){
            return redirect()->route('user.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $user=User::find($request->user_id);
            $user->delete();
            return redirect()->route('user.index')->with('success','User Deleted');
        }catch(Exception $exception){
            return redirect()->route('user.index')->with('error',$exception->getMessage());
        }
    }
}
