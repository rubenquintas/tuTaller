<?php

namespace App\Http\Controllers\Taller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Taller;
use App\Empleado;
use App\Cita;
use App\Cliente;

class DashboardController extends Controller
{
    public function index() {
        $talleres = Taller::all();
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $citas = Cita::all();
        return view('taller.dashboard',compact('talleres', 'clientes', 'empleados', 'citas'));
    }

    public function create() {
        return view('taller.create');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'nombre_fiscal' => 'required',
            'cif' => 'required',
            'telefono' => 'required',
            'user_id' => 'required'
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
        $taller->user_id = $request->user_id;
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
            'telefono' => 'required',
            'user_id' => 'required'
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
        $taller->user_id = $request->user_id;
        $taller->save();
        return redirect(route('taller.dashboard'))->with('successMsg','Datos modificados correctamente');
    }

    public function delete($id) {
        Taller::find($id)->delete();
        return redirect(route('taller.dashboard'))->with('successMsg','Datos eliminados correctamente');
    }

    public function createEmpleado() {
        return view('taller.createEmpleado');
    }

    public function storeEmpleado(Request $request) {
        $this->validate($request,[
            'nombre' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'taller_id' => 'required'
        ]);

        $empleado = new Empleado;
        $empleado->nombre = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->dni = $request->dni;
        $empleado->direccion = $request->direccion;
        $empleado->numero = $request->numero;
        $empleado->codigopostal = $request->codigopostal;
        $empleado->localidad = $request->localidad;
        $empleado->provincia = $request->provincia;
        $empleado->pais = $request->pais;
        $empleado->telefono = $request->telefono;
        $empleado->taller_id = $request->taller_id;
        $empleado->save();
        return redirect(route('taller.dashboard'))->with('successMsg','Datos añadidos correctamente');
    }

    public function editEmpleado($id) {
        $empleado = Empleado::find($id);
        return view('taller.editEmpleado', compact('empleado'));
    }

    public function updateEmpleado(Request $request, $id) {
        $this->validate($request,[
            'nombre' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'taller_id' => 'required'
        ]);

        $empleado = Empleado::find($id);
        $empleado->nombre = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->dni = $request->dni;
        $empleado->direccion = $request->direccion;
        $empleado->numero = $request->numero;
        $empleado->codigopostal = $request->codigopostal;
        $empleado->localidad = $request->localidad;
        $empleado->provincia = $request->provincia;
        $empleado->pais = $request->pais;
        $empleado->telefono = $request->telefono;
        $empleado->taller_id = $request->taller_id;
        $empleado->save();
        return redirect(route('taller.dashboard'))->with('successMsg','Datos modificados correctamente');
    }

    public function deleteEmpleado($id) {
        Empleado::find($id)->delete();
        return redirect(route('taller.dashboard'))->with('successMsg','Datos eliminados correctamente');
    }

    public function viewCita($id) {
        $talleres = Taller::all();
        $citas = Cita::all();
        $clientes = Cliente::all();
        return view('taller.viewCitas',compact('talleres', 'citas', 'clientes'));
    }
}
