<?php

namespace App\Http\Controllers;
use App\Models\Skor;
use App\Exports\ChiExport;

use App\Exports\SkorExport;

use App\Imports\SkorImport;

use App\Exports\SkorsExport;
use App\Imports\SkorsImport;
use Illuminate\Http\Request;
use App\Exports\BergolongExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use MathPHP\Probability\Distribution\Continuous;


class SkorController extends Controller
{
    public function index(){
        return view('dashboard.dashboard');
    }

    public function export(){
        return view('dashboard.export');
    }
    
    public function bergolong()
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
    
        return view('dashboard.bergolong', compact('skorGroups'));
    }
    


    public function frekuensi()
    {
        // Ambil semua data dari model Skor
        $data = Skor::all();
        
        // Hitung frekuensi masing-masing data 'skor'
        $frekuensi = $data->groupBy('skor')->map->count();
        
        // Urutkan berdasarkan skor (jika perlu)
        $frekuensi = $frekuensi->sortBy(function ($item, $key) {
            return $key; // Jika skor merupakan kunci pada array
            // return $item; // Jika skor berada di dalam nilai array
        });
    
        // Mengatur jumlah item per halaman
        $perPage = 10; // Misalnya, 10 item per halaman
    
        // Menerapkan paginasi ke hasil frekuensi dengan menggunakan LengthAwarePaginator
        $paginatedFrekuensi = new \Illuminate\Pagination\LengthAwarePaginator(
            $frekuensi->forPage(\Illuminate\Pagination\Paginator::resolveCurrentPage(), $perPage),
            $frekuensi->count(),
            $perPage,
            null,
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
        );
    
        return view('dashboard.frekuensi', compact('paginatedFrekuensi'));
    }
    
    


    public function read(){
        $data = Skor::paginate(5);
        return view('dashboard.read', compact('data'));
    }

  
    public function create(){
        return view('dashboard.create');
    }

    public function upload(Request $request){
        $data = ['skor' => $request->skor];
        Skor::create($data);
        return redirect('/read');
    }

    public function delete(string $id){
        $data = Skor::find($id);
        $data->delete();
        return redirect('/read');
    }

    public function edit(string $id){
        $data = Skor::find($id);
        return view('dashboard.edit', compact('data'));
    }

    public function update(Request $request, string $id){
        $data = Skor::find($id);
        $data->skor = $request->input('skor');
        $data->save();
        return redirect('/read');
    }

    public function getChiSqure()
    {
        $result = DB::table('tb_zed')->paginate(10); // Ubah '10' sesuai dengan jumlah data yang ingin ditampilkan per halaman
    
        return view('dashboard.chi', compact('result'));
    }


   public function calculateChiSquare(Request $request)
{
    $chi = DB::table('tb_zed')->where('z', substr($request->chi, 0, -1))->first();
    $lastChi = substr($request->chi, -1);
    $result = '';

    switch ($lastChi) {
        case '0':
            $result = $chi->nol;
            break;
        case '1':
            $result = $chi->satu;
            break;
        case '2':
            $result = $chi->dua;
            break;
        case '3':
            $result = $chi->tiga;
            break;
        case '4':
            $result = $chi->empat;
            break;
        case '5':
            $result = $chi->lima;
            break;
        case '6':
            $result = $chi->enam;
            break;
        case '7':
            $result = $chi->tujuh;
            break;
        case '8':
            $result = $chi->delapan;
            break;
        case '9':
            $result = $chi->sembilan;
            break;
        default:
            $result = $chi->nol;
            break;
    }

    return back()->with('success', $result);
}

