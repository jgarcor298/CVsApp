<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';

    protected $fillable = ['nombre', 'apellidos', 'telefono', 'fecha_nacimiento', 
                            'correo', 'nota_media', 'experiencia', 'formacion', 
                            'habilidades', 'fotografia'];

 function getPdf() {
        return url('storage/pdf') . '/' . $this->id . '.pdf';
    }

    function isPdf() {
        return file_exists(storage_path('app/public/pdf') . '/' . $this->id . '.pdf');
    }

}
