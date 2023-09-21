@extends('layouts.landing')
@section('title', 'Hasil')
@section('content')
    <h2 class="text-center mt-5">List Hasil Peserta Beasiswa:</h2>
    <div class="card m-5">
        <div class="card-header">
            List Hasil Peserta
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Semester</th>
                        <th scope="col">IPK</th>
                        <th scope="col">Jenis Beasiswa</th>
                        <th scope="col">Berkas</th>
                        <th scope="col">Status Ajuan</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @if (!empty($empty))
                        @foreach ($beasiswa as $b)
                        <tr>
                            <th scope="row">{{ $b->nama }}</th>
                            <td>{{ $b->email }}</td>
                            <td>{{ $b->nomor_hp }}</td>
                            <td>{{ $b->semester }}</td>
                            <td>{{ $b->ipk }}</td>
                            <td>{{ $b->beasiswa }}</td>
                            <td><a href="{{ url(asset('uploads')) }}/{{ $b->berkas }}" class="btn btn-primary btn-sm" target="_BLANK">Lihat berkas</a></td>
                            <td>
                                @if($b->status_ajuan == "Belum di verifikasi") 
                                    <span class="badge bg-warning text-dark">{{ $b->status_ajuan }}</span> 
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    @else
                        <td colspan="8" class="text-center">Tidak ada data</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted">
            
        </div>
    </div>

    <p class="mt-5"></p>

@endsection