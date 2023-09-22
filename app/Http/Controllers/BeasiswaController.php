<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    public function checkEmail(Request $request) {
        $data = Beasiswa::where('email', $request->email)->first();
        return response()->json($data);
    }
}
