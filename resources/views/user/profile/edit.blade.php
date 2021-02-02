@extends('layouts.app')
@section('content')
	<div class="container my-3 ">
		<div class="row">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-7">
                <form method="post" action="/member/{{$user->id}}" enctype="multipart/form-data">

					@csrf
                    @method('put')

					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" class="form-control" name="name" value="{{$user->name}}">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" value="{{$user->email}}">
					</div>
					<div class="form-group">
						<label for="">Nomor Hp</label>
						<input type="text" class="form-control" name="nomor_hp" value="{{$user->nomor_hp}}">
					</div>
					<div class="form-group">
						<label for="">Tempat Lahir</label>
						<input type="text" class="form-control" name="tempat_lahir" value="{{$user->tempat_lahir}}">
					</div>
					<div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="{{$user->tanggal_lahir}}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="laki-laki" {{ ($user->jenis_kelamin=="laki-laki")? "checked" : ""}}>
                            <label class="form-check-label">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan" {{ ($user->jenis_kelamin=="perempuan")? "checked" : ""}}>
                            <label class="form-check-label">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                    	<img src="{{ asset('storage/'.$user->foto_profil) }}" alt="" width="200" height="200" class="mb-3">
                		<input type="file" class="form-control-file" name="foto_profil">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="tet" class="form-control" name="alamat" value="{{$user->alamat}}">
                    </div>
	                    <button type="submit" class="btn btn-primary">Submit</button>
	                    <button type="button" class="btn btn-danger">Batal</button>
                    
				</form>
			</div>
		</div>
	</div>
@endsection
