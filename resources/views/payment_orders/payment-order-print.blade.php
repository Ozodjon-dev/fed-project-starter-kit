@extends('layouts/fullLayoutMaster')

@section('title', 'Invoice Print')

@section('page-style')
    <link rel="stylesheet" href="{{asset(mix('css/base/pages/app-invoice-print.css'))}}">
    <style>
        p {
            border: 2px solid black;
            padding: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="invoice-print mt-2" style="color: black">
        <div class="d-flex justify-content-center">
            <p class="text-uppercase"
               style="border: 0px;
                padding: 10px">
                <strong>Платежное поручение №</strong>
            </p>
            <p class="ms-25 rounded">{{ $paymentOrder->number }}</p>
        </div>


        <div class="container-fluid mt-2" style="height: 50%">
            <table class="dataTable m-0 mb-2">
                <tbody>
                <tr>
                    <td>
                        ДАТА
                    </td>
                    <td class="">
                        <p class="" style="border: 0">{{ $paymentOrder->date }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Наименование плательщика
                    </td>
                    <td colspan="3">
                        <p class="font-weight-semibold mb-25 rounded">{{ $paymentOrder->applicant }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>ДЕБЕТ</strong>
                        счет
                        плательщика:
                    </td>
                    <td>
                        <p class="rounded">{{ $paymentOrder->applicant_bank_account }}</p>
                    </td>
                    <td>
                        ИНН
                        плательщика:
                    </td>
                    <td>
                        <p class="font-weight-semibold mb-25 rounded">{{ $paymentOrder->applicant_tin }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Наимен.
                        банка
                        плательшика:
                    </td>
                    <td>
                        <p class="rounded">{{ $paymentOrder->applicant_bank_name }}</p>
                    </td>
                    <td>
                        Код
                        банка
                        плательщика:
                    </td>
                    <td>
                        <p class="rounded">{{ $paymentOrder->applicant_bank_code }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        СУММА
                    </td>
                    <td>
                        <p class="font-weight-semibold mb-25 rounded">{{ number_format($paymentOrder->amount, 2, '.', ',') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Наименование
                        получателя:
                    </td>
                    <td colspan="3">
                        <p class="font-weight-semibold mb-25 rounded">{{ $paymentOrder->contractor }}</p>
                    </td>
                </tr>
                <tr>
                    <td><strong>КРЕДИТ</strong>
                        счет
                        получателя:
                    </td>
                    <td>
                        <p class="font-weight-semibold mb-15 rounded">{{ $paymentOrder->beneficiary_bank_account }}</p>
                    </td>
                    <td>
                        ИНН
                        получателя:
                    </td>
                    <td>
                        <p class="font-weight-semibold mb-25 rounded">{{ $paymentOrder->beneficiary_tin }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Наимен.
                        банка
                        получателя:
                    </td>
                    <td>
                        <p class="font-weight-semibold mb-25 rounded">{{ $paymentOrder->beneficiary_bank_name }}</p>
                    </td>
                    <td>
                        Код
                        банка
                        получателя:
                    </td>
                    <td>
                        <p class="font-weight-semibold mb-25 rounded">{{ $paymentOrder->beneficiary_bank_code }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Сумма прописью
                    </td>
                    <td colspan="3">
                        <p class="font-weight-semibold mb-25 rounded">{{ $paymentOrder->amount_in_words }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Детали
                        платежа
                    </td>
                    <td colspan="3">
                        <p class="font-weight-semibold mb-25 rounded">{{ $paymentOrder->details }}</p>
                    </td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td>
                        Руководитель ____________________________
                    </td>
                    <td>
                        Главный бухгалтер ____________________________
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="invoice-print">

                <div class="d-flex align-items-center mt-2  mb-2 invoice-print">

                    <div class="d-flex align-items-center" style="min-width: 265px">
                        <span class="title"></span>
                        <span class="title ms-50"></span>
                    </div>

                    <div class="form-control ms-50 mt-md-0" style="height: 100px; width: 1150px">
                        <div class="row invoice-print w-100">
                            <div class="col" style="max-width: 100px">
                                <b>БАНК</b>
                            </div>
                            <div class="col me-2">Проверен
                                <div type="number" class="form-control" style="height: 40px"></div>
                            </div>
                            <div class="col me-2">Одобрен
                                <div type="number" class="form-control" style="height: 40px"></div>
                            </div>
                            <div class="col me-2">Проведено банком
                                <div type="number" class="form-control" style="height: 40px"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice-print.js')}}"></script>
@endsection
