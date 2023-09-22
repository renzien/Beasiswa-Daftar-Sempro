<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function index()
    {
        return view("list_beasiswa");
    }

    public function daftar_beasiswa()
    {
        return view("daftar_beasiswa");
    }

    public function simpan_data_pendaftaran(Request $req)
    {
        $req->validate([
            'nama'=> 'required',
            'email'=> 'required',
            'nomor_hp'=> 'required|numeric',
            'semester'=> 'required|numeric',
            'ipk'=> 'required',
            'beasiswa'=> ['required', Rule::in(['Beasiswa Akademik', 'Beasiswa Non Akademik', 'Beasiswa Seni'])],
            'berkas'=> 'required|mimes:pdf,png,jpg,jpeg,zip|max:2048',

        ],
        [
            'nama.required'=> 'Kolom nama wajib diisi.',
            'email.required'=> 'Kolom "email" wajib diisi.',
            'nomor_hp.required'=> 'Kolom "Nomor HP" wajib diisi.',
            'nomor_hp.numeric'=> 'Kolom "Nomor HP" wajib bernilai angka.',
            'semester.required'=> 'Kolom "semester" wajib diisi.',
            'semester.numeric'=> 'Kolom "semester" wajib bernilai angka.',
            'ipk.required'=> 'Kolom "ipk" wajib diisi.',
            'beasiswa.required'=> 'Kolom "beasiswa" wajib diisi.',
            'beasiswa.in'=> 'Kolom "beasiswa" tidak valid.',
            'berkas.required'=> 'Kolom "berkasi" wajib diisi.',
            'berkas.mimes'=> 'File "berkasi" tidak sesuai dengan format (PDF/JPG/PNG/ZIP).',
            'berkas.max'=> 'Ukuran file "berkasi" maksimal 2 MB.',
        ]);

        DB::transaction(function () use ($req){
            if($req->file()) {
                $beasiswa = new Beasiswa();
                $beasiswa->nama = $req->nama;
                $beasiswa->email = $req->email;
                $beasiswa->nomor_hp = $req->nomor_hp;
                $beasiswa->semester = $req->semester;
                $beasiswa->ipk = $req->ipk;
                $beasiswa->beasiswa = $req->beasiswa;
                $beasiswa->status_ajuan = "Belum di verifikasi";

                $file = $req->berkas;
                $namaFile = time().'_'.$req->file('berkas')->getClientOriginalName();
                $namaFile = Str::kebab($namaFile);
                $file->move(public_path('uploads'), $namaFile);

                $beasiswa->berkas = $namaFile;

                $beasiswa->save();
            }

        });

        return redirect()->route('hasil');
    }

    public function hasil()
    {
        $beasiswa = [
            'Beasiswa Akademik',
            'Beasiswa Non Akademik',
            'Beasiswa Seni'
        ];

        $beasiswaCounts = [
            'Beasiswa Akademik' => 0,
            'Beasiswa Non Akademik' => 0,
            'Beasiswa Seni' => 0
        ];

        foreach($beasiswa as $b) {
            $data = Beasiswa::where('beasiswa', $b)->count();
            $beasiswaCounts[$b] += $data;
        }

        // dd($beasiswaCounts);

        $beasiswa = Beasiswa::where('beasiswa', '!=', '')-> get();
        $empty = count($beasiswa);

        return view("hasil", compact("beasiswa", "empty", "beasiswaCounts"));
    }
}
