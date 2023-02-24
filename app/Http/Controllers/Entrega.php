<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Entrega extends Controller
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
    public function create($motorista, $veiculo)
    {
        $insertEntrega = DB::insert('insert into entrega (id, id_veiculo, id_motorista, data, created_at, updated_at) values (?, ?, ?, ?, ?, ?)', 
                                        [$this->newId(), $veiculo, $motorista, date('Y-m-d'), date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);
        if($insertEntrega){
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function getLastId(){
        $lastId = DB::select('select max(id) from entrega as max');
        $id_entrega = (array) $lastId[0];
        return $id_entrega['max(id)'];
    }
    public function newId(){
        return $this->getLastId()+1;
    }

    public function getAll(){
        return DB::select('select * from entrega');
    }
    public function getMesmaEntrega($veiculo,$motorista,$data){
        echo $veiculo,$motorista, $data;
        $entrega = DB::select('select id_veiculo, id_motorista, data from entrega where id_motorista = :motorista and data = :dataentrega',
                    ['motorista'=>$motorista, 'dataentrega'=>$data]);

       return count($entrega);
    }
    public function getCount(){
        return count($this->getAll());
    }
    public function showEntregas(){
        // echo '<pre>';print_r($this->getAll());echo '</pre>';
        foreach ($this->getAll() as $entrega) {
            echo view('admin/components/entrega', ['entrega'=>$entrega]);            
        }
    }
}
