<?php

namespace App\Http\Controllers;

use App\Texto;
use Illuminate\Http\Request;

class TextoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return Texto::where('user_id', auth()->id())->get();
    }

    public function store(Request $request) {
        $texto = new Texto();
        $texto->descricao = $request->descricao;
        $texto->user_id = auth()->id();
        $texto->save();

        return $texto;
    }

    public function show($id) {
        //
    }

    public function update(Request $request, $id) {
        $texto = Texto::find($id);
        $texto->descricao = $request->descricao;
        $texto->save();
        return $texto;
    }

    public function destroy($id) {
        $texto = Texto::find($id);
        $texto->delete();
    }
}
