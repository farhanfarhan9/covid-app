<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.members.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_member = new \App\User;
        // dd($request->all());
        $new_member->name = $request->get('nama_member');
        $new_member->jenis_kelamin = $request->get('jenis_kelamin');
        $new_member->tempat_lahir = $request->get('tempat_lahir');
        $new_member->tanggal_lahir = $request->get('tanggal_lahir');
        $new_member->email = $request->get('email');
        $new_member->password = bcrypt($request->get('password'));
        $new_member->nomor_hp = $request->get('nomor_hp');
        if ($request->file('foto_profil')) {
            $file = $request->file('foto_profil')->store('member','public');
            $new_member->foto_profil = $file;
        };
        $new_member->alamat = $request->get('alamat');
        $new_member->status = $request->get('status');
        $new_member->save();
        return redirect('/admin/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $member)
    {
        return view('admin.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \App\User::findOrFail($id);
        $user->name = $request->get("nama_member");
        $user->jenis_kelamin = $request->get('jenis_kelamin');
        $user->tempat_lahir = $request->get('tempat_lahir');
        $user->tanggal_lahir = $request->get('tanggal_lahir');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->nomor_hp = $request->get('nomor_hp');
        if ($request->file('foto_profil')) {
            if($user->foto_profil && file_exists(storage_path('app/public/' . $user->foto_profil))){
                \Storage::delete('public/'.$user->foto_profil);
            }
            $file = $request->file('foto_profil')->store('member','public');
            $user->foto_profil = $file;
        };
        $user->alamat = $request->get('alamat');
        $user->status = $request->get('status');
        $user->save();
        return redirect('/admin/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
