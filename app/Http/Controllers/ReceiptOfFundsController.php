<?php

namespace App\Http\Controllers;

use App\Exports\ContractExport;
use App\Models\Classificator;
use App\Models\Contract;
use App\Models\ContractCategory;
use App\Models\Contractor;
use App\Models\PaymentOrder;
use App\Models\ReceiptOfFund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReceiptOfFundsController extends Controller
{
    public function list(Request $request)
    {
        $search = $request->input('search'); // Qidiruv so‘rovi

        $receipt_of_funds = ReceiptOfFund::with('contract') // Contract ma'lumotlarini yuklash
        ->when($search, function ($query, $search) {
            return $query->where('number', 'like', "%{$search}%")
                ->orWhere('date', 'like', "%{$search}%")
                ->orWhere('bank_account', 'like', "%{$search}%")
                ->orWhere('debit_chart_of_account', 'like', "%{$search}%")
                ->orWhere('credit_chart_of_account', 'like', "%{$search}%")
                ->orWhere('article', 'like', "%{$search}%")
                ->orWhere('details', 'like', "%{$search}%")
                ->orWhere('amount', 'like', "%{$search}%")
                ->orWhereHas('contract', function ($contractQuery) use ($search) {
                    $contractQuery->where('number', 'like', "%{$search}%")
                        ->orWhere('contractor', 'like', "%{$search}%");
                });
        })
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('receipt_of_funds.receipt_of_funds_list', compact('receipt_of_funds'));
    }

    public function add()
    {
        $organizations = DB::table('organizations')->get();
        $chart_of_accounts = DB::table('chart_of_accounts')->get();
        $classificators = Classificator::all();
        $contracts = Contract::all();
        return view('receipt_of_funds/receipt_of_funds_add', compact('organizations', 'chart_of_accounts', 'classificators', 'contracts'));
    }

    public function store(Request $request)
    {
        // Foydalanuvchi kiritgan barcha ma'lumotlarni olish
        $input = $request->all();

        // 'amount' maydonini tekshirish va formatlash
        if (!empty($input['amount'])) {
            // Vergullarni olib tashlash va faqat raqamlarni saqlash
            $input['amount'] = preg_replace('/[^0-9.]/', '', $input['amount']);
        }

        // Validatsiya qoidalari
        $validated = \Validator::make($input, [
            'number' => 'required|string|max:255',
            'date' => 'required|date',
            'bank_account' => 'required|string',
            'debit_chart_of_account' => 'required|string',
            'credit_chart_of_account' => 'required|string',
            'contract_id' => 'nullable|exists:contracts,id',
            'article' => 'nullable|string',
            'details' => 'required|string',
            'amount' => 'required|numeric'
        ])->validate();
        // Agar 'amount' qiymati bo‘sh bo‘lsa, uni 0.00 ga o‘zgartirish
        $validated['amount'] = $validated['amount'] ?? 0.00;

        // Ma'lumotni saqlash
        ReceiptOfFund::create($validated);

        // Saqlanganidan so'ng foydalanuvchini qaytarish
        return redirect()->route('receipt_of_funds.list')
            ->with('success', 'Поступление денежных средств успешно сохранено ✅');
    }

    public function show($id)
    {
        $receipt_of_fund = ReceiptOfFund::with('contract')->find($id);
        return view('receipt_of_funds/receipt_of_funds_show', compact('receipt_of_fund'));
    }

    public function edit($id)
    {
        $organizations = DB::table('organizations')->get();
        $chart_of_accounts = DB::table('chart_of_accounts')->get();
        $classificators = Classificator::all();
        $contracts = Contract::all();
        $receipt_of_fund = ReceiptOfFund::with('contract')->find($id);
        return view('receipt_of_funds/receipt_of_funds_edit', compact('receipt_of_fund', 'organizations', 'chart_of_accounts', 'classificators', 'contracts'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $receipt_of_fund = ReceiptOfFund::find($id);
//        if (!$contract) {
//            return redirect()->back()->with('error', 'Контракт не найден.');
//        }

        // 'amount' maydonini tekshirish va formatlash
        if (!empty($input['amount'])) {
            $input['amount'] = preg_replace('/[^0-9.]/', '', $input['amount']);
        }

        // Validatsiya
        try {
            $validated = \Validator::make($input, [
                'number' => 'required|string|max:255',
                'date' => 'required|date',
                'bank_account' => 'required|string',
                'debit_chart_of_account' => 'required|string',
                'credit_chart_of_account' => 'required|string',
                'contract_id' => 'nullable|exists:contracts,id',
                'article' => 'nullable|string',
                'details' => 'required|string',
                'amount' => 'required|numeric'
            ])->validate();

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $validated['amount'] = $validated['amount'] ?? 0.00;

        // Ma'lumotni yangilash
        $receipt_of_fund->update($validated);

        // Foydalanuvchini qaytarish
        return redirect()->route('receipt_of_funds.show', $id)->with('success', 'Поступление денежных средств успешно отредактирован ✅');
    }


    public function destroy($id)
    {
        $receipt_of_fund = ReceiptOfFund::findOrFail($id);
        $receipt_of_fund->delete();
        return redirect()->route('receipt_of_funds.list')->with('success', 'Поступление денежных средств успешно удален 🗑️');

    }

    // Export contracts in Excel format
    public function exportContracts()
    {
        return Excel::download(new ContractExport, 'contracts.xlsx');
    }
}

