@extends('layouts/contentLayoutMaster')


@section('title', 'Invoice Preview')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
    <style>
        p {
            border-style: solid;
            border-width: 1px;
            padding: 10px;
            border-color: #6e6b7b;
            border-radius: 4px;
        }
    </style>
@endsection

@section('content')
    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12">
                <div class="card invoice-preview-card">


                    <div class="invoice-print mt-2">
                        <div class="d-flex justify-content-center">
                            <p class="text-uppercase"
                               style="border: 0px;
                padding: 10px">
                                <strong>Платежное поручение №</strong>
                            </p>
                            <p class="ms-25" >324</p>
                        </div>


                        <div class="container-fluid mt-2">
                            <table class="dataTable m-0">
                                <tbody>
                                <tr>
                                    <td>
                                        ДАТА
                                    </td>
                                    <td class="">
                                        <p class="" style="border: 0">2024-12-21</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Наименование плательщика
                                    </td>
                                    <td colspan="3">
                                        <p class="font-weight-semibold mb-25">
                                            1-организация
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>ДЕБЕТ</strong>
                                        счет
                                        плательщика:
                                    </td>
                                    <td>
                                        <p>2000900876649524618</p>
                                    </td>
                                    <td class="">
                                        ИНН
                                        плательщика:
                                    </td>
                                    <td>
                                        <p class="font-weight-semibold mb-25">700306544</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Наимен.
                                        банка
                                        плательшика:
                                    </td>
                                    <td class="">
                                        <p>РКЦ ЦБ по г. Ташкенту</p>
                                    </td>
                                    <td class="">
                                        Код
                                        банка
                                        плательщика:
                                    </td>
                                    <td class="py-1 pl-4">
                                        <p>00014</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        СУММА
                                    </td>
                                    <td class="py-1 pl-4">
                                        <p class="font-weight-semibold mb-25">0,00</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Наименование
                                        получателя:
                                    </td>
                                    <td class="" colspan="3">
                                        <p class="font-weight-semibold mb-25">1-организация</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>КРЕДИТ</strong>
                                        счет
                                        получателя:
                                    </td>
                                    <td class="">
                                        <p class="font-weight-semibold mb-15">2000900876649524618</p>
                                    </td>
                                    <td class="">
                                        ИНН
                                        получателя:
                                    </td>
                                    <td class="py-1">
                                        <p class="font-weight-semibold mb-25">700306544</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Наимен.
                                        банка
                                        получателя:
                                    </td>
                                    <td class="">
                                        <p class="font-weight-semibold mb-25">РКЦ ЦБ по г. Ташкенту</p>
                                    </td>
                                    <td class="">
                                        Код
                                        банка
                                        получателя:
                                    </td>
                                    <td class="py-1 pl-4">
                                        <p class="font-weight-semibold mb-25">00014</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Сумма прописью
                                    </td>
                                    <td class="" colspan="3">
                                        <p class="font-weight-semibold mb-25">bir million oli yuz ming sakkiz yuz so`m 11 tiyin</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Детали
                                        платежа
                                    </td>
                                    <td class="" colspan="3">
                                        <p class="font-weight-semibold mb-25">2023 yil dekabr oyi uchun. 08102 to‘lov, 1000218602262873111103093 12% daromad solig‘i. 2024 yil
                                            mart oyi uchun.</p>
                                    </td>
                                </tr>
                                <tr class="mt-2">
                                    <td class="py-1">
                                        <strong></strong>
                                    </td>
                                    <td class="">
                                        Руководитель ______________________

                                    </td>
                                    <td class="">
                                        Главный бухгалтер

                                    </td>
                                    <td>
                                        ______________
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div class="">

                                <div class="d-flex align-items-center mt-2  mb-2">

                                    <div class="d-flex align-items-center" style="min-width: 245px">
                                        <span class="title"></span>
                                        <span class="title ms-50"></span>
                                    </div>

                                    <div class="form-control ms-50 mt-md-0" style="height: 100px; max-width: 745px">
                                        <div class="row invoice-print">
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

                    <!-- Invoice Note starts -->

                    <!-- Invoice Note ends -->
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary w-100 mb-75" data-bs-toggle="modal"
                                data-bs-target="#send-invoice-sidebar">
                            Send Invoice
                        </button>
                        <button class="btn btn-outline-secondary w-100 btn-download-invoice mb-75">Download</button>
                        <a class="btn btn-outline-secondary w-100 mb-75" href="{{url('/payment_order/print')}}"
                           target="_blank"> Print </a>
                        <a class="btn btn-outline-secondary w-100 mb-75" href="{{url('/payment_order/edit')}}"> Edit </a>
                        <button class="btn btn-success w-100" data-bs-toggle="modal"
                                data-bs-target="#add-payment-sidebar">
                            Add Payment
                        </button>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    </section>

    <!-- Send Invoice Sidebar -->
    <div class="modal modal-slide-in fade" id="send-invoice-sidebar" aria-hidden="true">
        <div class="modal-dialog sidebar-lg">
            <div class="modal-content p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title">
                        <span class="align-middle">Send Invoice</span>
                    </h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <form>
                        <div class="mb-1">
                            <label for="invoice-from" class="form-label">From</label>
                            <input
                                type="text"
                                class="form-control"
                                id="invoice-from"
                                value="shelbyComapny@email.com"
                                placeholder="company@email.com"
                            />
                        </div>
                        <div class="mb-1">
                            <label for="invoice-to" class="form-label">To</label>
                            <input
                                type="text"
                                class="form-control"
                                id="invoice-to"
                                value="qConsolidated@email.com"
                                placeholder="company@email.com"
                            />
                        </div>
                        <div class="mb-1">
                            <label for="invoice-subject" class="form-label">Subject</label>
                            <input
                                type="text"
                                class="form-control"
                                id="invoice-subject"
                                value="Invoice of purchased Admin Templates"
                                placeholder="Invoice regarding goods"
                            />
                        </div>
                        <div class="mb-1">
                            <label for="invoice-message" class="form-label">Message</label>
                            <textarea
                                class="form-control"
                                name="invoice-message"
                                id="invoice-message"
                                cols="3"
                                rows="11"
                                placeholder="Message..."
                            >
Dear Queen Consolidated,

Thank you for your business, always a pleasure to work with you!

We have generated a new invoice in the amount of $95.59

We would appreciate payment of this invoice by 05/11/2019</textarea
                            >
                        </div>
                        <div class="mb-1">
            <span class="badge badge-light-primary">
              <i data-feather="link" class="me-25"></i>
              <span class="align-middle">Invoice Attached</span>
            </span>
                        </div>
                        <div class="mb-1 d-flex flex-wrap mt-2">
                            <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Send</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Send Invoice Sidebar -->

    <!-- Add Payment Sidebar -->
    <div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
        <div class="modal-dialog sidebar-lg">
            <div class="modal-content p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title">
                        <span class="align-middle">Add Payment</span>
                    </h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <form>
                        <div class="mb-1">
                            <input id="balance" class="form-control" type="text" value="Invoice Balance: 5000.00"
                                   disabled/>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="amount">Payment Amount</label>
                            <input id="amount" class="form-control" type="number" placeholder="$1000"/>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="payment-date">Payment Date</label>
                            <input id="payment-date" class="form-control date-picker" type="text"/>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="payment-method">Payment Method</label>
                            <select class="form-select" id="payment-method">
                                <option value="" selected disabled>Select payment method</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Debit">Debit</option>
                                <option value="Credit">Credit</option>
                                <option value="Paypal">Paypal</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="payment-note">Internal Payment Note</label>
                            <textarea class="form-control" id="payment-note" rows="5"
                                      placeholder="Internal Payment Note"></textarea>
                        </div>
                        <div class="d-flex flex-wrap mb-0">
                            <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Send</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Payment Sidebar -->
@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection
