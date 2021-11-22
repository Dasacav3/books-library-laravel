<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function main()
    {
        $books = DB::table('books')
            ->join('authors', 'books.id_author', '=', 'authors.id')
            ->join('topics', 'books.id_topic', '=', 'topics.id')
            ->select('books.*', 'authors.full_name', 'topics.name')
            ->get();
        return view('index', ['books' => $books]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function loginindex()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function createUser(Request $request)
    {

        try {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
        } catch (\Exception $e) {
            session()->flash('error', 'La información ingresada es invalida');
            return view('register');
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        $user->save();

        session()->flash('success', 'Usuario registrado satisfactoriamente');
        return view('login');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')->where('email', $request->email)->get()->first();

        if (password_verify($request->password, $user->password)) {
            session(['user' => $user->id]);
            return redirect(url('/home'));
        } else {
            session()->flash('error', 'Usuario o contraseña incorrectos');
            return redirect(url('/login'));
        }
    }

    public function profile()
    {
        return view('profile.index');
    }

    public function logout()
    {
        session()->flush();
        return redirect(url('/login'));
    }
}
