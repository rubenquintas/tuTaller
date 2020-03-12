<?php

namespace App\Http\Controllers\Taller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Taller;

class DashboardController extends Controller
{
    public function index() {

        $talleres = Taller::all();
        return view('taller.dashboard',compact('talleres'));
    }

    public function create() {
        return view('taller.create');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'nombre_fiscal' => 'required',
            'cif' => 'required',
            'direccion' => 'required',
            'numero' => 'required',
            'codigopostal' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'pais' => 'required',
            'telefono' => 'required'
        ]);

        $taller = new Taller;
        $taller->nombre_fiscal = $request->nombre_fiscal;
        $taller->cif = $request->cif;
        $taller->direccion = $request->direccion;
        $taller->numero = $request->numero;
        $taller->codigopostal = $request->codigopostal;
        $taller->localidad = $request->localidad;
        $taller->provincia = $request->provincia;
        $taller->pais = $request->pais;
        $taller->telefono = $request->telefono;
        $taller->save();
        return redirect(route('taller.dashboard'))->with('successMsg','Datos añadidos correctamente');
    }

    public function edit($id) {
        $taller = Taller::find($id);
        return view('taller.edit', compact('taller'));
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'nombre_fiscal' => 'required',
            'cif' => 'required',
            'direccion' => 'required',
            'numero' => 'required',
            'codigopostal' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'pais' => 'required',
            'telefono' => 'required'
        ]);

        $taller = Taller::find($id);
        $taller->nombre_fiscal = $request->nombre_fiscal;
        $taller->cif = $request->cif;
        $taller->direccion = $request->direccion;
        $taller->numero = $request->numero;
        $taller->codigopostal = $request->codigopostal;
        $taller->localidad = $request->localidad;
        $taller->provincia = $request->provincia;
        $taller->pais = $request->pais;
        $taller->telefono = $request->telefono;
        $taller->save();
        return redirect(route('taller.dashboard'))->with('successMsg','Datos modificados correctamente');
    }

}
