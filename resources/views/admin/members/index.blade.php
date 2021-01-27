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
                        <a href="{{route('members.create')}}" class="btn btn-primary mb-3 float-left">Buat member baru</a>
                        <table id="table_id" class="text-center display table">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1 @endphp
                                @foreach($users as $member)
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>{{ $member->name}}</td>
                                    <td>{{ $member->email}}</td>
                                    <td><img src="{{ asset('storage/'.$member->foto_profil) }}" alt="" width="120px"></td>
                                    <td>
                                        <div class="btn-group ">
                                            <a href="{{ route('members.show', $member->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>

                                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-success mx-2"><i class="fas fa-pencil-alt"></i></a>

                                            <form method="post" action="{{ route('members.destroy', $member->id) }}">
                                            @csrf
                                            @method('DELETE')    
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>

                                    </td>
                                @php $no++; @endphp
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection