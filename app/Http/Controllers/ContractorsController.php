<?php

namespace App\Http\Controllers;

use App\Models\Contractor;

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

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'bank_name' => 'required',
            'bank_account' => 'required',
            'tin' => 'required',
            'bank_code' => 'required'
        ]);
        Contractor::create($data);
        return redirect()->route('contractors.list');
    }

    public function edit()
    {
        return view('contracts/contractor-edit');
    }

}

