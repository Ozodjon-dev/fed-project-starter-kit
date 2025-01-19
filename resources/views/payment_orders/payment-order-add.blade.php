@extends('layouts.contentLayoutMaster')

@section('title', 'Создать платежное поручение')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
@endsection

@section('content')
    <section class="invoice-add-wrapper">
        <form class="needs-validation" action="">
            @csrf
            <div class="row invoice-add">
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card invoice-preview-card">
                        <div class="card-body invoice-padding pb-0">
                            <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                <div class="container">
                                    <div class="logo-wrapper mt-0" style="justify-content: center">
                                        <h3 class="text-uppercase"><b>
                                                Платежное поручение №
                                            </b>
                                        </h3>
                                        <div class="ms-1 align-items-center">
                                            <h6 class="invoice-title"></h6>
                                            <div
                                                class="input-group input-group-merge invoice-edit-input-group">
                                                <input type="text"
                                                       class="form-control rounded"
                                                       placeholder="53634"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-number-date mt-md-0 mt-0">
                                <div class="d-flex align-items-center ">
                                    <div style="min-width: 230px">
                                        <label class="title" for="">Дата:</label>
                                    </div>
                                    <input type="text"
                                           class="form-control invoice-edit-input date-picker ms-50 rounded"/>
                                </div>
                            </div>
                        </div>
                        <hr class="invoice-spacing"/>
                        <div class="card-body invoice-padding pt-0">
                            <!-- Address and Contact starts -->
                            <div class="d-flex align-items-center">
                                <label for="applicant" class="title" style="min-width: 235px">Наименование
                                    плательщика:</label>
                                <input type="text" id="applicant" name="applicant" readonly
                                       class="form-control rounded">
                            </div>
                            <h6 class="invoice-to-title"><b></b></h6>
                            <div class="row row-bill-to invoice-spacing">
                                <div class="col-lg-auto mb-md-2 col-bill-to ps-0">
                                    <h6 class=""><b>ДЕБЕТ</b></h6>
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center mb-1" style="max-width: 1200px">
                                            <label class="d-flex align-items-center" for="applicant_bank_account"
                                                   style="min-width: 235px">
                                                Расчетный счет плательщика:
                                            </label>
                                            <div style="min-width: 450px">
                                                <select name="applicant_bank_account"
                                                        id="applicant_bank_account"
                                                        class="form-select rounded">
                                                    <option disabled selected>Выберите расчетный счет</option>
                                                    @foreach($organizations as $organization)
                                                        <option value="{{ $organization->bank_account }}"
                                                                data-account="{{ $organization->bank_account }}">
                                                            {{ $organization->bank_account }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-1">
                                            <div class="col" style="min-width: 68px">
                                            </div>
                                            <label class="d-flex align-items-center" for="applicant_tin"
                                                   style="min-width: 50px">ИНН:</label>
                                            <input class="form-control rounded w-100" name="applicant_tin"
                                                   id="applicant_tin" style="min-width: 200px" readonly required/>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-1">
                                        <div class="d-flex align-items-center mb-0" style="max-width: 1200px">
                                            <label class="d-flex align-items-center" for="applicant_bank_name"
                                                   style="min-width: 235px">Наимен. банка плательщика:</label>
                                            <input style="min-width: 450px" type="text" id="applicant_bank_name"
                                                   name="applicant_bank_name" readonly
                                                   class="form-control rounded">

                                        </div>
                                        <div class="d-flex" style="min-width: 28px">
                                        </div>
                                        <label class="d-flex align-items-center" for="applicant_bank_code"
                                               style="min-width: 90px">Код банка:</label>
                                        <input type="text" id="applicant_bank_code" name="applicant_bank_code"
                                               readonly
                                               class="form-control rounded"
                                               style="min-width: 200px" required>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex align-items-center" style="max-width: 1200px">
                                            <label class=" align-items-center" for="applicant_bank_name"
                                                   style="min-width: 235px">СУММА</label>
                                            <div class="col-xl-4 col-md-6 col-sm-12 mb-2" style="min-width: 450px">
                                                <input type="text"
                                                       class="form-control numeral-mask col-12 mb-lg-0 mt-lg-0 rounded"
                                                       placeholder="0,000.00" id="numeral-formatting" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <label for="contractor" class="title" style="min-width: 235px">Наименование
                                    получателя:</label>
                                <input type="text" id="contractor" name="contractor" readonly
                                       class="form-control rounded">
                            </div>

                            <h6 class="invoice-to-title"><b></b></h6>

                            <div class="row row-bill-to invoice-spacing">
                                <div class="col-lg-auto mb-md-2 col-bill-to ps-0">

                                    <h6 class=""><b>КРЕДИТ</b></h6>
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center mb-1" style="max-width: 1200px">
                                            <label class="d-flex align-items-center" for="beneficiary_bank_account"
                                                   style="min-width: 235px">
                                                Расчетный счет получателя:
                                            </label>
                                            <input style="min-width: 450px" type="text" id="beneficiary_bank_account"
                                                   name="beneficiary_bank_account" readonly
                                                   class="form-control rounded">

                                        </div>
                                        <div class="d-flex mb-1">
                                            <div class="col" style="min-width: 68px">
                                            </div>
                                            <label class="d-flex align-items-center" for="beneficiary_tin"
                                                   style="min-width: 50px">ИНН:</label>
                                            <input class="form-control rounded w-100" name="beneficiary_tin"
                                                   id="beneficiary_tin" style="min-width: 200px" required
                                                   placeholder="введите ИНН"/>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-1">
                                        <div class="d-flex align-items-center mb-0" style="max-width: 1200px">
                                            <label class="d-flex align-items-center" for="beneficiary_bank_name"
                                                   style="min-width: 235px">Наимен. банка получателя:</label>
                                            <input style="min-width: 450px" type="text" id="beneficiary_bank_name"
                                                   name="beneficiary_bank_name" readonly
                                                   class="form-control rounded">

                                        </div>
                                        <div class="d-flex" style="min-width: 28px">
                                        </div>
                                        <label class="d-flex align-items-center" for="beneficiary_bank_code"
                                               style="min-width: 90px">Код банка:</label>
                                        <input type="text" id="beneficiary_bank_code" name="beneficiary_bank_code"
                                               readonly
                                               class="form-control rounded"
                                               style="min-width: 200px" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-md-0 mt-2">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="d-flex align-items-center" style="min-width: 230px">
                                        <label class="title">Сумма прописью</label>
                                    </div>
                                    <textarea type="text"
                                              class="form-control ms-50 rounded"
                                              style="max-width: 1000px" id="amountInWords" readonly required></textarea>
                                </div>
                            </div>
                            <div class="mt-md-0 mt-2 mb-2">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="d-flex align-items-center" style="min-width: 230px">
                                        <label class="title" for="">Детали платежа</label>
                                    </div>
                                    <textarea placeholder="краткое содержание"
                                              class="ms-50 form-control rounded text-sm-start"></textarea>
                                </div>
                            </div>
                            <div class="container" style="height: 25px"></div>
                            <div class="mt-md-0 mt-2 mb-2 ms-50">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="d-flex align-items-center" style="min-width: 230px">
                                        <span class="title"></span>
                                        <span class="title ms-50"></span>
                                    </div>
                                    <span class="title">Руководитель __________________________</span>
                                    <span class="title ms-5">Главный бухгалтер __________________________</span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                </div>
                            </div>
                            <div class="mt-md-0 mt-2 ms-50">
                            </div>
                            <div class="mt-md-0 mt-2 mb-2">
                                <div class="d-flex align-items-center mb-1 invoice-print">
                                    <div class="d-flex align-items-center" style="min-width: 230px">
                                        <span class="title"></span>
                                        <span class="title ms-50"></span>
                                    </div>
                                    <div class="form-control ms-50 mt-md-0" style="height: 100px">
                                        <div class="row invoice-print">
                                            <div class="col">
                                                <b>БАНК</b>
                                            </div>
                                            <div class="col me-2">Проверен
                                                <div type="number" class="form-control rounded"
                                                     style="height: 40px"></div>
                                            </div>
                                            <div class="col me-2">Одобрен
                                                <div type="number" class="form-control rounded"
                                                     style="height: 40px"></div>
                                            </div>
                                            <div class="col me-2">Проведено банком
                                                <div type="number" class="form-control rounded"
                                                     style="height: 40px"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{url('/payment_order/preview')}}" class="btn btn-outline-primary w-100 mb-75">Предварительный
                                просмотр</a>
                            <button class="btn btn-primary w-100 mb-75" data-bs-toggle="modal"
                                    data-bs-target="#send-invoice-sidebar">
                                Следующий
                                <svg height="13px" width="13px"
                                     viewBox="0 0 185.343 185.343" xml:space="preserve"><g>
                                        <g>
                                            <path style="fill:#FFFFFF" d="M51.707,185.343c-2.741,0-5.493-1.044-7.593-3.149c-4.194-4.194-4.194-10.981,0-15.175
			l74.352-74.347L44.114,18.32c-4.194-4.194-4.194-10.987,0-15.175c4.194-4.194,10.987-4.194,15.18,0l81.934,81.934
			c4.194,4.194,4.194,10.987,0,15.175l-81.934,81.939C57.201,184.293,54.454,185.343,51.707,185.343z"/>
                                        </g>
                                    </g></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-slide-in fade" id="send-invoice-sidebar" aria-hidden="true">
                <div class="modal-dialog sidebar-lg">
                    <div class="modal-content p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title">
                                <span class="align-middle">Проводка</span>
                            </h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <form>
                                <div class="align-items-center mb-1 w-100">
                                    <label for="chart_of_account" class="title">Дебет</label>
                                    <select class="form-select rounded w-100" name="chart_of_account"
                                            id="debit_chart_of_account">
                                        <option disabled selected>Выберите счет</option>
                                        @foreach($chart_of_accounts as $chart_of_account)
                                            <option value="{{ $chart_of_account->number }}"
                                                    data-number="{{ $chart_of_account->number }}">
                                                {{ $chart_of_account->number }} - {{ $chart_of_account->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="align-items-center mb-1 w-100">
                                    <label for="chart_of_account" class="title">Кредит</label>
                                    <select class="form-select rounded w-100" name="chart_of_account"
                                            id="credit_chart_of_account">
                                        <option disabled selected>Выберите счет</option>
                                        @foreach($chart_of_accounts as $chart_of_account)
                                            <option value="{{ $chart_of_account->number }}"
                                                    data-number="{{ $chart_of_account->number }}">
                                                {{ $chart_of_account->number }} - {{ $chart_of_account->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="align-items-center mb-1 w-100">
                                    <label for="contract" class="title">Договор</label>
                                    <select class="form-select rounded w-100" name="contract"
                                            id="contract">
                                        <option disabled selected>Выберите договор</option>
                                        @foreach($contracts as $contract)
                                            <option value="{{ $contract->number }}"
                                                    data-number="{{ $contract->number }}">
                                                № {{ $contract->number }} от {{ $contract->date }}
                                                с {{ $contract->contractor }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label for="article" class="title">Статья</label>
                                    <select class="form-select mb-75 rounded" name="article" id="article">
                                        @foreach($classificators as $classificator)
                                            <option value="{{ $classificator->article }}"
                                                    data-article="{{ $classificator->article }}">
                                                {{ $classificator->article }} - {{ $classificator->details }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-1 flex-wrap mt-2 card-body">
                                    <a href="" class="btn btn-outline-primary w-100 mb-75"
                                       data-bs-dismiss="modal">Отмена</a>
                                    <button class="btn btn-primary w-100 mb-75" data-bs-toggle="modal"
                                            data-bs-target="#send-invoice-sidebar" type="submit">
                                        Сохранить
                                    </button>
                                </div>
                            </form>
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
    <script src="{{ asset('js/scripts/forms/form-input-mask.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Handle applicant_bank_account input
            document.getElementById('applicant_bank_account').addEventListener('input', function () {
                const organizations = @json($organizations);
                const bankAccountValue = this.value;
                const matchedOrganization = organizations.find(organization => organization.bank_account === bankAccountValue);

                if (matchedOrganization) {
                    document.getElementById('applicant_bank_name').value = matchedOrganization.bank_name;
                    document.getElementById('applicant_bank_code').value = matchedOrganization.bank_code;
                    document.getElementById('applicant_tin').value = matchedOrganization.tin;
                    document.getElementById('applicant').value = matchedOrganization.name;
                } else {
                    document.getElementById('applicant_bank_name').value = '';
                    document.getElementById('applicant_bank_code').value = '';
                    document.getElementById('applicant_tin').value = '';
                    document.getElementById('applicant').value = '';
                }
            });

            // Initialize Select2 for bank_account dropdown
            $('#applicant_bank_account').select2({
                placeholder: 'Выберите расчетный счет',
                allowClear: true,
                width: '100%'
            });


            // Handle beneficiary_tin input
            document.getElementById('beneficiary_tin').addEventListener('input', function () {
                const contractors = @json($contractors);
                const tinValue = this.value;
                const matchedContractor = contractors.find(contractor => contractor.tin === tinValue);

                if (matchedContractor) {
                    document.getElementById('beneficiary_bank_name').value = matchedContractor.bank_name;
                    document.getElementById('beneficiary_bank_code').value = matchedContractor.bank_code;
                    document.getElementById('beneficiary_bank_account').value = matchedContractor.bank_account;
                    document.getElementById('contractor').value = matchedContractor.name;
                } else {
                    document.getElementById('beneficiary_bank_name').value = '';
                    document.getElementById('beneficiary_bank_code').value = '';
                    document.getElementById('beneficiary_bank_account').value = '';
                    document.getElementById('contractor').value = '';
                }
            });

            // Initialize Select2 for modal dropdowns when modal is shown
            $('#send-invoice-sidebar').on('shown.bs.modal', function () {
                $('#debit_chart_of_account').select2({
                    placeholder: 'Выберите счет',
                    allowClear: true,
                    dropdownParent: $('#send-invoice-sidebar'),
                    width: '100%'
                });
                $('#credit_chart_of_account').select2({
                    placeholder: 'Выберите счет',
                    allowClear: true,
                    dropdownParent: $('#send-invoice-sidebar'),
                    width: '100%'
                });
                $('#contract').select2({
                    placeholder: 'Выберите счет',
                    allowClear: true,
                    dropdownParent: $('#send-invoice-sidebar'),
                    width: '100%'
                });
                $('#article').select2({
                    placeholder: 'Выберите счет',
                    allowClear: true,
                    dropdownParent: $('#send-invoice-sidebar'),
                    width: '100%'
                });
            });

            // Handle word numeral formatting
            const amountInput = document.getElementById('numeral-formatting');
            const amountInWordsInput = document.getElementById('amountInWords');
            amountInput.addEventListener('input', function () {
                const amount = parseFloat(this.value.replace(/,/g, ''));
                if (!isNaN(amount)) {
                    const words = numberToWords(amount); // Convert number to words
                    amountInWordsInput.value = words;
                } else {
                    amountInWordsInput.value = '';
                }
            });

            function numberToWords(number) {
                const dictionary = {
                    0: 'ноль',
                    1: 'один',
                    2: 'два',
                    3: 'три',
                    4: 'четыре',
                    5: 'пять',
                    6: 'шесть',
                    7: 'семь',
                    8: 'восемь',
                    9: 'девять',
                    10: 'десять',
                    11: 'одиннадцать',
                    12: 'двенадцать',
                    13: 'тринадцать',
                    14: 'четырнадцать',
                    15: 'пятнадцать',
                    16: 'шестнадцать',
                    17: 'семнадцать',
                    18: 'восемнадцать',
                    19: 'девятнадцать',
                    20: 'двадцать',
                    30: 'тридцать',
                    40: 'сорок',
                    50: 'пятьдесят',
                    60: 'шестьдесят',
                    70: 'семьдесят',
                    80: 'восемьдесят',
                    90: 'девяносто',
                    100: 'сто',
                    200: 'двести',
                    300: 'триста',
                    400: 'четыреста',
                    500: 'пятьсот',
                    600: 'шестьсот',
                    700: 'семьсот',
                    800: 'восемьсот',
                    900: 'девятьсот'
                };

                const scales = ['', 'тысяча', 'миллион', 'миллиард', 'триллион'];
                if (number === 0) return 'ноль сум';
                const [integerPart, fractionalPart] = number.toFixed(2).split('.');
                let words = convertIntegerPart(Number(integerPart), dictionary, scales) + ' сум';
                if (fractionalPart > 0) {
                    const fractionalWords = convertIntegerPart(Number(fractionalPart), dictionary, scales);
                    words += ' ' + fractionalWords + ' ' + getFractionalWord(Number(fractionalPart));
                }
                return words.trim();
            }

            function convertIntegerPart(number, dictionary, scales) {
                if (number === 0) return dictionary[0];
                let words = '';
                let scale = 0;
                while (number > 0) {
                    let chunk = number % 1000;

                    if (chunk > 0) {
                        let chunkWords = convertChunk(chunk, dictionary);
                        words = chunkWords + (scale > 0 ? ' ' + scales[scale] : '') + (words ? ' ' + words : '');
                    }
                    number = Math.floor(number / 1000);
                    scale++;
                }
                return words.trim();
            }

            function convertChunk(chunk, dictionary) {
                let words = '';
                if (chunk >= 100) {
                    let hundreds = Math.floor(chunk / 100) * 100;
                    words += dictionary[hundreds] + ' ';
                    chunk %= 100;
                }
                if (chunk >= 20) {
                    let tens = Math.floor(chunk / 10) * 10;
                    words += dictionary[tens] + ' ';
                    chunk %= 10;
                }
                if (chunk > 0) {
                    words += dictionary[chunk] + ' ';
                }
                return words.trim();
            }

            function getFractionalWord(fraction) {
                if (fraction === 1) {
                    return 'тийин';
                } else if (fraction >= 2 && fraction <= 4) {
                    return 'тийина';
                } else {
                    return 'тийинов';
                }
            }
        });
    </script>














@endsection
