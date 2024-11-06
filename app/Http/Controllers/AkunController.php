<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AkunController extends Controller
{   
    
    public function login(){

        return view('login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);
        if(Auth::attempt($user)) {
            return redirect()->route('home.page');
        }else {
            return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba kembali dengan data yang benar!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda telah logout!');
    }

    public function index()
    {
        $users = User::all();
        return view("kelola.index",compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelola.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|string|in:admin,user',
        ]);

        $generatedPassword= Str::random(12);

        User::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($generatedPassword),
            'role' => $validatedData['role'],
        ]);

        return redirect()->back()->with('success', 'Berhasil Mengubah Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $users = User::find($id);
        return view('kelola.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ]);

        User::where('id', $id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('kelola.home')->with('success', 'Berhasil Mengubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data');
    }
}
