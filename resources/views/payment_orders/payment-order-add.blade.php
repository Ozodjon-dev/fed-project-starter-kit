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
                <!-- Invoice Add Left starts -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card invoice-preview-card">
                        <!-- Header starts -->
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
                                                class="input-group input-group-merge invoice-edit-input-group shadow-lg">

                                                <input type="text"
                                                       class="form-control rounded"
                                                       required placeholder="53634"/>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="invoice-number-date mt-md-0 mt-0">
                                <div class="d-flex align-items-center ">
                                    <span class="title" style="min-width: 230px">Дата:</span>
                                    <input type="text"
                                           class="form-control invoice-edit-input date-picker ms-50 shadow-lg form-control rounded"/>
                                </div>
                            </div>
                        </div>
                        <!-- Header ends -->

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
                                    <h6 class=""><b>КРЕДИТ</b></h6>
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center mb-1" style="max-width: 1200px">
                                            <label class="d-flex align-items-center" for="applicant_bank_account"
                                                   style="min-width: 235px">
                                                Расчетный счет плательщика:
                                            </label>
                                            <input style="min-width: 340px" type="text" id="applicant_bank_account"
                                                   name="applicant_bank_account" readonly
                                                   class="form-control rounded">

                                        </div>
                                        <div class="d-flex mb-1">
                                            <div class="col" style="min-width: 93px">
                                            </div>
                                            <label class="d-flex align-items-center" for="applicant_tin"
                                                   style="min-width: 134px">ИНН плательщика:</label>
                                            <input class="form-control rounded w-100" name="applicant_tin"
                                                   id="applicant_tin" style="min-width: 200px" required/>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-1">
                                        <div class="d-flex align-items-center mb-0" style="max-width: 1200px">
                                            <label class="d-flex align-items-center" for="applicant_bank_name"
                                                   style="min-width: 235px">Наимен. банка плательщика:</label>
                                            <input style="min-width: 340px" type="text" id="applicant_bank_name"
                                                   name="applicant_bank_name" readonly
                                                   class="form-control rounded">
                                            <div class="col" style="min-width: 52px">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <label class="d-flex align-items-center" for="applicant_bank_code"
                                                   style="min-width: 175px">Код банка плательщика:</label>
                                            <input type="text" id="applicant_bank_code" name="applicant_bank_code"
                                                   readonly
                                                   class="form-control rounded"
                                                   style="min-width: 200px" required>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="d-flex align-items-center" style="max-width: 1200px">
                                            <div class="d-flex align-items-center" style="min-width: 237px">
                                                <span class="title">СУММА</span>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-sm-12 mb-2" style="min-width: 340px">
                                                <input type="text"
                                                       class="form-control numeral-mask col-12 mb-lg-0 mt-lg-0rounded"
                                                       placeholder="10,000" id="numeral-formatting" required/>
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
                                            <input style="min-width: 340px" type="text" id="beneficiary_bank_account"
                                                   name="beneficiary_bank_account" readonly
                                                   class="form-control rounded">

                                        </div>
                                        <div class="d-flex mb-1">
                                            <div class="col" style="min-width: 105px">
                                            </div>
                                            <label class="d-flex align-items-center" for="beneficiary_tin"
                                                   style="min-width: 122px">ИНН получателя:</label>
                                            <input class="form-control rounded w-100" name="beneficiary_tin"
                                                   id="beneficiary_tin" style="min-width: 200px" required/>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center mb-0" style="max-width: 1200px">
                                            <label class="d-flex align-items-center" for="beneficiary_bank_name"
                                                   style="min-width: 235px">Наимен. банка получателя:</label>
                                            <input style="min-width: 340px" type="text" id="beneficiary_bank_name"
                                                   name="beneficiary_bank_name" readonly
                                                   class="form-control rounded">
                                            <div class="col" style="min-width: 65px">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <label class="d-flex align-items-center" for="beneficiary_bank_code"
                                                   style="min-width: 162px">Код банка получателя:</label>
                                            <input type="text" id="beneficiary_bank_code" name="beneficiary_bank_code"
                                                   readonly
                                                   class="form-control rounded"
                                                   style="min-width: 200px" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-md-0 mt-2">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="d-flex align-items-center" style="min-width: 230px">
                                        <span class="title">Сумма прописью</span>
                                    </div>
                                    <input type="text"
                                           class="form-control ms-50 shadow-lg rounded"
                                           style="max-width: 1000px" required>
                                </div>
                            </div>
                            <div class="mt-md-0 mt-2 mb-2">
                                <div class="d-flex align-items-center mb-1">

                                    <div class="d-flex align-items-center" style="min-width: 230px">
                                        <span class="title">Детали</span>
                                        <span class="title ms-50">платежа</span>
                                    </div>

                                    <textarea class="ms-50 form-control shadow-lg rounded">

                                </textarea>

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
                        <!-- Address and Contact ends -->


                    </div>
                </div>

                <!-- Invoice Add Left ends -->

                <!-- Invoice Add Right starts -->
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
                <!-- Invoice Add Right ends -->
            </div>


            <!-- Send Invoice Sidebar -->

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
    <!-- /Send Invoice Sidebar -->
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
            $('#send-invoice-sidebar').on('shown.bs.modal', function () {
                $('#debit_chart_of_account').select2({
                    placeholder: 'Выберите счет',
                    allowClear: true,
                    dropdownParent: $('#send-invoice-sidebar'), // Modal ichida ishlash
                    width: '100%'
                });
            });
            $('#send-invoice-sidebar').on('shown.bs.modal', function () {
                $('#credit_chart_of_account').select2({
                    placeholder: 'Выберите счет',
                    allowClear: true,
                    dropdownParent: $('#send-invoice-sidebar'), // Modal ichida ishlash
                    width: '100%'
                });
            });
            $('#send-invoice-sidebar').on('shown.bs.modal', function () {
                $('#contract').select2({
                    placeholder: 'Выберите счет',
                    allowClear: true,
                    dropdownParent: $('#send-invoice-sidebar'), // Modal ichida ishlash
                    width: '100%'
                });
            });
            $('#send-invoice-sidebar').on('shown.bs.modal', function () {
                $('#article').select2({
                    placeholder: 'Выберите счет',
                    allowClear: true,
                    dropdownParent: $('#send-invoice-sidebar'), // Modal ichida ishlash
                    width: '100%'
                });
            });

        });
    </script>

@endsection
