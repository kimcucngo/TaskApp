<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        // dd($request);
        $id=Auth::user()->id;
        $userData=User::find($id);
        
        $userData->name=$request->name;
        $userData->email=$request->email;

        if($request->file('avatar'))
        {
            $file=$request->file('avatar');
            // dd($file);
            $file_name=Storage::put('/public',$file);
            // dd($file_name);
            $url=Storage::url($file_name);
            // dd($url);
            $userData->avatar=$url;
        }
        $userData->save();
        // dd($userData);
        session()->flash('message','Profile has been edited successfully');
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
    public function logoutPage(Request $request): RedirectResponse
    {
        dd($request);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
