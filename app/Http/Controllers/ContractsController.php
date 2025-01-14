<?php

namespace App\Http\Controllers;

use App\Models\Classificator;
use App\Models\Contract;
use App\Models\ContractCategory;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractsController extends Controller
{
    public function list()
    {
        $contracts = Contract::all();
        return view('contracts/contract-list', compact('contracts'));
    }

    public function add()
    {
        $contractors = Contractor::all()->sortBy('name');
        $categories = ContractCategory::all()->sortBy('name');
        $classificators = Classificator::all()->sortBy('article');
        return view('contracts/contract-add', compact('contractors', 'categories', 'classificators'));
    }

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
            'category' => '',
            'details' => '',
            'article' => '',
            'amount' => '',
            'term' => '',
        ]);

        // Saqlash jarayoni
        Contract::create($validated);

        return redirect()->route('contracts.list', compact('classificators'))->with('success', 'Контракт успешно сохранен 😊');
    }

    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        return view('contracts/contract-show', compact('contract'));
    }

    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        $contractors = Contractor::all()->sortBy('name');
        $categories = ContractCategory::all()->sortBy('name');
        $classificators = Classificator::all()->sortBy('article');
        return view('contracts/contract-edit', compact('contract', 'categories', 'classificators', 'contractors'));
    }

    public function update($id)
    {
        $contract = Contract::findOrFail($id);
        $validated = request()->validate([
            'registration_number' => 'required|string|max:255',
            'registration_date' => 'required|date',
            'type' => 'required|string',
            'number' => 'required|string|max:255',
            'date' => 'required|date',
            'contractor' => 'required|string',
            'category' => '',
            'details' => '',
            'article' => '',
            'amount' => '',
            'term' => '',
        ]);
        $contract->update($validated);
        return redirect()->route('contracts.show', $id)->with('success', 'Контракт успешно отредактирован 😊');
    }

    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();
        return redirect()->route('contracts.list')->with('success', 'Контракт успешно удален 😊');

    }
}

