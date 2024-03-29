<?php

namespace App\Http\Controllers; 
use App\superheroes;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;

class SuperheroesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superheroes=Superheroes::orderBy('id','asc')->paginate(5);
        return view ('superheroes.index',compact('superheroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superheroes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'poder' => 'required',
            'creador' => 'required',
        ]);
        Superheroes::create($request->all());
        return redirect()->route('superheroes.index') ->with('success','Superhéroe creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function show()
    {
        $superheroes = Superheroes::all();
        $pdf = PDF::loadview('superheroes.mostrar', compact('superheroes'));
        return $pdf->download();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superheroe=Superheroes::find($id);
        return view('superheroes.edit',compact('superheroe'));
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
        $request->validate([
            'nombre' => 'required',
            'poder' => 'required',
            'creador' => 'required',
        ]);
        Superheroes::find($id)->update($request->all());
        return redirect()->route('superheroes.index')->with('success','El superhéroe fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Superheroes::find($id)->delete();
        return redirect()->route('superheroes.index')->with('success','El superhéroe fue Eliminado correctamente');
    
    }
}
