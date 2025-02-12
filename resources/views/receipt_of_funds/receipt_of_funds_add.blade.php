@extends('layouts/contentLayoutMaster')

@section('title', 'Добавить поступление денежных средств')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
@endsection

@section('content')
    <section class="invoice-add-wrapper">
        <form class="needs-validation" action="{{ route('receipt_of_funds.store') }}" method="post">
            @csrf
            <div class="row invoice-add">
                <!-- Invoice Add Left starts -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card invoice-preview-card">
                        <!-- Header starts -->
                        <div class="card-body invoice-padding">
                            <div class="d-flex flex-wrap justify-content-center">
                                <div class="invoice-number-date mb-1 mt-md-0 mt-xl-2 w-100 w-md-auto">
                                    <div class="d-flex align-items-center">
                                        <label for="number" class="title"
                                               style="min-width: 180px; margin-right: 10px;">Номер докемента</label>
                                        <input type="text" name="number" id="number"
                                               placeholder="7856" required
                                               class="form-control invoice-edit-input rounded"/>
                                    </div>
                                </div>
                                <div class="invoice-number-date mb-1 mt-md-0 mt-0 w-100 w-md-auto">
                                    <div class="d-flex align-items-center">
                                        <label for="date" class="title"
                                               style="min-width: 180px; margin-right: 10px;">Дата</label>
                                        <input type="date" name="date" id="date" required
                                               class="form-control invoice-edit-input date-picker rounded"/>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center w-100">
                                    <div class="d-flex align-items-center mb-1" style="max-width: 1200px">
                                        <label class="d-flex align-items-center" for="bank_account"
                                               style="min-width: 190px">
                                            Расчетный счет
                                        </label>
                                        <div style="min-width: 450px">
                                            <select name="bank_account"
                                                    id="bank_account"
                                                    class="form-select rounded">
                                                <option disabled selected></option>
                                                @foreach($organizations as $organization)
                                                    <option value="{{ $organization->bank_account }}"
                                                            data-account="{{ $organization->bank_account }}">
                                                        {{ $organization->bank_account }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-1 w-100">
                                    <label for="debit_chart_of_account" class="title"
                                           style="min-width: 180px; margin-right: 10px;">Дебет</label>
                                    <select class="form-select rounded w-100" name="debit_chart_of_account"
                                            id="debit_chart_of_account" required>
                                        <option disabled selected></option>
                                        @foreach($chart_of_accounts as $chart_of_account)
                                            <option value="{{ $chart_of_account->number }}"
                                                    data-number="{{ $chart_of_account->number }}">
                                                {{ $chart_of_account->number }} - {{ $chart_of_account->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center mb-1 w-100">
                                    <label for="credit_chart_of_account" class="title"
                                           style="min-width: 180px; margin-right: 10px;">Кредит</label>
                                    <select class="form-select rounded w-100" name="credit_chart_of_account"
                                            id="credit_chart_of_account" required>
                                        <option disabled selected></option>
                                        @foreach($chart_of_accounts as $chart_of_account)
                                            <option value="{{ $chart_of_account->number }}"
                                                    data-number="{{ $chart_of_account->number }}">
                                                {{ $chart_of_account->number }} - {{ $chart_of_account->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center mb-1 w-100">
                                    <label for="contract_id" class="title"
                                           style="min-width: 180px; margin-right: 10px;">Договор</label>
                                    <select class="form-select rounded w-100" name="contract_id"
                                            id="contract_id">
                                        <option disabled selected></option>
                                        @foreach($contracts as $contract)
                                            <option value="{{ $contract->id }}"
                                                    data-number="{{ $contract->id }}">
                                                № {{ $contract->number }} от {{ $contract->date }}
                                                с {{ $contract->contractor }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center mb-1 w-100">
                                    <label for="article" class="title" style="min-width: 180px; margin-right: 10px;">Статья</label>
                                    <select class="form-select mb-75 rounded" name="article" id="article">
                                        <option disabled selected></option>
                                        @foreach($classificators as $classificator)
                                            <option value="{{ $classificator->article }}"
                                                    data-article="{{ $classificator->article }}">
                                                {{ $classificator->article }} - {{ $classificator->details }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center mb-1 w-100">
                                    <label for="details" class="title" style="min-width: 180px; margin-right: 10px;">Предмет
                                        (краткое содержание)</label>
                                    <textarea name="details" id="details"
                                              class="form-control rounded w-100" required></textarea>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap w-100 mb-1">
                                <div class="d-flex align-items-center mb-1 w-100 w-md-auto">
                                    <label for="numeral-formatting" class="title"
                                           style="min-width: 180px; margin-right: 10px;">СУММА</label>
                                    <div class="col-xl-4">
                                        <input type="text"
                                               class="form-control numeral-mask col-12 rounded"
                                               placeholder="0,000.00"
                                               name="amount"
                                               id="numeral-formatting" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary w-100 mb-75">Сохранить</button>
                            <a href="{{route('main.index')}}" class="btn btn-outline-danger w-100">Отмена</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js'))}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js'))}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-input-mask.js')) }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            $('#bank_account').select2({
                placeholder: '* Выберите расчетный  счет',
                allowClear: true,
                width: '100%'
            });

            $('#debit_chart_of_account').select2({
                placeholder: '* Выберите дебет счет',
                allowClear: true,
                width: '100%'
            });

            $('#credit_chart_of_account').select2({
                placeholder: '* Выберите кредит счет',
                allowClear: true,
                width: '100%'
            });

            $('#article').select2({
                placeholder: '* Выберите статья',
                allowClear: true,
                width: '100%'
            });

            $('#contract_id').select2({
                placeholder: '* Выберите статья',
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endsection

@section('style')
    <style>
        /* Responsive fix */
        @media (max-width: 1200px) {
            .invoice-add .card-body .d-flex {
                flex-direction: column;
            }

            .invoice-add .card-body .invoice-number-date {
                width: 100%;
            }

            .invoice-add .card-body .form-select,
            .invoice-add .card-body .form-control,
            .invoice-add .card-body textarea {
                width: 100%;
            }
        }

        /* Vertical spacing fix */
        .invoice-add .card-body .invoice-number-date {
            margin-bottom: 10px; /* Adjust the vertical margin */
        }
    </style>
@endsection
