<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;

        $member = User::with('profile')->where('id', $id)->first();
        return view('home', ['member' => $member]);
    }

    public function adminHome()
    {
        return view('admin.admin-home');
    }

    public function profilePanel()
    {
        return view('member.add-profile');
    }

    public function profileEdit()
    {
        $id = auth()->user()->id;

        $member = User::with('profile')->where('id', $id)->first();

        return view('member.edit-profile', ['member' => $member]);
    }

    public function profileEdited(Request $request)
    {
        $id = auth()->user()->id;

        $user = User::where('id', $id)->first();
        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
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
            $profile->foto_diri = $profile_img;
        }

        $profile->save();

        return redirect('home');
    }

    public function profileMember(Request $request)
    {
        $rules = [
            'no_hp' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'no_ktp' => 'required|string',
            'foto_diri' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $profile_img = "";
        if ($request->has('foto_diri')) {
            $file = $request->file('foto_diri');
            $profile_img = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('profile'), $profile_img);
        } 

        $profile = new Profile();
        $profile->user_id = auth()->user()->id;
        $profile->no_hp = $request->no_hp;
        $profile->tanggal_lahir = $request->tanggal_lahir;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->no_ktp = $request->no_ktp;
        $profile->foto_diri = $profile_img;

        $profile->save();

        return redirect('home');
    }
}
