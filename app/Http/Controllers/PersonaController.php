<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Rules\RutValidation;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Persona::all();

        return view('personas.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "nombre" => "string|required",
                "apellido" => "string|required",
                "rut" => ["string", "required", "unique:personas", new RutValidation],
                "fecha_nacimiento" => "date"
            ],
            [
                "nombre.required" => "El nombre es requerido",
                "nombre.string" => "El nombre debe ser una cadena de texto",
                "apellido.required" => "El apellido es requerido",
                "apellido.string" => "El apellido debe ser una cadena de texto",
                "rut.required" => "El rut es requerido",
                "rut.string" => "El rut debe ser una cadena de texto",
                "rut.unique" => "Este rut ya se encuentra registrado",
                "fecha_nacimiento.required" => "La fecha de nacimiento es requerida",
                "fecha_nacimiento.date" => "La fecha de nacimiento debe tener formato de fecha",
            ],
        );

        $person = Persona::create([
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
            "rut" => $request->rut,
            "fecha_nacimiento" => $request->fecha_nacimiento,
        ]);

        return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show($persona)
    {
        $person = Persona::findOrFail($persona);

        return response()->json($person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($persona)
    {
        $person = Persona::findOrFail($persona);
        return view('personas.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $persona)
    {
        $request->validate(
            [
                "nombre" => "string|required",
                "apellido" => "string|required",
                "fecha_nacimiento" => "date"
            ],
            [
                "nombre.required" => "El nombre es requerido",
                "nombre.string" => "El nombre debe ser una cadena de texto",
                "apellido.required" => "El apellido es requerido",
                "apellido.string" => "El apellido debe ser una cadena de texto",
                "fecha_nacimiento.required" => "La fecha de nacimiento es requerida",
                "fecha_nacimiento.date" => "La fecha de nacimiento debe tener formato de fecha",
            ],
        );

        $persona = Persona::findOrFail($persona);

        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;

        $persona->save();

        return redirect()->route('persona.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($persona)
    {

        Persona::destroy($persona);

        return redirect()->route('persona.index');
    }   
}
