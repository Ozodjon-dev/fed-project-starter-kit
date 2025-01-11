@extends('layouts/contentLayoutMaster')

@section('title', 'Добавить договор')

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
        <div class="row invoice-add">
            <!-- Invoice Add Left starts -->
            <div class="col-xl-9 col-md-8 col-12">
                <div class="card invoice-preview-card">
                    <!-- Header starts -->
                    <div class="card-body invoice-padding">
                        <div class="d-flex flex-wrap">
                            <div class="invoice-number-date mb-1 mt-md-0 mt-0 w-100 w-md-auto">
                                <div class="d-flex align-items-center">
                                    <label for="contract_number" class="title" style="min-width: 230px">Номер договора:</label>
                                    <input type="text" id="contract_number" placeholder="7856/MV"
                                           class="form-control invoice-edit-input shadow-lg form-control rounded"/>
                                </div>
                            </div>
                            <div class="invoice-number-date mb-1 mt-md-0 mt-0 w-100 w-md-auto">
                                <div class="d-flex align-items-center">
                                    <label for="contract_date" class="title" style="min-width: 230px">Дата договора:</label>
                                    <input type="text" id="contract_date"
                                           class="form-control invoice-edit-input date-picker shadow-lg form-control rounded"/>
                                </div>
                            </div>
                            <div class="invoice-number-date mb-1 mt-md-0 mt-0 w-100 w-md-auto">
                                <div class="d-flex align-items-center">
                                    <label for="registration_number" class="title" style="min-width: 230px">Регистрационный номер договора:</label>
                                    <input type="text" id="registration_number" placeholder="7856"
                                           class="form-control invoice-edit-input shadow-lg form-control rounded"/>
                                </div>
                            </div>
                            <div class="invoice-number-date mb-1 mt-md-0 mt-0 w-100 w-md-auto">
                                <div class="d-flex align-items-center">
                                    <label for="registration_date" class="title" style="min-width: 230px">Дата регистрации:</label>
                                    <input type="text" id="registration_date"
                                           class="form-control invoice-edit-input date-picker shadow-lg form-control rounded"/>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-1 w-100">
                                <label for="contractor" class="title" style="min-width: 230px">Контрагент:</label>
                                <select class="form-select rounded shadow-lg w-100" name="contractor" id="contractor">
                                    <option value="" disabled selected>Выберите контрагент</option>
                                    @foreach($contractors as $contractor)
                                        <option value="{{ $contractor->name }}"
                                                data-name="{{ $contractor->name }}">{{ $contractor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex align-items-center mb-1 w-100">
                                <label for="category" class="title" style="min-width: 230px">Категория:</label>
                                <select class="form-select rounded w-100" name="category" id="category" required>
                                    <option value="" disabled selected>Выберите категория</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->name }}"
                                                data-name="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-md-0 mt-2 mb-2 w-100">
                            <div class="d-flex align-items-center mb-1">
                                <label for="contract_subject" class="title" style="max-width: 230px">Предмет договора, заголовок (краткое содержание)</label>
                                <textarea id="contract_subject" class="form-control shadow-lg rounded w-100"></textarea>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap w-100">
                            <div class="d-flex align-items-center mb-1 w-100 w-md-auto">
                                <label for="contract_amount" class="title" style="min-width: 230px">СУММА</label>
                                <input type="number" id="contract_amount"
                                       class="form-control col-lg-2 col-12 mb-lg-0 mb-0 mt-lg-0 mt-2 shadow-lg form-control rounded"
                                       style="max-width: 340px" placeholder="0,00">
                            </div>
                            <div class="invoice-number-date mt-md-0 mt-0 w-100 w-md-auto">
                                <div class="d-flex align-items-center">
                                    <label for="contract_duration" class="title" style="min-width: 230px">Сроки действия договора:</label>
                                    <input type="text" id="contract_duration" placeholder="7856"
                                           class="form-control invoice-edit-input date-picker shadow-lg form-control rounded"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary w-100 mb-75">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Select2 for the "Категория" dropdown with search functionality
            $('#category').select2({
                placeholder: 'Выберите категория',
                allowClear: true,
                width: '100%'
            });

            // Initialize Select2 for the "Контрагент" dropdown with search functionality
            $('#contractor').select2({
                placeholder: 'Выберите контрагент',
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
    </style>
@endsection
