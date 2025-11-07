<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index() : View {
        $alumnos = Alumno::all();
        return view('alumno.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    function create() : View {
        return view('alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     */
       function store(Request $request): RedirectResponse {
        //eloquent ORM
        //queda validar los datos de entrada
        $alumno = new Alumno($request->all());//eloquent
        $result = false;
        try {
            $result = $alumno->save();//eloquent, inserta objeto en la tabla
            $txtmessage = 'Se ha añadido al alumno.';
            //si llega el archivo, lo subo y lo guardo
            if($request->hasFile('fotografia')) {
                $ruta = $this->upload($request, $alumno);
                $alumno->fotografia = $ruta;
                $alumno->save();
            }

            if($request->hasFile('pdf')) {
                $ruta = $this->uploadPdf($request, $alumno);
            }

        } catch(UniqueConstraintViolationException $e) {
            $txtmessage = 'Clave única.';
        } catch(QueryException $e) {
            $txtmessage = 'Campo null';
        } catch(\Exception $e) {
            $txtmessage = 'Error fatal';
        }
        $message = [
            'mensajeTexto' => $txtmessage,
        ];
        if($result) {
            return redirect()->route('main')->with($message);
        } else {
            return back()->withInput()->withErrors($message);
        }
    }


   private function upload(Request $request, Alumno $alumno) {
        $image = $request->file('fotografia');
        $name = $alumno->id . '.' . $image->getClientOriginalExtension();
        $ruta = $image->storeAs('alumno', $name, 'public');
        //$rutaEntera1 = storage_path('app/public') . '/' . $ruta1;
        //$rutaEntera2 = storage_path('app/private') . '/' . $ruta2;
        return $ruta;
    }

  private function uploadPdf(Request $request, Alumno $alumno) {
        $pdf = $request->file('pdf');
        $name = $alumno->id . '.' . $pdf->getClientOriginalExtension();
        $name = $alumno->id . '.pdf';
        $ruta = $pdf->storeAs('pdf', $name, 'public');
        $ruta = $pdf->storeAs('pdf', $name, 'local');
        return $ruta;
    }

    /**
     * Display the specified resource.
     */
    function show(Alumno $alumno) : View {
        return view('alumno.show', ['alumno'=>$alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    function edit(Alumno $alumno): View {
        return view('alumno.edit', ['alumno'=>$alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    function update(Request $request, Alumno $alumno): RedirectResponse {
        $result = false;
        $alumno->fill($request->all());
        
        try {
            $result = $alumno->save();
            //$result = $peinado->update($request->all());
            $txtmessage = 'Se ha editado el alumno';
        } catch(UniqueConstraintViolationException $e) {
            $txtmessage = 'Primary key.';
        } catch(QueryException $e) {
            $txtmessage = 'Null value.';
        } catch(\Exception $e) {
            $txtmessage = 'Fatal error.';
        }
        $message = [
            'mensajeTexto' => $txtmessage,
        ];
        if($result) {
            return redirect()->route('main')->with($message);
        } else {
            return back()->withInput()->withErrors($message);
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy(Alumno $alumno): RedirectResponse {
        try {
            $result = $alumno->delete();
            $textMessage = 'El alumno se ha eliminado.';
        } catch(\Exception $e) {
            $textMessage = 'El alumno no se ha podido eliminar.';
            $result = false;
        }
        $message = [
            'mensajeTexto' => $textMessage,
        ];
        if($result) {
            return redirect()->route('main')->with($message);
        } else {
            return back()->withInput()->withErrors($message);
        }
        
    }
}
