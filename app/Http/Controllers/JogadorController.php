<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Illuminate\Http\Request;

class JogadorController extends Controller
{
    public function __construct(Jogador $jogador){
        $this->jogador = $jogador;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jogadores.index', [ 'jogadores' => $this->jogador->all() ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function show(Jogador $jogador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogadorSelecionado =  $this->jogador->find($id);
        return view('jogadores.edit',['jogadorSelecionado' => $jogadorSelecionado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jogador = $this->jogador->find($id);

        if($jogador){
            $jogador->fill($request->all());
            $jogador->save();
            return view('jogadores.index', ['jogadores' => $this->jogador->all()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jogador $jogador)
    {
        //
    }
}
