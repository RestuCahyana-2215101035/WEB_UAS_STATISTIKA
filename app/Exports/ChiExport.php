<?php

namespace App\Exports;



use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ChiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $result = DB::table('tb_zed')->get();
    
        return view('dashboard.chiexcel', compact('result'));
    }
}
