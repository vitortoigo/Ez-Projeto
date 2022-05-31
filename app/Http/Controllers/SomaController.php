<?php

namespace App\Http\Controllers;

use App\Models\Soma;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SomaController extends Controller
{
    public function index(Request $request) {

        $search = $request->procurar;
        $data = $request->select_day;
        
        if($search || $data) {
            $valorTotal = Soma::where([['nome', 'like', '%'. $search .'%']])
                ->where('created_at', '>=', Carbon::now()->subDay($request->select_day))
                ->get();
                
            $soma = Soma::where([['nome', 'like', '%'. $search .'%']])
                ->where('created_at', '>=', Carbon::now()->subDay($request->select_day))
                ->sum(DB::raw('valor - valor2'));
        }
        else {
            $valorTotal = Soma::all();
            $soma = Soma::sum(DB::raw('valor - valor2'));
        }

        session()->flashInput($request->all());
        
        return view('welcome', ['soma' => $soma, 'valorT' => $valorTotal]);
    }

    public function store(Request $request, Soma $soma) {
        $soma->valor = preco($request->valor);
        $soma->valor2 = preco($request->valor2);
        $soma->nome = $request->nome;
        $soma->save();
        // $soma->fill($request->contato->all)->save();
        return redirect('/');
    }
}