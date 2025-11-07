<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    function main() {
        return view('main.main');
    }
}
