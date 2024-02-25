<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

use App\Models\conductor;
use App\Http\Responses\DriversResponse;

class conductoresController extends Controller
{
    public function index()
    {
        $driversResponse = new DriversResponse(
            conductor::all(),
            conductor::countInactiveDrivers(),
            conductor::countActiveDrivers(),
            conductor::countDrivers()
        );
        return Inertia::render('Conductores/conductores', [
            'driversResponse' => $driversResponse
        ]);
    }
    public function saveDriver(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'NombreInput' => 'required|max:255',
                'ApellidoInput' => 'required',
                'NumeroLicenciaInput' => 'required|unique:conductores,numeroLicencia',
                'FechaInput' => 'required'
            ],
            [
                'NombreInput.required' => 'El nombre es requerido',
                'ApellidoInput.required' => 'El apellido es requerido',
                'NumeroLicenciaInput.required' => 'El numero de licencia es requerido',
                'FechaInput.required' => 'La fecha de nacimiento es requerida',
                'NumeroLicenciaInput.unique' => 'El numero de licencia ya existe'
            ]
        );
        if ($validator->fails()) {
            return redirect('/conductores')
                ->withErrors($validator->errors())
                ->withInput();
        }
        $driver = new conductor;
        $driver->nombre = $request->NombreInput;
        $driver->apellido = $request->ApellidoInput;
        $driver->numeroLicencia = $request->NumeroLicenciaInput;
        $driver->fechaNacimiento = $request->FechaInput;
        if ($driver->save()) {
            return redirect('/conductores')->with('success', 'Conductor guardado correctamente');
        } else {
            return response()->json(['errors' => $validator->errors()], 400);
        }
    }
    public function deleteDriver($id){
        $driver = conductor::find($id);
        $driver->estado = false;
        if($driver->save()){
            return redirect('/conductores')->with('success', 'Conductor desactivado correctamente');
        }else{
            return redirect('/conductores')->with('error', 'Error al desactivar conductor');
        }
    }
    public function activateDriver($id){
        $driver = conductor::find($id);
        $driver->estado = true;
        if($driver->save()){
            return redirect('/conductores')->with('success', 'Conductor activado correctamente');
        }else{
            return redirect('/conductores')->with('error', 'Error al activar conductor');
        }
    }
}
