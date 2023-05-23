<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        $id=Auth::user()->id;
        $userData=User::find($id);
        // dd($userData);
        return view('user.userprofile',compact('userData'));
    }
    public function edit()
    {
        $id=Auth::user()->id;
        $userData=User::find($id);
        // dd($userData);
        return view('user.editprofile',compact('userData'));
    }
    public function update(Request $request)
    {
        $id=Auth::user()->id;
        $userData=User::find($id);
        
        $userData->name=$request->name;
        $userData->email=$request->email;
      
        $userData->save();
        // dd($userData);
        session()->flash('message','Profile was edited successfully');
        return redirect()->route('profile');
        
    }
    public function editPass()
    {
        $id=Auth::user()->id;
        $userData=User::find($id);
        // dd($userData);
        return view('user.editpass');
    }
    public function updatePass(PasswordRequest $request)
    {
        $id=Auth::user()->id;
        $userData=User::find($id);        
        $validation = $request->validated();
        if(Hash::check($request->oldpassword,$request->newpassword))
        {
            $userData->password=bcrypt($request->newpassword);
            $userData->save();
             // dd($userData);
            session()->flash('message','Password has already change');
            return redirect()->route('profile');
        }
        else
        {
            return back()->with('error','Old Password doesnot match');
        }      
    }
}
