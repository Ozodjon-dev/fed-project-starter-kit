<?php

namespace App\Http\Controllers;

use App\Models\Classificator;
use App\Models\Contract;
use App\Models\Contractor;
use App\Models\PaymentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentOrdersController extends Controller
{
    public function list()
    {

        return view('payment_orders/payment-order-list');
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
            'contract' => 'required|string',
            'article' => 'required|string'
        ])->validate();

        // Agar 'amount' qiymati bo‘sh bo‘lsa, uni 0.00 ga o‘zgartirish
        $validated['amount'] = $validated['amount'] ?? 0.00;

        // Ma'lumotni saqlash
        PaymentOrder::create($validated);

        // Saqlanganidan so'ng foydalanuvchini qaytarish
        return redirect()->route('payment_orders.list')
            ->with('success', 'Контракт успешно сохранен 😊');
    }

    public function edit()
    {
        return view('payment_orders/payment-order-edit');
    }

    public function preview()
    {
        return view('payment_orders/payment-order-preview');
    }

    public function print()
    {
        return view('payment_orders/payment-order-print');
    }

}

