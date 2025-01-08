<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use Illuminate\Support\Facades\DB;

class ContractorsController extends Controller
{
    public function list()
    {
        $contractors = Contractor::all();
        return view('contractors/contractor-list', compact('contractors'));
    }

    public function add()
    {
        $banks = DB::table('banks')->get();
        return view('contractors/contractor-add', compact('banks'));
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

    public function show($id){
        $contractor = Contractor::findOrFail($id);
        return view('contractors/contractor-show', compact('contractor'));
    }

    public function edit()
    {
        return view('contracts/contractor-edit');
    }

}

