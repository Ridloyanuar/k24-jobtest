<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dataUsers()
    {
        $admins = User::where('is_admin', 1)->get();

        return view('admin.user.data', ['admins' => $admins]);
    }

    public function dataMembers()
    {
        $members = User::with('profile')->where('is_admin', 0)->orWhere('is_admin', null)->get();

        return view('admin.member.data', ['members' => $members]);
    }

    public function dataMembersJson()
    {
        $members = User::with('profile')->where('is_admin', 0)->orWhere('is_admin', null)->get();

        return response()->json($members, 200);
    }

    public function addMember()
    {
        return view('admin.member.add');
    }

    public function addAdmin()
    {
        return view('admin.user.add');
    }

    public function editMember($id)
    {
        $member = User::with('profile')->where('id', $id)->first();
        return view('admin.member.edit', ['member' => $member]);
    }

    public function editAdmin($id)
    {
        $admin = User::where('id', $id)->first();
        return view('admin.user.edit', ['admin' => $admin]);
    }

    public function adminEdited(Request $request, $id)
    {
        if ($request->has('password')) {
            if ($request->get('password') !== null) {
                if ($request->password != $request->password_confirmation) {
                    return redirect()->back()->with('error', 'password tidak sama');
                }
            }
        }

        $user = User::where('id', $id)->first();
        
        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        if ($request->has('password')) {
            if ($request->get('password') !== null) {
                $user->password = $request->password;
            }
        }
        $user->save();

        return redirect('admin/user');
    }

    public function adminDeleted($id)
    {
        $user = User::where('id', $id)->first();

        if ($user == null) {
            return response()->back();
        }

        $user->forceDelete();

        return redirect('admin/user');
    }

    public function memberDeleted($id)
    {
        $user = User::where('id', $id)->first();

        if ($user == null) {
            return response()->back();
        }

        $user->forceDelete();

        $profile = Profile::where('user_id', $id)->first();

        if ($profile == null) {
            return response()->back();
        }

        $profile->forceDelete();

        return redirect('admin/member');
    }

    public function memberEdited(Request $request, $id)
    {
        if ($request->has('password')) {
            if ($request->get('password') !== null) {
                if ($request->password != $request->password_confirmation) {
                    return redirect()->back()->with('error', 'password tidak sama');
                }
            }
        }
        

        $user = User::where('id', $id)->first();
        
        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        if ($request->has('password')) {
            if ($request->get('password') !== null) {
                $user->password = $request->password;
            }
        }
        $user->save();

        $profile_img = "";
        if ($request->has('foto_diri')) {
            $file = $request->file('foto_diri');
            $profile_img = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('profile'), $profile_img);
        } 

        $profile = Profile::where('user_id', $id)->first();
        if ($request->has('no_hp')) {
            $profile->no_hp = $request->no_hp;
        }

        if ($request->has('tanggal_lahir')) {
            $profile->tanggal_lahir = $request->tanggal_lahir;
        }

        if ($request->has('jenis_kelamin')) {
            $profile->jenis_kelamin = $request->jenis_kelamin;
        }

        if ($request->has('no_ktp')) {
            $profile->no_ktp = $request->no_ktp;
        }

        if ($request->has('foto_diri')) {
            if ($request->get('foto_diri') !== null) {
                $profile->foto_diri = $profile_img;
            }
        }

        $profile->save();

        return redirect('admin/member');
    }

    public function memberAdded(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'password_confirmation' => 'required|string',
            'no_hp' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'no_ktp' => 'required|string',
            'foto_diri' => 'required|mimes:jpeg,png,jpg|max:10240'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'password tidak sama');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = null;
        $user->save();

        $profile_img = "";
        if ($request->has('foto_diri')) {
            $file = $request->file('foto_diri');
            $profile_img = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('profile'), $profile_img);
        } 

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->no_hp = $request->no_hp;
        $profile->tanggal_lahir = $request->tanggal_lahir;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->no_ktp = $request->no_ktp;
        $profile->foto_diri = $profile_img;
        $profile->save();

        return redirect('admin/member');
    }

    public function adminAdded(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'password_confirmation' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'password tidak sama');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->is_admin = 1;
        $user->save();

        return redirect('admin/user');
    }
}
