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
                       <form method="post" action="/admin/members" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nama Member</label>
                                <input type="text" class="form-control" name="nama_member">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="laki-laki">
                                    <label class="form-check-label">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan">
                                    <label class="form-check-label">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label>Nomor hp</label>
                                <input type="number" class="form-control" name="nomor_hp">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control-file" name="foto_profil">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control-file" name="alamat">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="1">
                                    <label class="form-check-label">
                                        Aktif
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="0">
                                    <label class="form-check-label">
                                        Tidak aktif
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection