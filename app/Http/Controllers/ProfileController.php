<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->where('id', session('user'))->get()->first();
        return view('profile.index', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::find(session('user'));
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        $user->last_name = $request->last_name;

        if ($request->password != null) {
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        }

        if ($request->image != null) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = $request->file('image')->hashName();

            $request->file('image')->storeAs('public/profile', $imageName);

            Storage::delete('public/profile/' . $user->image);
            $user->image = $imageName;
        }

        $user->save();

        return redirect('/profile');
    }
}
