<?php

namespace App\Http\Controllers;

use App\Models\Contract;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }
}

