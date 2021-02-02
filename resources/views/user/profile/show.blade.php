@extends('layouts.app')
@section('content')
	<div class="container mt-2">
		<div class="row">
			<div class="col-sm-6 text-center">

				@if ($user->foto_profile && file::exists(public_path("/member/".$user->foto_profile)))
				    <img src="" alt="" />
				@else 
				    <img src="{{ asset('storage/'.$user->foto_profil) }}" height="200" width="200" class="rounded-lg" />
				@endif
				<p>Ganti foto profile</p>
			</div>
			<div class="col-sm-6">
				<h1>{{$user->name}} <a href="{{$user->id}}/edit" class="btn btn-success btn-sm">Edit Profil</a></h1>
				<p>{{$user->email}}</p>
				<p>{{$user->jenis_kelamin}}</p>
				<p>{{$user->nomor_hp}}</p>
				<p>{{$user->tanggal_lahir}}</p>
				<p>{{$user->tempat_lahir}}</p>
			</div>
		</div>
	</div>

@endsection