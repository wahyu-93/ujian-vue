<?php

namespace App\Http\Controllers\Api\Nilai;

use App\Models\Nilai;
use App\Models\User;
use App\Models\Soal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Nilai\NilaiResource;

class NilaiController extends Controller
{
    public function index()
    {
        return NilaiResource::collection(Nilai::latest()->get());
    }

    public function show($id)
    {
        $nilai = Nilai::whereHas('user', function($q) use ($id){
            $q->where('android_id', $id);
        })->with('user')->get();
        
        return NilaiResource::collection($nilai);
    }

    public function dashboard()
    {
        $lulus      = Nilai::where('keterangan', 'Lulus')->count();
        $tdkLulus   = Nilai::where('keterangan', 'Tidak Lulus')->count();
        $user       = User::get()->count();
        $ttlSoal    = Soal::get()->count();

        return response()->json([
            'lulus'     => $lulus,
            'tdkLulus'  => $tdkLulus,
            'user'      => $user,
            'ttlSoal'   => $ttlSoal
        ], 202);
    }
}
