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
        <form class="needs-validation" action="{{ route('contracts.update', $contract->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="row invoice-add">
                <!-- Invoice Add Left starts -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card invoice-preview-card">
                        <!-- Header starts -->
                        <div class="card-body invoice-padding">
                            <div class="d-flex flex-wrap justify-content-center">
                                <h4><strong>КНИГА РЕГИСТРАЦИИ ДОГОВОРОВ</strong></h4>
                                <div class="invoice-number-date mb-1 mt-md-0 mt-xl-2 w-100 w-md-auto">
                                    <div class="d-flex align-items-center">
                                        <label for="registration_number" class="title"
                                               style="min-width: 180px; margin-right: 10px;">Регистрационный
                                            номер договора:</label>
                                        <input type="text" name="registration_number" id="registration_number"
                                               placeholder="7856" required value="{{ $contract->registration_number }}"
                                               class="form-control invoice-edit-input rounded"/>
                                    </div>
                                </div>
                                <div class="invoice-number-date mb-1 mt-md-0 mt-0 w-100 w-md-auto">
                                    <div class="d-flex align-items-center">
                                        <label for="registration_date" class="title"
                                               style="min-width: 180px; margin-right: 10px;">Дата
                                            регистрации:</label>
                                        <input type="date" name="registration_date" id="registration_date" required
                                               value="{{ $contract->registration_date }}"
                                               class="form-control invoice-edit-input date-picker rounded"/>
                                    </div>
                                </div>
                                <!-- Section: Тип договора -->
                                <div class="d-flex flex-wrap mt-1 w-100">
                                    <label class="title mb-1" for="type" style="min-width: 190px">Отметите тип
                                        договора:</label>
                                    <div class="form-check">
                                        <input class="form-check-input styled-checkbox" type="radio"
                                               id="contract_type_annual" name="type" value="Годовой">
                                        <label class="form-check-label" for="contract_type_annual">Годовой</label>
                                    </div>
                                    <div class="form-check ms-xl-5">
                                        <input class="form-check-input styled-checkbox" type="radio"
                                               id="contract_type_pink" name="type" value="Разовый">
                                        <label class="form-check-label" for="contract_type_pink">Разовый</label>
                                    </div>
                                    <div class="form-check  ms-xl-5">
                                        <input class="form-check-input styled-checkbox" type="radio"
                                               id="contract_type_import" name="type"
                                               value="Импортные контракты">
                                        <label class="form-check-label" for="contract_type_import">Импортные
                                            контракты</label>
                                    </div>
                                </div>
                                <!-- End Section -->

                            </div>

                        </div>
                        <hr style="margin: 0;">
                        <div class="card-body invoice-padding">
                            <div class="d-flex flex-wrap">
                                <div class="invoice-number-date mb-1 mt-md-0 mt-0 w-100 w-md-auto">
                                    <div class="d-flex align-items-center">
                                        <label for="number" class="title"
                                               style="min-width: 180px; margin-right: 10px;">Номер
                                            договора:</label>
                                        <input type="text" name="number" id="number" placeholder="7856/MV" required
                                               class="form-control invoice-edit-input rounded"
                                               value="{{ $contract->number }}">
                                    </div>
                                </div>
                                <div class="invoice-number-date mb-1 mt-md-0 mt-0 w-100 w-md-auto">
                                    <div class="d-flex align-items-center">
                                        <label for="date" class="title"
                                               style="min-width: 180px; margin-right: 10px;">Дата
                                            договора:</label>
                                        <input type="date" name="date" id="date" required
                                               class="form-control invoice-edit-input date-picker rounded"
                                               value="{{ $contract-> date }}">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-1 w-100">
                                    <label for="contractor" class="title" style="min-width: 180px; margin-right: 10px;">Контрагент:</label>
                                    <select class="form-select rounded w-100" required name="contractor"
                                            id="contractor">
                                        <option value="{{ $contract->contractor }}"
                                                selected>{{ $contract->contractor }}</option>
                                        @foreach($contractors as $contractor)
                                            <option value="{{ $contractor->name }}"
                                                    data-name="{{ $contractor->name }}">{{ $contractor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center mb-1 w-100">
                                    <label
                                        for="category"
                                        class="title"
                                        style="min-width: 180px; margin-right: 10px;">
                                        Категория:
                                    </label>
                                    <select
                                        class="form-select rounded w-100"
                                        name="category"
                                        id="category">
                                        <option value="{{ $contract->category }}"
                                                selected>{{ $contract->category }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}"
                                                    data-name="{{ $category->name }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mt-md-0 mt-2 w-100">
                                <div class="d-flex align-items-center mb-1">
                                    <label for="details"
                                           class="title"
                                           style="max-width: 180px; margin-right: 10px;">
                                        Предмет договора,
                                        заголовок (краткое содержание)
                                    </label>
                                    <textarea
                                        name="details"
                                        id="details"
                                        class="form-control rounded w-100">
                                        {{ $contract->details }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap w-100 mb-1">
                                <div class="d-flex align-items-center mb-1 w-100 w-md-auto">
                                    <label for="article"
                                           class="title"
                                           style="min-width: 180px; margin-right: 10px;">Статья</label>
                                    <select name="article"
                                            id="article"
                                            class="form-select rounded">
                                        <option value="{{ $contract->article }}"
                                                selected>{{ $contract->article }}</option>
                                        @foreach($classificators as $classificator)
                                            <option value="{{ $classificator->article }}"
                                                    data-article="{{ $classificator->article }}">
                                                {{ $classificator->article }} - {{ $classificator->details }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center mb-1 w-100 w-md-auto">
                                    <label for="amount"
                                           class="title"
                                           style="min-width: 180px; margin-right: 10px;">
                                        СУММА
                                    </label>
                                    <div class="col-xl-4">
                                        <input type="text"
                                               value="{{ number_format($contract->amount, 2, '.', ',') }}"
                                               class="form-control numeral-mask col-12 rounded"
                                               placeholder="0,000.00"
                                               name="amount"
                                               id="numeral-formatting">
                                    </div>
                                </div>
                                <div class="invoice-number-date mt-md-0 mt-0 w-100 w-md-auto">
                                    <div class="d-flex align-items-center">
                                        <label for="term"
                                               class="title"
                                               style="min-width: 180px; margin-right: 10px;">
                                            Сроки действия договора:
                                        </label>
                                        <input type="date"
                                               name="term"
                                               id="term"
                                               placeholder="7856"
                                               value="{{ $contract->term }}"
                                               class="form-control invoice-edit-input date-picker rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="submit"
                                    class="btn btn-primary w-100 mb-75">
                                Редактировать
                            </button>
                            <button onclick="location.href='{{ route('contracts.list') }}'"
                                    type="button"
                                    class="btn btn-outline-primary w-100">
                                Отмена
                            </button>
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
{{--    <script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>--}}
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js'))}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js'))}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-input-mask.js')) }}"></script>
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

            // Initialize Select2 for the "Статья" dropdown with search functionality
            $('#article').select2({
                placeholder: 'Выберите статья',
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
