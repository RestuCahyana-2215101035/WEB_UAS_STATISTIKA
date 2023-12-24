<?php

namespace App\Exports;

use App\Models\Skor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BergolongExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Skor::all();
    
        // Mengambil nilai minimum dan maksimum dari skor
        $minskor = $data->min('skor');
        $maxskor = $data->max('skor');
    
        // Menentukan jumlah kelas interval (bisa disesuaikan)
        $jumlahKelas = 5;
    
        // Menghitung lebar interval
        $intervalWidth = ceil(($maxskor - $minskor) / $jumlahKelas);
    
        // Mengelompokkan data skor ke dalam kelas interval
        $skorGroups = [];
        for ($i = 0; $i < $jumlahKelas; $i++) {
            $lowerBound = $minskor + ($i * $intervalWidth);
            $upperBound = $lowerBound + $intervalWidth - 1; // Mengurangi 1 agar batas atas tidak terlalu besar
    
            if ($i === $jumlahKelas - 1) {
                $upperBound = $maxskor; // Menangani kasus interval terakhir agar mencakup nilai maksimal yang sebenarnya
            }
    
            $count = $data->whereBetween('skor', [$lowerBound, $upperBound])->count();
    
            // Menyimpan data kelas interval, nilai tengah, dan frekuensi
            $skorGroups[] = [
                'interval' => "$lowerBound - $upperBound",
                'mid_value' => ($lowerBound + $upperBound) / 2,
                'frequency' => $count,
            ];
        }
    
        return view('dashboard.bergolongexcel', compact('skorGroups'));
    }
}
