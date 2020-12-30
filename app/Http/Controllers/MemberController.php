<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return $members;
        // return view('admin.members.index', compact('members'));
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
        $new_member = new \App\Member;
        // dd($request->all());
        $new_member->nama_member = $request->get('nama_member');
        $new_member->jenis_kelamin = $request->get('jenis_kelamin');
        $new_member->tempat_lahir = $request->get('tempat_lahir');
        $new_member->tanggal_lahir = $request->get('tanggal_lahir');
        $new_member->email = $request->get('email');
        $new_member->password = $request->get('password');
        $new_member->nomor_hp = $request->get('nomor_hp');
        if ($request->file('foto_profil')) {
            $file = $request->file('foto_profil')->store('member','public');
            $new_member->foto_profil = $file;
        };
        $new_member->alamat = $request->get('alamat');
        $new_member->status = $request->get('status');
        $new_member->save();
        return "data behasil masuk";
        // return redirect('/admin/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        // dd($member);
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
        $member = \App\Member::findOrFail($id);
        $member->nama_member = $request->get("nama_member");
        $member->jenis_kelamin = $request->get('jenis_kelamin');
        $member->tempat_lahir = $request->get('tempat_lahir');
        $member->tanggal_lahir = $request->get('tanggal_lahir');
        $member->email = $request->get('email');
        $member->password = $request->get('password');
        $member->nomor_hp = $request->get('nomor_hp');
        if ($request->file('foto_profil')) {
            if($member->foto_profil && file_exists(storage_path('app/public/' . $member->foto_profil))){
                \Storage::delete('public/'.$member->foto_profil);
            }
            $file = $request->file('foto_profil')->store('member','public');
            $member->foto_profil = $file;
        };
        $member->alamat = $request->get('alamat');
        $member->status = $request->get('status');
        $member->save();
        return 'data berhasil diedit';
        // return redirect('/admin/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return 'data berhasil dihapus';
        // return redirect('/admin/members');
    }
}
