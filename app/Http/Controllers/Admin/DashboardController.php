<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;
use  App\Models\Event;
class DashboardController extends Controller
{

    // public function index()
    // {
    //     $event = Event::all();
    //     return view('/dashboard')->with('event',$event);
        
    // }

    public function dashboard(){
        $event = Event::all();
        return view('admin.dashboard')->with('event',$event);
        return view('admin.dashboard');
    }

    

    public function registered(){
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this action");
        }
        $users = User::all();
        return view('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request, $id){
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cannot do this action");
        }
        
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);
    }

    public function registerupdate(Request $request, $id){
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cannot do this action");
        }
        $users = User::find($id);
        $users->username=$request->input('username');
        $users->role =$request->input('role');
        $users->update();

        return redirect('/role-register')->with('status','Your Data is Updated');
    }

    public function registerdelete($id){
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cannot do this action");
        }
        
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('status','Your Data is Deleted');
    }
}
