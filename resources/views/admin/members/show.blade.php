@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">Beranda Admin</div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 py-2">
                        <div class="col pb-3">
                            <a href="{{ route('members.index') }}" class="pl-2 text-decoration-none"><i class="fas fa-users fa-lg"></i> Member</a>  
                        </div>
                        <div class="col">
                            <a href="#" class="pl-2 text-decoration-none"><i class="fas fa-users fa-lg"></i> Pertanyaan</a>  
                        </div>
                    </div>
                    <div class="col-sm-9 border-left">
                        <h4>{{ $member->nama_member }}</h4>
                        <p>Jenis Kelamin : {{ $member->jenis_kelamin }}</p>
                        <p>Tempat Lahir : {{ $member->tempat_lahir }}</p>
                        <p>Tanggal Lahir : {{ $member->tanggal_lahir }}</p>
                        <p>Email : {{ $member->email }}</p>
                        <p>Password : {{ $member->password }}</p>
                        <p>Nomor hp : {{ $member->nomor_hp }}</p>
                        <p>
                            Foto Profil <br>
                            <img src="{{ asset('storage/'.$member->foto_profil) }}" alt="" width="200px">
                        </p>
                        <p>Alamat : {{ $member->alamat }}</p>
                        <p>Status : {{ $member->status== 1 ? 'Aktif':'Tidak Aktif' }}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection