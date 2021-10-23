<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UjianController extends Controller
{
    public function index()
    {
        $soals = Soal::all();
        $nilai = Nilai::where('id_user', Auth::user()->id)->first();
        
        return view('soal.index', compact('soals', 'nilai'));
    }

    public function store(Request $request)
    {
        $sudahUjian = Nilai::where('id_user', Auth::user()->id)->first();
        if($sudahUjian){
            dd('Sudah Ujian');
        };

        DB::beginTransaction();
        try {
            $pilihan     = $request->jawabanSoal;
            $idSoal      = $request->id;
            $jumlahSoal  = $request->jumlah_soal;

            $score = 0;
            $benar = 0;
            $salah = 0;
            $kosong = 0;
            
            for($i=0; $i < $jumlahSoal; $i++){
                // nomor soal
                $nomor = $idSoal[$i];
            
                // cek jawaban user
                // jika kosong 
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }
                else {
                    // cek jawaban user
                    $jawaban = $pilihan[$nomor];

                    // cocokkan dengan kunci jawaban
                    $data = Soal::where('id', $nomor)->where('kunci_jawaban', $jawaban)->first();
                    if ($data){
                        $benar++;
                    }
                    else {
                        $salah++;
                    }
                }

                $soalAktif = Soal::where('status', 'Aktif')->count();
                $score = 100 / $soalAktif * $benar;
                $hasil = number_format($score, 1);
            }

            if($hasil < 75){
                $ket = 'Tidak Lulus';
            }
            else {
                $ket = 'Lulus';
            };

            $hslUjian = [
                'id_user'   => Auth::user()->id,
                'benar'     => $benar,
                'salah'     => $salah,
                'kosong'    => $kosong,
                'score'     => $hasil,
                'keterangan'=> $ket
            ];

            Nilai::create($hslUjian);
            DB::commit();

            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        
    }
}
