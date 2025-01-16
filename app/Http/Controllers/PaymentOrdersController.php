<?php

namespace App\Http\Controllers;

use App\Models\Classificator;
use App\Models\Contract;
use App\Models\Contractor;
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

