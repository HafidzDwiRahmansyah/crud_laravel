<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\hash;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function data()
    {
        $user = User::all();
        return view('home', ['user' => $user]);
    }

    public function tambah(Request $request)
    {
        // $request->validate([
        //     'email' => 'required',
        //     'username' =>  'required',
        // ], [
        //     'email' => '',
        // ]);

        $user = new User;
        $user->username = $request->username;
        $user->name = $request->nama;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect('/')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id, Request $request)
    {

        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->nama;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect('/')->with('success', 'Data berhasil di update');
    }

    public function hapus($id)
    {
        $user = User::where('id', $id)->delete();
        return redirect('/')->with('success', 'Data berhasil dihapus');
    }
}
