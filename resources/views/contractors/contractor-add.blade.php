@extends('layouts/contentLayoutMaster')

@section('title', 'Добавить контрагент')

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
        <form class="needs-validation" action="{{ route('contractors.store') }}" method="post">
            @csrf
            <div class="row invoice-add">
                <!-- Invoice Add Left starts -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card invoice-preview-card">
                        <!-- Контрагент Name -->
                        <div class="card-body invoice-padding pb-0">
                            <div class="row">
                                <div class="col-12">
                                    <label class="title" for="name">Наименование контрагента</label>
                                    <input type="text" id="name" name="name" required
                                           placeholder="'O‘ZBEKISTON RESPUBLIKASI IQTISODIYOT VA MOLIYA VAZIRLIGI' DAVLAT MUASSASASI"
                                           class="form-control rounded" />
                                </div>
                            </div>
                        </div>

                        <!-- Bank Account, Bank Code, INN -->
                        <div class="card-body invoice-padding pb-0">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="title" for="bank_account">Расчетный счет</label>
                                    <input type="number" id="bank_account" name="bank_account" required
                                           class="form-control rounded" placeholder="" />
                                </div>
                                <div class="col-md-4">
                                    <label class="title" for="tin">ИНН или ПНФЛ</label>
                                    <input type="number" id="tin" name="tin" required
                                           class="form-control rounded" placeholder="" />
                                </div>
                                <div class="col-md-4">
                                    <label class="title" for="bank_code">Код банка</label>
                                    <select class="form-select rounded" name="bank_code" id="bank_code" required>
                                        <option value="" disabled selected>Выберите код банка</option>
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->bank_code }}" data-bank-name="{{ $bank->bank_name }}">
                                                {{ $bank->bank_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- Bank Name -->
                        <div class="card-body invoice-padding pb-xl-3">
                            <div class="row">
                                <div class="col-12">
                                    <label class="title" for="bank_name">Наименование банка</label>
                                    <input type="text" id="bank_name" name="bank_name" readonly
                                           class="form-control rounded" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Invoice Add Right starts -->
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary w-100 mb-75">Сохранить</button>
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
@endsection

@section('page-script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select2 initialization for "Код банка" with search functionality
            $('#bank_code').select2({
                placeholder: 'Выберите код банка',
                allowClear: true,
                width: '100%'
            });

            // Synchronize "Код банка" with "Наименование банка"
            $('#bank_code').on('change', function () {
                const selectedOption = $(this).find(':selected'); // Get the selected option
                const bankName = selectedOption.data('bank-name'); // Extract "data-bank-name"
                $('#bank_name').val(bankName); // Update "Наименование банка"
            });
        });
    </script>
@endsection
