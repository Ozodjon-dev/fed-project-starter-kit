@extends('layouts/fullLayoutMaster')

@section('title', 'Invoice Print')

@section('page-style')
    <link rel="stylesheet" href="{{asset(mix('css/base/pages/app-invoice-print.css'))}}">
    <style>
        /* Custom Styles for Print (Optimized for A4 Landscape Format) */
        @media print {
            @page {
                size: A5 landscape;  /* Set the page size to A4 */
                margin: 5mm; /* Optimize margins */
                color: #000;
            }
            body {
                font-size: 24pt; /* Standard font size for print */
                color: #000; /* Black text for better visibility */
                line-height: 1.4; /* Improved line height */
            }
            table {
                font-size: 14pt; /* Optimized table font size */
                width: 100%; /* Ensure table spans across the page */
                border-collapse: collapse; /* Remove spacing between table cells */
            }
            td {
                padding: 5px; /* Adjust padding */
                line-height: 0.8; /* Better line spacing for table cells */
            }
            p {
                font-size: 24pt; /* Standard paragraph font size */
                line-height: 1.5; /* Adjust paragraph line height */
                color: #000; /* Ensure black text */
                margin: 5px 0; /* Adjust top and bottom margins */
                border: 2px solid black;
            }
            .text-uppercase {
                font-size: 24pt; /* Larger font for headers */
                font-weight: bold; /* Bold headers for visibility */
                color: #000; /* Black text */
            }
            .rounded {
                border-radius: 4px; /* Slightly rounded corners */
            }
        }
        body {
            margin: 0;
            padding: 0;
            color: #000;
        }

        /* Default styling for the page (screen view) */
        p {
            font-size: 24px;
            padding: 10px;
            margin: 5px;
            color: #000;
        }
    </style>

@endsection

@section('content')
    <div class="invoice-print mt-2" style="color: black">
        <div class="container-fluid mt-2" style="height: 50%">
            <div class="d-flex justify-content-center" style="margin-top: 10px">
                <p class="text-uppercase" style="border: 0; padding: 5px; margin-top: 10px">
                    <strong>Платежное поручение №</strong>
                </p>
                <p class="ms-25 rounded" style="margin: 0">{{ $paymentOrder->number }}</p>
            </div>
            <table class="dataTable m-0 mb-2">
                <tbody>
                <tr>
                    <td>ДАТА</td>
                    <td><p style="border: 0; margin: 0">{{ \Carbon\Carbon::parse($paymentOrder->date)->format('d.m.Y') }}</p></td>
                </tr>
                <tr>
                    <td>Наименование плательщика</td>
                    <td colspan="3"><p class="font-weight-semibold mb-25 rounded" style="margin: 0">{{ $paymentOrder->applicant }}</p></td>
                </tr>
                <tr>
                    <td><strong>ДЕБЕТ</strong> счет плательщика:</td>
                    <td><p class="rounded" style="margin: 0">{{ $paymentOrder->applicant_bank_account }}</p></td>
                    <td>ИНН плательщика:</td>
                    <td><p class="font-weight-semibold mb-25 rounded" style="margin: 0">{{ $paymentOrder->applicant_tin }}</p></td>
                </tr>
                <tr>
                    <td>Наимен. банка плательшика:</td>
                    <td><p class="rounded" style="margin: 0">{{ $paymentOrder->applicant_bank_name }}</p></td>
                    <td>Код банка плательщика:</td>
                    <td><p class="rounded" style="margin: 0">{{ $paymentOrder->applicant_bank_code }}</p></td>
                </tr>
                <tr>
                    <td>СУММА</td>
                    <td><p class="font-weight-semibold mb-25 rounded" style="margin: 0"><b>{{ number_format($paymentOrder->amount, 2, '.', ',') }}</b></p></td>
                </tr>
                <tr>
                    <td>Наименование получателя:</td>
                    <td colspan="3"><p class="font-weight-semibold mb-25 rounded" style="margin: 0">{{ $paymentOrder->contractor }}</p></td>
                </tr>
                <tr>
                    <td><strong>КРЕДИТ</strong> счет получателя:</td>
                    <td><p class="font-weight-semibold mb-15 rounded" style="margin: 0">{{ $paymentOrder->beneficiary_bank_account }}</p></td>
                    <td>ИНН получателя:</td>
                    <td><p class="font-weight-semibold mb-25 rounded" style="margin: 0">{{ $paymentOrder->beneficiary_tin }}</p></td>
                </tr>
                <tr>
                    <td>Наимен. банка получателя:</td>
                    <td><p class="font-weight-semibold mb-25 rounded" style="margin: 0">{{ $paymentOrder->beneficiary_bank_name }}</p></td>
                    <td>Код банка получателя:</td>
                    <td><p class="font-weight-semibold mb-25 rounded" style="margin: 0">{{ $paymentOrder->beneficiary_bank_code }}</p></td>
                </tr>
                <tr>
                    <td>Сумма прописью</td>
                    <td colspan="3"><p class="font-weight-semibold mb-25 rounded" style="margin: 0">{{ $paymentOrder->amount_in_words }}</p></td>
                </tr>
                <tr>
                    <td>Детали платежа</td>
                    <td colspan="3"><p class="font-weight-semibold mb-25 rounded" style="margin: 0">{{ $paymentOrder->details }}</p></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Руководитель ____________________</td>
                    <td>Главный бухгалтер</td>
                    <td>____________________</td>
                </tr>
                <tr>
                    <td>М.П.</td>
                    <td colspan="3"><p class="font-weight-semibold mb-25 rounded" style="margin: 0; height: 100px">Банк</p></td>
                </tr>

                </tbody>
            </table>
{{--            <div class="invoice-print">--}}
{{--                <div class="d-flex align-items-center mb-2 invoice-print">--}}
{{--                    <div class="d-flex align-items-center" style="min-width: 270px">--}}
{{--                        <span class="title"></span>--}}
{{--                        <span class="title ms-50"></span>--}}
{{--                    </div>--}}
{{--                    <div class="form-control ms-50 mt-md-0" style="height: 100px; width: 1185px; border: 2px solid black">--}}
{{--                        <div class="row invoice-print w-100">--}}
{{--                            <div class="col" style="max-width: 100px">--}}
{{--                                <b>БАНК</b>--}}
{{--                            </div>--}}
{{--                            <div class="col me-2">Проверен--}}
{{--                                <div type="number" class="form-control" style="height: 40px; border: 2px solid black"></div>--}}
{{--                            </div>--}}
{{--                            <div class="col me-2">Одобрен--}}
{{--                                <div type="number" class="form-control" style="height: 40px; border: 2px solid black"></div>--}}
{{--                            </div>--}}
{{--                            <div class="col me-2">Проведено банком--}}
{{--                                <div type="number" class="form-control" style="height: 40px; border: 2px solid black"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice-print.js')}}"></script>
@endsection
