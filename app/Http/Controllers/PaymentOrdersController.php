<?php

namespace App\Http\Controllers;

use App\Exports\PaymentOrdersExport;
use App\Models\Classificator;
use App\Models\Contract;
use App\Models\Contractor;
use App\Models\PaymentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat\Wizard\DateTime;

class PaymentOrdersController extends Controller
{
    public function list(Request $request)
    {
        $search = $request->input('search'); // Search word

        $paymentOrders = PaymentOrder::when($search, function ($query, $search) {
            return $query->where('number', 'like', "%{$search}%")
                ->orWhere('date', 'like', "%{$search}%")
                ->orWhere('applicant', 'like', "%{$search}%")
                ->orWhere('applicant_bank_account', 'like', "%{$search}%")
                ->orWhere('applicant_tin', 'like', "%{$search}%")
                ->orWhere('applicant_bank_name', 'like', "%{$search}%")
                ->orWhere('applicant_bank_code', 'like', "%{$search}%")
                ->orWhere('amount', 'like', "%{$search}%")
                ->orWhere('contractor', 'like', "%{$search}%")
                ->orWhere('beneficiary_bank_account', 'like', "%{$search}%")
                ->orWhere('beneficiary_tin', 'like', "%{$search}%")
                ->orWhere('beneficiary_bank_name', 'like', "%{$search}%")
                ->orWhere('beneficiary_bank_code', 'like', "%{$search}%")
                ->orWhere('amount_in_words', 'like', "%{$search}%")
                ->orWhere('details', 'like', "%{$search}%")
                ->orWhere('debit_chart_of_account', 'like', "%{$search}%")
                ->orWhere('credit_chart_of_account', 'like', "%{$search}%")
                ->orWhere('contract', 'like', "%{$search}%")
                ->orWhere('article', 'like', "%{$search}%");
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('payment_orders/payment-order-list', compact('paymentOrders'));
    }

    public function add()
    {
        $bank_accounts = DB::table('bank_accounts')->get();
        $organizations = DB::table('organizations')->get();
        $chart_of_accounts = DB::table('chart_of_accounts')->get();
        $classificators = Classificator::all();
        $contractors = Contractor::all();
        $contracts = Contract::all();
        return view('payment_orders/payment-order-add', compact('classificators', 'bank_accounts', 'organizations', 'contractors', 'contracts', 'chart_of_accounts'));
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
            'applicant' => 'required|string',
            'applicant_bank_account' => 'required|string',
            'applicant_tin' => 'required|string',
            'applicant_bank_name' => 'required|string',
            'applicant_bank_code' => 'required|string',
            'amount' => 'required|numeric',
            'contractor' => 'required|string',
            'beneficiary_bank_account' => 'required|string',
            'beneficiary_tin' => 'required|string',
            'beneficiary_bank_name' => 'required|string',
            'beneficiary_bank_code' => 'required|string',
            'amount_in_words' => 'required|string',
            'details' => 'required|string',
            'debit_chart_of_account' => 'required|string',
            'credit_chart_of_account' => 'required|string',
            'contract_id' => 'nullable|exists:contracts,id',
            'article' => 'nullable|string'
        ])->validate();

        // Agar 'amount' qiymati bo‘sh bo‘lsa, uni 0.00 ga o‘zgartirish
        $validated['amount'] = $validated['amount'] ?? 0.00;

        // Ma'lumotni saqlash
        PaymentOrder::create($validated);

        // Saqlanganidan so'ng foydalanuvchini qaytarish
        return redirect()->route('payment_orders.list')
            ->with('success', 'Платежное поручение успешно сохранено ✅');
    }

    public function preview($id)
    {
        $paymentOrder = PaymentOrder::findOrFail($id);
        return view('payment_orders/payment-order-preview', compact('paymentOrder'));
    }

    public function print($id)
    {
        $paymentOrder = PaymentOrder::findOrFail($id);
        return view('payment_orders/payment-order-print', compact('paymentOrder'));
    }

    public function edit($id)
    {
        $paymentOrder = PaymentOrder::findOrFail($id);
        $bank_accounts = DB::table('bank_accounts')->get();
        $organizations = DB::table('organizations')->get();
        $chart_of_accounts = DB::table('chart_of_accounts')->get();
        $contractors = Contractor::all();
        $contracts = Contract::all();
        $classificators = Classificator::all()->sortBy('article');
        return view('payment_orders/payment-order-edit', compact('classificators', 'bank_accounts', 'paymentOrder', 'organizations', 'contractors', 'contracts', 'chart_of_accounts'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $paymentOrder = PaymentOrder::find($id);

        // 'amount' maydonini tekshirish va formatlash
        if (!empty($input['amount'])) {
            // Vergullarni olib tashlash va faqat raqamlarni saqlash
            $input['amount'] = preg_replace('/[^0-9.]/', '', $input['amount']);
        }

        // Validatsiya
        try {
            $validated = \Validator::make($input, [
                'number' => 'required|string|max:255',
                'date' => 'required|date',
                'applicant' => 'required|string',
                'applicant_bank_account' => 'required|string',
                'applicant_tin' => 'required|string',
                'applicant_bank_name' => 'required|string',
                'applicant_bank_code' => 'required|string',
                'amount' => 'required|numeric',
                'contractor' => 'required|string',
                'beneficiary_bank_account' => 'required|string',
                'beneficiary_tin' => 'required|string',
                'beneficiary_bank_name' => 'required|string',
                'beneficiary_bank_code' => 'required|string',
                'amount_in_words' => 'required|string',
                'details' => 'required|string',
                'debit_chart_of_account' => 'required|string',
                'credit_chart_of_account' => 'required|string',
                'contract_id' => 'nullable|exists:contracts,id',
                'article' => 'nullable|string'
            ])->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $validated['amount'] = $validated['amount'] ?? 0.00;

        // Ma'lumotni yangilash
        $paymentOrder->update($validated);

        // Foydalanuvchini qaytarish
        return redirect()->route('payment_orders.preview', $id)->with('success', 'Платежное поручение успешно отредактировано ✅');
    }

    public function destroy($id)
    {
        $paymentOrder = PaymentOrder::findOrFail($id);
        $paymentOrder->delete();
        return redirect()->route('payment_orders.list')->with('success', 'Платежное поручение успешно удалено 🗑️');

    }

    // Export payment orders in Excel format
    public function exportPaymentOrders()
    {
        return Excel::download(new PaymentOrdersExport, 'payment_orders.xlsx');
    }

}

