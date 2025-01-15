<?php

namespace App\Http\Controllers;

use App\Exports\ContractExport;
use App\Models\Classificator;
use App\Models\Contract;
use App\Models\ContractCategory;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ContractsController extends Controller
{
    public function list(Request $request)
    {
        $search = $request->input('search'); // Search word

        $contracts = Contract::when($search, function ($query, $search) {
            return $query->where('registration_number', 'like', "%{$search}%")
                ->orWhere('registration_date', 'like', "%{$search}%")
                ->orWhere('type', 'like', "%{$search}%")
                ->orWhere('number', 'like', "%{$search}%")
                ->orWhere('date', 'like', "%{$search}%")
                ->orWhere('contractor', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%")
                ->orWhere('details', 'like', "%{$search}%")
                ->orWhere('article', 'like', "%{$search}%")
                ->orWhere('amount', 'like', "%{$search}%")
                ->orWhere('term', 'like', "%{$search}%");
        })
            ->paginate(10);

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
            'amount' => 'nullable|numeric', // Even if amount is empty, it checks it as a numeric value
            'term' => '',
        ]);

        // If the amount value is not entered, change it to 0.00
        if (empty($validated['amount'])) {
            $validated['amount'] = 0.00;
        }

        // Storage process
        Contract::create($validated);

        // After saving the new contract, return to the list
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
            'amount' => 'nullable|numeric', // Even if amount is empty, it checks it as a numeric value
            'term' => '',
        ]);

        // If the amount value is not entered, change it to 0.00
        if (empty($validated['amount'])) {
            $validated['amount'] = 0.00;
        }

        $contract->update($validated);
        return redirect()->route('contracts.show', $id)->with('success', 'Контракт успешно отредактирован 😊');
    }

    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();
        return redirect()->route('contracts.list')->with('success', 'Контракт успешно удален 😊');

    }

    // Export contracts in Excel format
    public function exportContracts()
    {
        return Excel::download(new ContractExport, 'contracts.xlsx');
    }
}

