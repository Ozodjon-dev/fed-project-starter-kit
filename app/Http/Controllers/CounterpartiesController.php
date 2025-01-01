<?php

namespace App\Http\Controllers;

use App\Models\Contract;

class CounterpartiesController extends Controller
{
    public function list()
    {
        return view('counterparties/counterparty-list');
    }

    public function add()
    {
        return view('counterparties/counterparty-add');
    }

    public function edit()
    {
        return view('contracts/contract-edit');
    }

}

