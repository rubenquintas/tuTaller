<?php

namespace App\Http\Controllers\Concesionario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('concesionario.dashboard');
    }
}
