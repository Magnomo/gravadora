<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gravadora;
use App\Http\Requests\GravadoraRequest;
use DB;

class GravadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gravadoras = Gravadora::all();
        $gravadoras_inativas = Gravadora::onlyTrashed()->get();
        return view('gravadora.index', compact('gravadoras', 'gravadoras_inativas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gravadora.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GravadoraRequest $request)
    {
        //
        DB::beginTransaction();

        try {
            Gravadora::create($request->all());
            DB::commit();
            return back()->with('message', 'Gravadora cadastrada com sucesso!');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('message', 'Erro ao cadastrar ');

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
        $gravadora = Gravadora::findOrFail($id);
        return view('gravadora.form', compact('gravadora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GravadoraRequest $request, $id)
    {
        $gravadora = Gravadora::findOrFail($id);
        
        DB::beginTransaction();

        try {
            $gravadora->update($request->all());
            DB::commit();
            $gravadoras= Gravadora::all();
            $gravadoras_inativas = Gravadora::onlyTrashed()->get();
            return view('gravadora.index',compact('gravadoras', 'gravadoras_inativas'))->with('message', "Gravadora atualizada com sucesso!");
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('message', 'Erro ao atualizar gravadora!'.$e->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $gravadora = Gravadora::findOrFail($id);
        $gravadora->delete();
        $gravadoras= Gravadora::all();
        $gravadoras_inativas = Gravadora::onlyTrashed()->get();
        return view('gravadora.index',compact('gravadoras', 'gravadoras_inativas'));
    }

    public function restore($id)
    {
        $gravadora = Gravadora::onlyTrashed()->findOrFail($id);
        $gravadora->restore();
        $gravadoras= Gravadora::all();
        $gravadoras_inativas = Gravadora::onlyTrashed()->get();
        return view('gravadora.index',compact('gravadoras', 'gravadoras_inativas'));
    }
}
