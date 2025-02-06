<?php

namespace App\Http\Controllers;

use App\Exports\ContractExport;
use App\Models\Classificator;
use App\Models\Contract;
use App\Models\ContractCategory;
use App\Models\Contractor;
use App\Models\PaymentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReceiptOfFundsController extends Controller
{
    public function list(Request $request)
    {
        return view('receipt_of_funds/receipt_of_funds_list');
    }
    public function add()
    {
        $organizations = DB::table('organizations')->get();
        $chart_of_accounts = DB::table('chart_of_accounts')->get();
        $classificators = Classificator::all();
        return view('receipt_of_funds/receipt_of_funds_add', compact('organizations', 'chart_of_accounts', 'classificators'));
    }

    public function store(Request $request)
    {
        $classificators = Classificator::all()->sortBy('article');

        // Foydalanuvchi kiritgan barcha ma'lumotlarni olish
        $input = $request->all();

        // 'amount' maydonini tekshirish va formatlash
        if (!empty($input['amount'])) {
            // Vergullarni olib tashlash va faqat raqamlarni saqlash
            $input['amount'] = preg_replace('/[^0-9.]/', '', $input['amount']);
        }

        // Validatsiya qoidalari
        $validated = \Validator::make($input, [
            'registration_number' => 'required|string|max:255',
            'registration_date' => 'required|date',
            'type' => 'required|string',
            'number' => 'required|string|max:255',
            'date' => 'required|date',
            'contractor' => 'required|string',
            'category' => 'nullable|string',
            'details' => 'nullable|string',
            'article' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'term' => 'nullable|string',
        ])->validate();

        // Agar 'amount' qiymati bo‘sh bo‘lsa, uni 0.00 ga o‘zgartirish
        $validated['amount'] = $validated['amount'] ?? 0.00;

        // Ma'lumotni saqlash
        Contract::create($validated);

        // Saqlanganidan so'ng foydalanuvchini qaytarish
        return redirect()->route('contracts.list', compact('classificators'))
            ->with('success', 'Контракт успешно сохранен ✅');
    }

    public function show($id)
    {
        $contract = Contract::with('paymentOrders')->findOrFail($id);
        $totalPaymentAmount = $contract->paymentOrders->sum('amount');
        return view('contracts/contract-show', compact('contract', 'totalPaymentAmount'));
    }

    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        $contractors = Contractor::all()->sortBy('name');
        $categories = ContractCategory::all()->sortBy('name');
        $classificators = Classificator::all()->sortBy('article');
        return view('contracts/contract-edit', compact('contract', 'categories', 'classificators', 'contractors'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $contract = Contract::find($id);
        if (!$contract) {
            return redirect()->back()->with('error', 'Контракт не найден.');
        }

        // 'amount' maydonini tekshirish va formatlash
        if (!empty($input['amount'])) {
            $input['amount'] = preg_replace('/[^0-9.]/', '', $input['amount']);
        }

        // Validatsiya
        try {
            $validated = \Validator::make($input, [
                'registration_number' => 'required|string|max:255',
                'registration_date' => 'required|date',
                'type' => 'required|string',
                'number' => 'required|string|max:255',
                'date' => 'required|date',
                'contractor' => 'required|string',
                'category' => 'nullable|string',
                'details' => 'nullable|string',
                'article' => 'nullable|string',
                'amount' => 'nullable|numeric',
                'term' => 'required|date',
            ])->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $validated['amount'] = $validated['amount'] ?? 0.00;

        // Ma'lumotni yangilash
        $contract->update($validated);

        // Foydalanuvchini qaytarish
        return redirect()->route('contracts.show', $id)->with('success', 'Контракт успешно отредактирован ✅');
    }


    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();
        return redirect()->route('contracts.list')->with('success', 'Контракт успешно удален 🗑️');

    }

    // Export contracts in Excel format
    public function exportContracts()
    {
        return Excel::download(new ContractExport, 'contracts.xlsx');
    }
}

