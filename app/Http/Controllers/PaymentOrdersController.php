<?php

namespace App\Http\Controllers;

use App\Models\Contract;

class PaymentOrdersController extends Controller
{
    public function list()
    {
        return view('payment-order-list');
    }

    public function add()
    {
        return view('payment-order-add');
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

