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
        $ipk = rand(20,40);
        $ipk /= 10;

        return view("daftar_beasiswa", compact('ipk'));
    }

    public function simpan_data_pendaftaran(Request $req)
    {
        $req->validate([
            'nama'=> 'required',
            'email'=> 'required|unique:App\Models\Beasiswa,email',
            'nomor_hp'=> 'required|numeric',
            'semester'=> 'required|numeric',
            'ipk'=> 'required',
            'beasiswa'=> ['required', Rule::in(['Beasiswa Akademik', 'Beasiswa Non Akademik', 'Beasiswa Seni'])],
            'berkas'=> 'required|mimes:pdf,png,jpg,jpeg,zip|max:2048',

        ],
        [
            'nama.required'=> 'Kolom nama wajib diisi.',
            'email.required'=> 'Kolom "email" wajib diisi.',
            'email.unique'=> 'Nomor "email" sudah digunakan.',
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
        $beasiswa = DB::table('beasiswa')
                    ->get();

        $empty = count($beasiswa);

        return view("hasil", compact("beasiswa", "empty"));
    }
}
