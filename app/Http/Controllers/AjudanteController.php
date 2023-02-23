<?php

namespace App\Http\Controllers;

use App\Models\Ajudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_entrega, $id_ajudante)
    {
        $insertAjudante = DB::insert('insert into ajudantes   (id, id_entrega, id_ajudante, created_at, updated_at) values (?, ?, ?, ?, ?)',
                                            [$this->newId(), $id_entrega, $id_ajudante, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);

        if($insertAjudante){
            return true;
        }
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
     * @param  \App\Models\Ajudante  $ajudante
     * @return \Illuminate\Http\Response
     */
    public function show(Ajudante $ajudante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ajudante  $ajudante
     * @return \Illuminate\Http\Response
     */
    public function edit(Ajudante $ajudante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ajudante  $ajudante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ajudante $ajudante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ajudante  $ajudante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ajudante $ajudante)
    {
        //
    }
    public function getLastId(){
        $lastId = DB::select('select max(id) from ajudantes');
        $Id = (array) $lastId[0];
        return $Id['max(id)'];
    }
    public function newId(){
        return $this->getLastId()+1;
    }
}
