@extends('layouts/contentLayoutMaster')


@section('title', __('payment_order_preview.Payment order preview'))

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/extensions/toastr.min.css')}}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
    <link rel="stylesheet" href="{{asset('css/base/plugins/extensions/ext-component-toastr.css')}}">
    <link rel="stylesheet" href="{{asset('css/base/pages/ui-feather.css')}}">

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

    @if (session('success'))
        <div class="d-inline-block">
            <!-- Modal -->
            <div class="modal fade text-center modal-size-xs" id="successModal" tabindex="-1"
                 aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <span class="modal-body rounded">
                        {{ session('success') }}
                    </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- JavaScript kodini qo'shish: Modalni avtomatik ochish va yopish --}}
        <script>
            // Sahifa yuklanganda modalni avtomatik ochish
            document.addEventListener('DOMContentLoaded', function () {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();

                // 3 soniya o‘tgach, modalni yopish
                setTimeout(function () {
                    successModal.hide();
                }, 3000); // 3000 millisekund = 3 soniya
            });
        </script>
    @endif
    <div class="d-flex justify-content mb-1">
        <a href="{{ route('payment_orders.list') }}" class="btn btn-outline-primary btn-sm">
            <i data-feather="arrow-left"></i> {{ __('payment_order_preview.back') }}
        </a>

        <form method="GET" action="" class="d-flex align-items-center ms-1">
            <div class="input-group">
                <input
                    disabled
                    type="text"
                    class="form-control form-control-sm"
                    placeholder="{{ __('payment_order_preview.Search') }}"
                    name="search"
                    value="{{ request('search') }}"
                >
                <button disabled type="submit" class="btn btn-primary btn-sm">
                    <i data-feather="search"></i>
                </button>
            </div>
        </form>

        <a href="{{ route('payment_orders.add') }}" class="btn btn-icon btn-primary ms-auto btn-sm"
           style="border-radius: 50%">
            <i data-feather="plus" class="text-white"></i>
        </a>
    </div>

    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12">
                <div class="card invoice-preview-card" style="background-color: #E5DECF; color: black">


                    <div class="invoice-print mt-2">
                        <div class="d-flex justify-content-center">
                            <p class="text-uppercase"
                               style="border: 0px;
                padding: 10px">
                                <strong>{{ __('payment_order_preview.Payment order #') }}</strong>
                            </p>
                            <p class="ms-25">{{ $paymentOrder->number }}</p>
                        </div>


                        <div class="container-fluid mt-2">
                            <table class="dataTable m-0">
                                <tbody>
                                <tr>
                                    <td>
                                        {{ __('payment_order_preview.DATE') }}
                                    </td>
                                    <td class="">
                                        <p class=""
                                           style="border: 0">{{ \Carbon\Carbon::parse($paymentOrder->date)->format('d.m.Y') }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __('payment_order_preview.Payer name') }}
                                    </td>
                                    <td colspan="3">
                                        <p class="font-weight-semibold mb-25">
                                            {{ $paymentOrder->applicant }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __('payment_order_preview.Debit account of payer') }}
                                    </td>
                                    <td>
                                        <p>{{ $paymentOrder->applicant_bank_account }}</p>
                                    </td>
                                    <td class="">
                                        {{ __('payment_order_preview.TIN of payer') }}
                                    </td>
                                    <td>
                                        <p class="font-weight-semibold mb-25">{{ $paymentOrder->applicant_tin }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __('payment_order_preview.Bank name of payer') }}
                                    </td>
                                    <td class="">
                                        <p>{{ $paymentOrder->applicant_bank_name }}</p>
                                    </td>
                                    <td class="">
                                        {{ __('payment_order_preview.Bank code of payer') }}
                                    </td>
                                    <td class="py-1 pl-4">
                                        <p>{{ $paymentOrder->applicant_bank_code }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __('payment_order_preview.AMOUNT') }}
                                    </td>
                                    <td class="py-1 pl-4">
                                        <p class="font-weight-semibold mb-25">{{ number_format($paymentOrder->amount, 2, '.', ',') }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __('payment_order_preview.Recipient name') }}
                                    </td>
                                    <td class="" colspan="3">
                                        <p class="font-weight-semibold mb-25">{{ $paymentOrder->contractor }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __('payment_order_preview.CREDIT recipient account') }}
                                    </td>
                                    <td class="">
                                        <p class="font-weight-semibold mb-15">{{ $paymentOrder->beneficiary_bank_account }}</p>
                                    </td>
                                    <td class="">
                                        {{ __('payment_order_preview.TIN of recipient') }}
                                    </td>
                                    <td class="py-1">
                                        <p class="font-weight-semibold mb-25">{{ $paymentOrder->beneficiary_tin }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __('payment_order_preview.Bank name of recipient') }}
                                    </td>
                                    <td class="">
                                        <p class="font-weight-semibold mb-25">{{ $paymentOrder->beneficiary_bank_name }}</p>
                                    </td>
                                    <td class="">
                                        {{ __('payment_order_preview.Bank code of recipient') }}
                                    </td>
                                    <td class="py-1 pl-4">
                                        <p class="font-weight-semibold mb-25">{{ $paymentOrder->beneficiary_bank_code }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __('payment_order_preview.Amount in words') }}
                                    </td>
                                    <td class="" colspan="3">
                                        <p class="font-weight-semibold mb-25">{{ $paymentOrder->amount_in_words }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __('payment_order_preview.Payment details') }}
                                    </td>
                                    <td class="" colspan="3">
                                        <p class="font-weight-semibold mb-25">{{ $paymentOrder->details }}</p>
                                    </td>
                                </tr>
                                <tr class="mt-2">
                                    <td class="py-1">
                                        <strong></strong>
                                    </td>
                                    <td class="">
                                        {{ __('payment_order_preview.Supervisor') }} ______________________

                                    </td>
                                    <td class="">
                                        {{ __('payment_order_preview.Chief accountant') }}

                                    </td>
                                    <td>
                                        ______________
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div class="">

                                <div class="d-flex align-items-center mt-2  mb-2">

                                    <div class="d-flex align-items-center" style="min-width: 220px">
                                        <span class="title"></span>
                                        <span class="title ms-50"></span>
                                    </div>

                                    <div class="form-control ms-50 mt-md-0"
                                         style="height: 100px; max-width: 770px; background-color: #E5DECF; color: black; border: 1px solid #6e6b7b">
                                        <div class="row invoice-print rounded">
                                            <div class="col" style="max-width: 100px">
                                                <b>{{ __('payment_order_preview.BANK') }}</b>
                                            </div>
                                            <div class="col me-2">{{ __('payment_order_preview.Verified') }}
                                                <div type="" class="form-control"
                                                     style="height: 40px; background-color: #E5DECF; border: 1px solid #6e6b7b"></div>
                                            </div>
                                            <div class="col me-2">{{ __('payment_order_preview.Approved') }}
                                                <div type="" class="form-control"
                                                     style="height: 40px; background-color: #E5DECF; border: 1px solid #6e6b7b"></div>
                                            </div>
                                            <div class="col me-2">{{ __('payment_order_preview.Conducted by the bank') }}
                                                <div type="" class="form-control"
                                                     style="height: 40px; background-color: #E5DECF; border: 1px solid #6e6b7b"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary w-100 mb-75" href="{{url('/payment_order/print', $paymentOrder->id)}}"
                           target="_blank"><i data-feather="printer"></i> {{ __('payment_order_preview.Print') }} </a>
                        <a class="btn btn-success w-100 mb-75"
                           href="{{ route('payment_orders.edit', $paymentOrder->id) }}"><i
                                data-feather="edit"></i> {{ __('payment_order_preview.Edit') }} </a>
                        <div class="w-100 mb-75">
                            <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal"
                                    data-bs-target="#danger"><i data-feather="trash-2"></i> {{ __('payment_order_preview.Delete') }}
                            </button>

                            <!-- Modal -->
                            <div
                                class="modal fade modal-danger text-start"
                                id="danger"
                                tabindex="-1"
                                aria-labelledby="myModalLabel120"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel120"><strong>{{ __('payment_order_preview.Attention!') }}</strong>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>{{ __('payment_order_preview.Are you sure you want to delete this payment order?') }}</strong>
                                        </div>
                                        <div class="d-flex">
                                            <form class="ms-1 mb-2"
                                                  action="{{ route('payment_orders.delete', $paymentOrder->id) }}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="{{ __('payment_order_preview.Delete') }}"
                                                       class="btn btn-outline-danger">
                                            </form>
                                            <form class="ms-1 mb-2" action="" method="post">
                                                <input type="button" value="{{ __('payment_order_preview.Cancel') }}" data-bs-dismiss="modal"
                                                       aria-label="Close"
                                                       class="btn btn-danger">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('vendors/js/extensions/toastr.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
    <script src="{{asset('js/scripts/ui/ui-feather.js')}}"></script>
@endsection
