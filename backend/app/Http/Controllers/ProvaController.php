<?php

namespace App\Http\Controllers;

use App\Prova;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class ProvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provas = Prova::all();
        return response()->json($provas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('prova')) {
            $faculdade = $request->input('faculdade');
            $curso = $request->input('curso');
            $disciplina = $request->input('disciplina');
            $ano = $request->input('ano');
            $periodo = $request->input('periodo');
            $professor = $request->input('professor');
            $nome_arquivo = time().'.pdf';

            // Move o arquivo
            $arquivo = $request->file('prova');
            $path = 'uploads/provas/'.$faculdade.'/'.$curso.'/'.$disciplina.'/'.$ano.'/'.$periodo;
            $arquivo->move(storage_path('app/public').'/'.$path, $nome_arquivo);

            // Cria chave no banco
            $prova = new Prova();
            $prova->nome = $nome_arquivo;
            $prova->faculdade = $faculdade;
            $prova->curso = $curso;
            $prova->disciplina = $disciplina;
            $prova->ano = $ano;
            $prova->periodo = $periodo;
            $prova->professor = $professor;
            if($prova->save())
                return response()->json(true);
            else
                return response()->json(false, 500);
        } else {
            return response()->json(false, 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prova = Prova::find($id);
        return response()->json($prova);
    }


    public function binario($id)
    {
        $prova = Prova::find($id);
        $path = 'public/uploads/provas/'.$prova->faculdade.'/'.$prova->curso.'/'
                                        .$prova->disciplina.'/'.$prova->ano.'/'.$prova->periodo.'/';
        $arquivo = Storage::get($path.$prova->nome);
        return response($arquivo);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
