@extends('layouts/contentLayoutMaster')

@section('title', 'Редактирование контрагента')

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
        <form class="needs-validation" action="{{ route('contractors.update', $contractor->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="row invoice-add">
                <!-- Invoice Add Left starts -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card invoice-preview-card">
                        <!-- Header starts -->
                        <div class="card-body invoice-padding pb-0">
                            <div class="d-flex">
                                <div class="d-flex invoice-number-date mt-md-0 mt-0">
                                    <div class="d-flex align-items-center ">
                                        <label class="title" for="name" style="min-width: 230px">Наименование
                                            контрагента</label>
                                        <input type="text" id="name" name="name" required value="{{ $contractor->name }}"
                                               placeholder="'O‘ZBEKISTON RESPUBLIKASI IQTISODIYOT VA MOLIYA VAZIRLIGI' DAVLAT MUASSASASI"
                                               style="min-width: 765px"
                                               class="form-control invoice-edit-input ms-50 shadow-lg rounded"/>
                                    </div>
                                    <div style="min-width: px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body invoice-padding pb-0">
                            <div class="d-flex">
                                <div class="invoice-number-date mt-md-0 mt-0">
                                    <div class="d-flex align-items-center ">
                                        <label class="title" for="bank_name" style="min-width: 230px">Наименование
                                            банка</label>
                                        <select
                                            class="form-select col-lg-2 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2 ms-50 shadow-lg form-control rounded"
                                            style="max-width: 765px" name="bank_name" id="bank_name" required>
                                            @foreach($banks as $bank)
                                                <option value="{{ $bank->bank_name }}">{{ $bank->bank_code }} - {{ $bank->bank_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body invoice-padding pb-0">
                            <div class="invoice-number-date mt-md-0 mt-2">
                                <div class="d-flex align-items-center">
                                    <div class="align-items-center" style="min-width: 230px">
                                        <label class="title" for="bank_account">Расчетный счет</label>
                                    </div>
                                    <input type="number" id="bank_account" name="bank_account" required value="{{ $contractor->bank_account }}"
                                           class="form-control col-lg-2 col-12 mb-lg-0 mb-0 mt-lg-0 mt-2 ms-50 shadow-lg form-control rounded"
                                           style="max-width: 340px" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="card-body invoice-padding pb-0">
                            <div class="d-flex">
                                <div class="invoice-number-date mt-md-0 mt-0">
                                    <div class="d-flex align-items-center">
                                        <label class="title" for="tin" style="min-width: 230px">ИНН или ПНФЛ</label>
                                        <input type="number" id="tin" name="tin" required value="{{ $contractor->tin }}"
                                               class="form-control invoice-edit-input ms-50 shadow-lg rounded"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body invoice-padding pb-0">
                            <div class="d-flex mb-2">
                                <div class="invoice-number-date mt-md-0 mt-0">
                                    <div class="d-flex align-items-center">
                                        <label class="title" for="bank_code" style="min-width: 230px">Код банка</label>
                                        <select
                                            class="form-select col-lg-2 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2 ms-50 shadow-lg form-control rounded"
                                            style="max-width: 340px" name="bank_code" id="bank_code" required>
                                            @foreach($banks as $bank)
                                            <option value="{{ $bank->bank_code }}">{{ $bank->bank_code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary w-100 mb-75">Редактировать</button>
                            <button onclick="location.href='{{ route('contractors.list') }}'" type="button" class="btn btn-outline-primary w-100 mb-25">Отмена</button>
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
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection
