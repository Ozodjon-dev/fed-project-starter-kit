<?php

namespace App\Http\Controllers;

use App\Models\Classificator;
use App\Models\Contract;
use Illuminate\Support\Facades\DB;

class PaymentOrdersController extends Controller
{
    public function list()
    {

        return view('payment-order-list');
    }

    public function add()
    {
        $classificators = Classificator::all();
        return view('payment-order-add', compact('classificators'));
    }

    public function edit()
    {
        return view('payment-order-edit');
    }

    public function preview()
    {
        return view('payment-order-preview');
    }

    public function print()
    {
        return view('payment-order-print');
    }

}

