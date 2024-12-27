<?php

namespace App\Http\Controllers;

use App\Models\Contract;

class ContractsController extends Controller
{
    public function list()
    {
        return view('contracts/contract-list');
    }

    public function add()
    {
        return view('contracts/contract-add');
    }

    public function edit()
    {
        return view('contracts/contract-edit');
    }

}

