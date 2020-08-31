<?php

namespace App\Http\Controllers\YouthDbms;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class UserController extends Controller
{
    public function index(){
        try {
            $users = User::all();
            $permissions = DB::table('permissions')->get();
            $model = DB::table('model_has_permissions')->get();
            return view('Admin.users', compact('users','permissions','model'));
        } catch (\Exception $ex) {
            return redirect()->back()->with("error","Something went wrong");
        }
    }

    public function store(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'email'=> 'email|unique:users|required',
            'name'=> 'required'
        ]);
        try {
            $user = User::create(['email'=>$request->email,'name'=> $request->name,'created_at'=>now(),'updated_at'=>now(),'password'=>Hash::make(1234567)])->fresh();
            if(count($request->permissions)){
                foreach($request->permissions as $previledge){
                    DB::table('model_has_permissions')->insert(['permission_id'=>$previledge,'model_type'=>'App\User','model_id'=>$user->id]);
                }
            }
            return redirect()->back()->with("success","User created successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error","Something went wrong");
        }
    }

    public function update(Request $request){
        try {
            $model = DB::table('model_has_permissions')->where('model_id',$request->id)->delete();
            $user = User::find($request->id)->update(['email'=>$request->email,'name'=> $request->name]);

            if(count($request->permissions)){
                foreach($request->permissions as $previledge){
                    DB::table('model_has_permissions')->insert(['permission_id'=>$previledge,'model_type'=>'App\User','model_id'=>$request->id]);
                }
            }
            return redirect()->back()->with("success","User updated successfully");
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function delete_user($id){
        try {
            User::find($id)->delete();
            DB::table('model_has_permissions')->where('model_id',$id)->delete();
            return redirect()->back()->with("success","User deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error","Something went wrong");
        }
    }
}
