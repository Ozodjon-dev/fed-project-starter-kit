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
        <div class="row invoice-add">
            <!-- Invoice Add Left starts -->
            <div class="col-xl-9 col-md-8 col-12">
                <div class="card invoice-preview-card">
                    <!-- Header starts -->
                    <div class="card-body invoice-padding pb-0">
                        <div class="d-flex">
                            <div class="d-flex invoice-number-date mt-md-0 mt-0">
                                <div class="d-flex align-items-center ">
                                    <span class="title" style="min-width: 230px">Наименование контрагента</span>
                                    <input type="text"
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
                                    <span class="title" style="min-width: 230px">Наименование банка</span>
                                    <input type="text" style="min-width: 500px"
                                           class="form-control invoice-edit-input ms-50 shadow-lg rounded"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body invoice-padding pb-0">
                        <div class="invoice-number-date mt-md-0 mt-2">
                            <div class="d-flex align-items-center">
                                <div class="align-items-center" style="min-width: 230px">
                                    <span class="title">Расчетный счет</span>
                                </div>
                                <input type="number"
                                       class="form-control col-lg-2 col-12 mb-lg-0 mb-0 mt-lg-0 mt-2 ms-50 shadow-lg form-control rounded"
                                       style="max-width: 340px" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="card-body invoice-padding pb-0">
                        <div class="d-flex">
                            <div class="invoice-number-date mt-md-0 mt-0">
                                <div class="d-flex align-items-center">
                                    <span class="title" style="min-width: 230px">ИНН или ПНФЛ</span>
                                    <input type="text"
                                           class="form-control invoice-edit-input ms-50 shadow-lg rounded"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body invoice-padding pb-0">
                        <div class="d-flex mb-2">
                            <div class="invoice-number-date mt-md-0 mt-0">
                                <div class="d-flex align-items-center">
                                    <span class="title" style="min-width: 230px">Код банка</span>
                                    <input type="text"
                                           class="form-control invoice-edit-input ms-50 shadow-lg rounded"/>
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
@endsection
