<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cliente;
use App\Coche;
use App\Cita;
use App\Taller;

class DashboardController extends Controller
{
    public function index() {
        $clientes = Cliente::all();
        $coches = Coche::all();
        $citas = Cita::all();
        $talleres = Taller::all();
        return view('cliente.dashboard',compact('clientes', 'coches', 'citas', 'talleres'));
    }
    public function create() {
        return view('cliente.create');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'nombre' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'user_id' => 'required'
        ]);

        $cliente = new Cliente;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->dni = $request->dni;
        $cliente->direccion = $request->direccion;
        $cliente->numero = $request->numero;
        $cliente->codigopostal = $request->codigopostal;
        $cliente->localidad = $request->localidad;
        $cliente->provincia = $request->provincia;
        $cliente->pais = $request->pais;
        $cliente->telefono = $request->telefono;
        $cliente->user_id = $request->user_id;
        $cliente->save();
        return redirect(route('cliente.dashboard'))->with('successMsg','Datos añadidos correctamente');
    }

    public function edit($id) {
        $cliente = Cliente::find($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'nombre' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'user_id' => 'required'
        ]);

        $cliente = Cliente::find($id);
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->dni = $request->dni;
        $cliente->direccion = $request->direccion;
        $cliente->numero = $request->numero;
        $cliente->codigopostal = $request->codigopostal;
        $cliente->localidad = $request->localidad;
        $cliente->provincia = $request->provincia;
        $cliente->pais = $request->pais;
        $cliente->telefono = $request->telefono;
        $cliente->user_id = $request->user_id;
        $cliente->save();
        return redirect(route('cliente.dashboard'))->with('successMsg','Datos modificados correctamente');
    }

    public function delete($id) {
        Cliente::find($id)->delete();
        return redirect(route('cliente.dashboard'))->with('successMsg','Datos eliminados correctamente');
    }

    public function createCoche() {
        $clientes = Cliente::all();
        return view('cliente.createCoche', compact('clientes'));
    }

    public function storeCoche(Request $request) {
        $this->validate($request,[
            'vin' => 'required',
            'cliente_id' => 'required'
        ]);

        $coche = new Coche;
        $coche->marca = $request->marca;
        $coche->modelo = $request->modelo;
        $coche->vin = $request->vin;
        $coche->motor = $request->motor;
        $coche->cc = $request->cc;
        $coche->cv = $request->cv;
        $coche->color = $request->color;
        $coche->cliente_id = $request->cliente_id;
        $coche->save();
        return redirect(route('cliente.dashboard'))->with('successMsg','Datos añadidos correctamente');
    }

    public function editCoche($id) {
        $coche = Coche::find($id);
        return view('cliente.editCoche', compact('coche'));
    }

    public function updateCoche(Request $request, $id) {
        $this->validate($request,[
            'vin' => 'required',
            'cliente_id' => 'required'
        ]);

        $coche = Coche::find($id);
        $coche->marca = $request->marca;
        $coche->modelo = $request->modelo;
        $coche->vin = $request->vin;
        $coche->cc = $request->cc;
        $coche->cv = $request->cv;
        $coche->color = $request->color;
        $coche->cliente_id = $request->cliente_id;
        $coche->save();
        return redirect(route('cliente.dashboard'))->with('successMsg','Datos modificados correctamente');
    }

    public function deleteCoche($id) {
        Coche::find($id)->delete();
        return redirect(route('cliente.dashboard'))->with('successMsg','Datos eliminados correctamente');
    }

    public function createCita() {
        $talleres = Taller::all();
        $clientes = Cliente::all();
        return view('cliente.createCita', compact('talleres', 'clientes'));
    }

    public function storeCita(Request $request) {
        $this->validate($request,[
            'cliente_id' => 'required',
            'taller_id' => 'required',
            'fecha' => 'required',
            'telefono' => 'required'
        ]);

        $cita = new Cita;
        $cita->cliente_id = $request->cliente_id;
        $cita->taller_id = $request->taller_id;
        $cita->fecha = $request->fecha;
        $cita->telefono = $request->telefono;
        $cita->save();
        return redirect(route('cliente.dashboard'))->with('successMsg','Datos añadidos correctamente');
    }

    public function editCita($id) {
        $cita = Cita::find($id);
        $talleres = Taller::all();
        return view('cliente.editCita', compact('cita', 'talleres'));
    }

    public function updateCita(Request $request, $id) {
        $this->validate($request,[
            'cliente_id' => 'required',
            'taller_id' => 'required',
            'fecha' => 'required',
            'telefono' => 'required'
        ]);

        $cita = Cita::find($id);
        $cita->cliente_id = $request->cliente_id;
        $cita->taller_id = $request->taller_id;
        $cita->fecha = $request->fecha;
        $cita->telefono = $request->telefono;
        $cita->save();
        return redirect(route('cliente.dashboard'))->with('successMsg','Datos modificados correctamente');
    }

    public function deleteCita($id) {
        Cita::find($id)->delete();
        return redirect(route('cliente.dashboard'))->with('successMsg','Datos eliminados correctamente');
    }
}
