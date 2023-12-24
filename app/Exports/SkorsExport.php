<?php

namespace App\Exports;

use App\Models\Skor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SkorsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.excel', [
            'skors' => Skor::all() #disesuaikan
        ]);
    }
}
