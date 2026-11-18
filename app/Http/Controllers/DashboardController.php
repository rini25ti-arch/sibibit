<?php

namespace App\Http\Controllers;

use App\Models\Varietas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVarietas = Varietas::count();
        $varietasTerbaru = Varietas::latest()->take(5)->get();

        return view('dashboard', compact('totalVarietas', 'varietasTerbaru'));
    }
}