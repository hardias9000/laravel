<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactoConntroller
{
    public function index()
    {
        return view('index');
    }

    public function registros()
    {
        $mensajes = [];
        //leer mensaje del archivo json
        if (Storage::exists('mensajes.json')) {
            $contenido = Storage::get('mensajes.json');
            $mensajes = json_decode($contenido, true) ?? [];
        }
        return view('registros', compact('mensajes'));
    }

    //validacion del servidor
    public function guardarMensaje(Request $request)
    {
        //valida servidor
        $request->validate([
            'nombre' => 'required|min:2|max:45',
            'email' => 'required|email',
            'mensaje' => 'required|min:10|max:200'
        ]);

        try {
            $mensajes = [];

            //leer mensaje existente
            if (Storage::exists('mensajes.json')) {
                $contenido = Storage::get('mensajes.json');
                $mensajes = json_decode($contenido, true) ?? [];
            }

            //Agregar nuevo mensaje
            $mensajeNuevo = [
                'id' => uniqid(),
                'nombre' => $request->nombre,
                'email' => $request->email,
                'mensaje' => $request->mensaje,
            ];

            $mensajes[] = $mensajeNuevo;

            //Guarda en archivo json
            Storage::put('mensajes.json', json_encode($mensajes, JSON_PRETTY_PRINT));
            return response()->json([
                'success' => true,
                'message' => 'Mensaje guardado correctamente',
                'data' => $mensajeNuevo
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar correctamente: ' . $e->getMessage()
            ], 500);
        }
    }
}
