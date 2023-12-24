<?php

namespace App\Http\Controllers;

use App\Models\Chikuadrat;
use Illuminate\Http\Request;

class ChikuadratController extends Controller
{
    public function tabelz(){
        $data = Chikuadrat::paginate(5);
        return view('tabelz', compact('data'));
    }

}
