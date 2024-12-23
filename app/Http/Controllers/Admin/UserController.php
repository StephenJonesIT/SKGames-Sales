<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::where('email', 'not like', '%admin%')->orderBy('created_at','DESC')->paginate(5);
        return view('admin.user.index',[
            'users'=>$users
        ]);
    }

    public function create(){
        return view ('admin.user.create');
    }

    public function store(Request $request) { 
        $rules = [
            'name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('admin.users.create')->withInput()->withErrors($validator);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('admin.users.index')->with('success','Product added successfully.');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit',[
            'user'=>$user
        ]);

    }

    public function update($id,Request $request){

        $user = User::findOrFail($id);

        $rules = [
          'name' => 'required|string|max:255', 
          'email' => 'required|string|email|max:255',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('admin.users.edit',$user->id)->withInput()->withErrors($validator);
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.users.index')->with('success','User updated successfully.');
    }

    public function destroy($id){
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users.index')->with('success','User deleted successfully.');
    }
}
