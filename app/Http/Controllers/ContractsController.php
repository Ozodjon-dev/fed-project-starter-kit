<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Contractor;

class ContractsController extends Controller
{
    public function list()
    {
        return view('contracts/contract-list');
    }

    public function add()
    {
        $contractors = Contractor::all()->sortBy('name');
        return view('contracts/contract-add', compact('contractors'));
    }

    public function edit()
    {
        return view('contracts/contract-edit');
    }

}

