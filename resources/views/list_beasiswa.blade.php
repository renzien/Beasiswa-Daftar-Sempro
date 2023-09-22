@extends('layouts.landing')
@section('title', 'List Beasiswa')
@section('content')
<div style="text-align: center">
        <img src="{{ asset('assets/images/ittp-depan.jpg') }}" alt="" width="75%" style="border-radius: 30px; padding-top: 10px;">
    <h1>Beasiswa IT Telkom Purwokerto</h1>
    <p>Website yang memberikan informasi tentang beasiswa yang tersedia di IT Telkom Purwokerto. Yang dibuka untuk tahun akademik
        2022/2023. Jalur ini memberikan kesempatan beasiswa seleksi ujian online.
    </p>
    </div>

    <h1 style="text-align: center; padding-top: 50px;">Syarat dan Ketentuan Akademik</h1>
    <ol type="1" style="padding-top: 20px;">
        <li>Sehat Jasmani dan Rohani.</li>
        <li>Memiliki Presetasi Akademik yang baik.</li>
        <li>Status Mahasiswa Aktif</li>
        <li>Berkewarganeraan Indonesia.</li>
        <li>Surat Rekomendasi</li>
    </ol>

    <h1 style="text-align: center; padding-top: 50px;">Syarat dan Ketentuan Non-Akademik</h1>
    <ol type="1" style="padding-top: 20px;">
        <li>Sehat Jasmani dan Rohani.</li>
        <li>Bakat atau Prestasi di Bidang Tertentu.</li>
        <li>Kriteria Khusus.</li>
        <li>Berkewarganeraan Indonesia.</li>
        <li>Surat Rekomendasi</li>
    </ol>
@endsection