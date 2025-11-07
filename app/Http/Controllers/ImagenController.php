<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class ImagenController extends Controller {
    
    function imagen($idimagen) {
        $alumno = Alumno::find($idimagen);
        if($alumno == null || $alumno->fotografia == null) {
            //dd(base_path('public/assets/img/noimage.jpg'));
            return response()->file(base_path('public/assets/img/noimage.png'));
        }
        return response()->file(storage_path('app/public') . '/' . $alumno->fotografia);
    }
}