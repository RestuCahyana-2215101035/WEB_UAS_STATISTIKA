<?php

namespace App\Http\Controllers;

use App\Models\tabelz;
use Illuminate\Http\Request;

class TabelzController extends Controller
{
    public function tabelz(){
        $dataz = tabelz::paginate(5);
        return view('tabelz', compact('dataz'));
    }

    
    public function tabelzcreate(){
        return view('tabelzcreate');
    }

    public function uploadz(Request $request){
        $dataz = ['nilaiz' => $request->nilaiz,
        'nol' => $request->nol,
        'satu' => $request->satu,
        'dua' => $request->dua,
        'tiga' => $request->tiga,
        'empat' => $request->empat,
        'lima' => $request->lima,
        'enam' => $request->enam,
        'tujuh' => $request->tujuh,
        'delapan' => $request->delapan,
        'sembilan' => $request->sembilan,];
       
        tabelz::create($dataz);
        return redirect('/tabelz');
    }

    
    public function deletez(string $id){
        $dataz = tabelz::find($id);
        $dataz->delete();
        return redirect('/tabelz');
    }

    public function editz(string $id){
        $dataz = tabelz::find($id);
        return view('editz', compact('dataz'));
    }

    public function updatez(Request $request, string $idz){
        $dataz = tabelz::find($idz);
        $dataz->nilaiz = $request->input('nilaiz');
        $dataz->nol = $request->input('nol');
        $dataz->satu = $request->input('satu');
        $dataz->dua = $request->input('dua');
        $dataz->tiga = $request->input('tiga');
        $dataz->empat = $request->input('empat');
        $dataz->lima = $request->input('lima');
        $dataz->enam = $request->input('enam');
        $dataz->tujuh = $request->input('tujuh');
        $dataz->delapan = $request->input('delapan');
        $dataz->sembilan = $request->input('sembilan');
        $dataz->save();
        return redirect('/tabelz');
    }

    public function cariNilaiz(Request $request) {
        // Ambil nilai pencarian dari input
        $nilaiZ = $request->input('nilaiz');
    
        // Lakukan pencarian di database berdasarkan nilai z dan ambil kolom 'nol'
        $hasilPencarian = tabelz::where('nilaiz', $nilaiZ)->pluck('nol');
    
        if ($hasilPencarian->isEmpty()) {
            return view('hasilcari')->with('pesan', 'Data tidak ditemukan');
        } else {
            return view('hasilcari')->with('hasilPencarian', $hasilPencarian);
        }
    }
    
    public function hasilcari() {
        return view('hasilcari');
    }
    
}
