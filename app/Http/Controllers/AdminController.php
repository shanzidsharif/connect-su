<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Runner\validate;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }
    public function adminLogin()
    {
        return view('admin.dashboard.admin-login');
    }
    public function adminProfile()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
//        return $user;
        return view('admin.dashboard.admin-profile',[
            'profile' => $user,
        ]);
    }
    public function adminProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        $admin->suid = $request->suid;
        $admin->nid = $request->nid;
        $admin->address = $request->address;

        if($request->file('image'))
        {
            $image = $request->file('image');
            @unlink($admin->image);
            $imageNewName = 'admin-profile'.date('YmdHi').'.'.$image->getClientOriginalName();
            $directory = 'backend/upload/admin/profile-image/';
            $image->move($directory, $imageNewName);
            $imageUrl = $directory.$imageNewName;
            $admin->image = $imageUrl;
        }
        $admin->save();
        $alert = array(
          'message'     => 'Admin Profile Updated Successfully',
          'alert-type'  => 'success'
        );

        return redirect()->back($alert);

    }


    public function adminPassword()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
//        return $user;
        return view('admin.dashboard.admin-change-password',[
            'profile' => $user,
        ]);
    }
    public function adminChangePassword(Request $request)
    {
//        return $request;

        $request->validate([
           'old_password' => 'required',
           'new_password' => 'required|confirmed',
        ]);
        if( !Hash::check( $request->old_password, auth::user()->password))
        {
            $notification = array(
                'message' => 'Old Password Does Not Match',
               'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Change Successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }



    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
