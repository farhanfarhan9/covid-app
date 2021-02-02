<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }
    public function show($id)
    {
    	$user = User::whereId($id)->first();
    	if ($user) {
    		return view('user.profile.show')->withUser($user);
    	}else{
    		dd('error');
    	}
    }

    public function edit($id)
    {
    	$user = User::whereId($id)->first();
        return view('user.profile.edit')->withUser($user);
    	
    }

    public function update(Request $request, $id)
    {
        // dd('he');
        $new_user = \App\User::findOrFail($id);
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->jenis_kelamin = $request->get('jenis_kelamin');
        $new_user->tanggal_lahir = $request->get('tanggal_lahir');
        $new_user->tempat_lahir = $request->get('tempat_lahir');
        $new_user->alamat = $request->get('alamat');
        $new_user->nomor_hp = $request->get('nomor_hp');
        if ($request->file('foto_profil')) {
            $file = $request->file('foto_profil')->store('member','public');
            $new_user->foto_profil = $file;
        };
        $new_user->save();
        return  redirect()->back();
    }
}