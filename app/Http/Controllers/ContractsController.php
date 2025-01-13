<?php

namespace App\Http\Controllers;

use App\Models\Classificator;
use App\Models\Contract;
use App\Models\ContractCategory;
use App\Models\Contractor;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    public function list()
    {
        return view('contracts/contract-list');
    }

    public function add()
    {
        $contractors = Contractor::all()->sortBy('name');
        $categories = ContractCategory::all()->sortBy('name');
        $classificators = Classificator::all()->sortBy('article');
        return view('contracts/contract-add', compact('contractors', 'categories', 'classificators'));
    }

//    public function store()
//    {
//        $data = request()->validate([
//            'registration_number' => 'required',
//            'registration_date' => 'required',
//            'type' => 'required',
//            'number' => 'required',
//            'date' => 'required',
//            'contractor' => 'required',
//            'category' => 'required',
//            'details' => 'required',
//            'article' => 'required',
//            'amount' => 'required',
//            'term' => 'required',
//            'status' => 'required',
//        ]);
//        Contract::create($data);
//        return redirect()->route('contracts.list');
//    }

    public function store(Request $request)
    {
        $classificators = Classificator::all()->sortBy('article');
        $validated = $request->validate([
            'registration_number' => 'required|string|max:255',
            'registration_date' => 'required|date',
            'type' => 'required|string',
            'number' => 'required|string|max:255',
            'date' => 'required|date',
            'contractor' => 'required|string',
            'category' => 'required|string',
            'details' => 'required|string',
            'article' => 'required|string',
            'amount' => 'required',
            'term' => 'required|date',
        ]);

        // Saqlash jarayoni
        Contract::create($validated);

        return redirect()->route('contracts.list', compact('classificators'))->with('success', 'Dover saqlandi');
    }


    public function edit()
    {
        return view('contracts/contract-edit');
    }

}

