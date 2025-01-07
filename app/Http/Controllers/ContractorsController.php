<?php

namespace App\Http\Controllers;

use App\Models\Contract;

class ContractorsController extends Controller
{
    public function list()
    {
        return view('contractors/contractor-list');
    }

    public function add()
    {
        return view('contractors/contractor-add');
    }

    public function edit()
    {
        return view('contracts/contractor-edit');
    }

}

