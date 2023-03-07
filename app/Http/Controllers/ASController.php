<?php

namespace App\Http\Controllers;

use App\Models\A_S;
use Illuminate\Http\Request;

class ASController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AS = A_S::All();
        return view('admin.telas.as',['itens'=>$AS]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.as');
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
     * @param  \App\Models\A_S  $a_S
     * @return \Illuminate\Http\Response
     */
    public function show(A_S $a_S)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\A_S  $a_S
     * @return \Illuminate\Http\Response
     */
    public function edit($a_S)
    {
        $AS = A_S::find($a_S);
        echo '<pre>';print_r($AS);echo '</pre>';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\A_S  $a_S
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, A_S $a_S)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\A_S  $a_S
     * @return \Illuminate\Http\Response
     */
    public function destroy(A_S $a_S)
    {
        //
    }
}