public function ujiT()
{
    $result = DB::table('ttest')->get();
    $sumX1 = $result->sum('x1');
    $sumX2 = $result->sum('x2');
    $averageX1 = $result->avg('x1');
    $averageX2 = $result->avg('x2');
    $SD1 = DB::table('ttest')
        ->selectRaw('SQRT(SUM(POWER(x1 - ' . $averageX1 . ', 2)) / (COUNT(x1) - 1)) AS result')->first();
    $SD2 = DB::table('ttest')
        ->selectRaw('SQRT(SUM(POWER(x2 - ' . $averageX2 . ', 2)) / (COUNT(x2) - 1)) AS result')->first();

    $roundedSDX1 = round($SD1->result, 2);
    $roundedSDX2 = round($SD2->result, 2);

    $variance1 = DB::table('ttest')
        ->selectRaw('SUM(POWER(x1 - ' . $averageX1 . ', 2)) / (COUNT(x1) - 1) AS result')
        ->first();
    $variance2 = DB::table('ttest')
        ->selectRaw('SUM(POWER(x2 - ' . $averageX2 . ', 2)) / (COUNT(x2) - 1) AS result')
        ->first();

    $roundedVariance1 = round($variance1->result, 2);
    $roundedVariance2 = round($variance2->result, 2);

    return view('dashboard.ttest', compact('result', 'sumX1', 'sumX2', 'averageX1', 'averageX2', 'roundedSDX1', 'roundedSDX2', 'roundedVariance1', 'roundedVariance2'));
}


public function deskripsi()
{
    // Ambil semua data dari model Skor
    $data = Skor::all();

    // Hitung informasi statistik yang diperlukan
    $jumlahData = $data->count();
    $nilaiMaksimum = $data->max('skor');
    $nilaiMinimum = $data->min('skor');
    $nilaiRataRata = $data->avg('skor');

    // Hitung nilai kuadrat dari setiap skor
    $nilaiKuadrat = $data->map(function ($item) {
        return $item->skor * $item->skor;
    });

    // Hitung nilai rata-rata kuadrat
    $nilaiRataKuadrat = $nilaiKuadrat->avg();

    // Hitung standar deviasi
    $standarDeviasi = sqrt($nilaiRataKuadrat - ($nilaiRataRata * $nilaiRataRata));

    // Tampilkan informasi ke dalam view
    return view('dashboard.deskripsi', compact(
        'jumlahData',
        'nilaiMaksimum',
        'nilaiMinimum',
        'nilaiRataRata',
        'standarDeviasi'
    ));
}


function normsdist($x)
    {
        $distribution = new Continuous\Normal(0, 1); // Distribusi normal standar dengan rata-rata 0 dan deviasi standar 1
        return $distribution->cdf($x); // Fungsi distribusi kumulatif
    }

    public function liliefors()
    {
        $skors = skor::all();
        $skorsAverage = $skors->avg('skor');
        $skorsSTD = DB::table('skors')
            ->selectRaw('SQRT(SUM(POWER(skor - ' . $skorsAverage . ', 2)) / (COUNT(skor) - 1)) AS result')->first();

        // Urutkan data
        $sortedskors = $skors->pluck('skor')->sort()->toArray();

        // Jumlah total data
        $totalData = count($sortedskors);

        // Inisialisasi array untuk menyimpan probabilitas kumulatif empiris
        $empiricalCumulativeProbability = [];

        // Hitung probabilitas kumulatif
        $cumulativeCount = 0;
        foreach ($sortedskors as $value) {
            $cumulativeCount++;
            $empiricalCumulativeProbability[$value] = $cumulativeCount / $totalData;
        }

        $zskors = [];
        foreach ($skors as $skor) {
            $skorValue = $skor->skor;
            $zskor = ($skorValue - $skorsAverage) / $skorsSTD->result;
            $normsdist = $this->normsdist($zskor);
            $zskors[$skor->id] = [
                'skorValue' => $skorValue,
                'zskor' => number_format($zskor, 5),
                'normsdist' => number_format($normsdist, 5),
                'empiricalCumulativeProbability' => number_format($empiricalCumulativeProbability[$skorValue], 5),
                'fx' => abs($normsdist - $empiricalCumulativeProbability[$skorValue]),
            ];
        }

        return view('dashboard.liliefors', compact('skors', 'zskors'));
    }
    

    public function import()
{
    Excel::import(new SkorsImport, request()->file('file'));

    return redirect('/')->with('success', 'Success Import Scores');
}


public function excel()
{
    return Excel::download(new SkorsExport, 'skor.xlsx');
}

public function chiExcel()
{
    return Excel::download(new ChiExport, 'chi-kuadrat.xlsx');
}

public function bergolongExcel()
{
    return Excel::download(new BergolongExport, 'data-bergolong.xlsx');
}


}



