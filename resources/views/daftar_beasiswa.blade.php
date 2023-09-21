@extends('layouts.landing')
@section('title', 'Daftar Beasiswa')
@section('content')
    <h2 class="text-center mt-2">Daftar beasiswa:</h2>
    <div class="card m-5">
        <div class="card-header">
            Registrasi beasiswa
        </div>
        <div class="card-body">
            <form action="{{ route('simpan_data_pendaftaran') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Masukan Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
                        @error('nama') <label class="text-danger">{{ $message }}</label> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email') <label class="text-danger">{{ $message }}</label> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="nomor_hp" placeholder="Nomor HP" value="{{ old('nomor_hp') }}" required>
                        @error('nama') <label class="text-danger">{{ $message }}</label> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="semester" class="col-sm-2 col-form-label">Semester saat ini</label>
                    <select name="semester" class="form-control col-md-2 m-2" style="width: 80%" @if($ipk<3.0) disabled @endif required>
                        <option value="1" @if (old('semester') == "1" ) selected @endif>Semester 1</option>
                        <option value="2" @if (old('semester') == "2" ) selected @endif>Semester 2</option>
                        <option value="3" @if (old('semester') == "3" ) selected @endif>Semester 3</option>
                        <option value="4" @if (old('semester') == "4" ) selected @endif>Semester 4</option>
                        <option value="5" @if (old('semester') == "5" ) selected @endif>Semester 5</option>
                        <option value="6" @if (old('semester') == "6" ) selected @endif>Semester 6</option>
                        <option value="7" @if (old('semester') == "7" ) selected @endif>Semester 7</option>
                        <option value="8" @if (old('semester') == "8" ) selected @endif>Semester 8</option>
                    </select>
                    @error('semester') <label class="text-danger">{{ $message }}</label> @enderror
                </div>
                <div class="mb-3 row">
                    <label for="ipk" class="col-sm-2 col-form-label">IPK Terakhir</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" name="ipk" placeholder="IPK Terakhir" value="{{ $ipk }}" readonly required>
                        @error('ipk') <label class="text-danger">{{ $message }}</label> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="beasiswa" class="col-sm-2 col-form-label">Pilih Beasiswa</label>
                    <select name="beasiswa" class="form-control col-md-2 m-2" style="width: 80%" @if($ipk<3.0) disabled @endif required>
                        <option value="Beasiswa Akademik" @if (old('beasiswa') == "Beasiswa Akademik" ) selected @endif>Beasiswa Akademik</option>
                        <option value="Beasiswa Non Akademik" @if (old('beasiswa') == "Beasiswa Non Akademik" ) selected @endif>Beasiswa Non Akademik</option>
                        <option value="Beasiswa Seni" @if (old('beasiswa') == "Beasiswa Seni" ) selected @endif>Beasiswa Seni</option>
                    </select>
                    @error('beasiswa') <label class="text-danger">{{ $message }}</label> @enderror
                </div>
                <div class="mb-3 row">
                    <label for="formFile" class="col-sm-2 col-form-label">Upload Berkas Syarat</label>
                    <input name="berkas" accept=".pdf, .jpg, .jpeg, .zip, .png" class="form-control m-2" type="file" id="formFile" style="width: 80%" @if($ipk<3.0) disabled @endif required>
                    @error('berkas') <label class="text-danger">{{ $message }}</label> @enderror
                </div>
                <div class="mb-3 text-center align-content-center ">
                    <input type="submit" value="Daftar" class="form-control btn btn-primary text-center" style="width: 250px" @if($ipk<3.0) disabled @endif/>
                    <a href="{{ route("list-beasiswa") }}" class="btn btn-danger text-center" style="width: 250px" @if($ipk<3.0) disabled @endif>Batal</a>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            
        </div>
  </div>

@endsection