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
                    <div class="card-body invoice-padding pb-0">
                        <div class="d-flex">
                            <div class="invoice-number-date mt-md-0 mt-0">
                                <div class="d-flex align-items-center ">
                                    <span class="title" style="min-width: 230px">Номер договора:</span>
                                    <input type="text" placeholder="7856/MV"
                                           class="form-control invoice-edit-input  ms-50 shadow-lg form-control rounded"/>
                                </div>
                            </div>
                            <div style="min-width: 285px"></div>
                            <div class="invoice-number-date mt-md-0 mt-0 ms-lg-75">
                                <div class="d-flex align-items-center ">
                                    <span class="title" style="min-width: 150px">Регистрационный номер договора:</span>
                                    <input type="text" placeholder="7856"
                                           class="form-control invoice-edit-input ms-50 shadow-lg form-control rounded"/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body invoice-padding pb-0">
                        <div class="d-flex">
                            <div class="invoice-number-date mt-md-0 mt-0">
                                <div class="d-flex align-items-center ">
                                    <span class="title" style="min-width: 230px">Дата договора:</span>
                                    <input type="text"
                                           class="form-control invoice-edit-input date-picker ms-50 shadow-lg form-control rounded"/>
                                </div>
                            </div>
                            <div style="min-width: 285px"></div>
                            <div class="invoice-number-date mt-md-0 mt-0 ms-lg-75">
                                <div class="d-flex align-items-center ">
                                    <span class="title" style="min-width: 150px">Дата регистрации:</span>
                                    <input type="text"
                                           class="form-control invoice-edit-input date-picker ms-50 shadow-lg form-control rounded"/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Header ends -->

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">

                        <div class="d-flex align-items-end">
                            <div><p class="d-flex align-items-end" style="align-items: center"></p></div>
                        </div>

                        <div class="invoice-number-date mt-md-0 mt-2">
                            <div class="d-flex align-items-center mb-1">
                                <div class="d-flex align-items-center" style="min-width: 230px">

                                    <span class="title">Контрагент:</span>
                                </div>


                                <select class="form-select ms-50 form-control rounded shadow-lg">
                                    @foreach($contractors as $contractor)
                                    <option value="">{{ $contractor->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="mt-md-0 mt-2 mb-2">

                            <div class="d-flex align-items-center mb-1">

                                <div class="d-flex align-items-center" style="max-width: 230px">
                                    <span class="title">Предмет договора, заголовок (краткое содержание)</span>
                                </div>

                                <textarea class="form-control ms-50 form-control shadow-lg rounded">

                                </textarea>

                            </div>
                        </div>


                            <div class="d-flex">
                                <div class="row">
                                    <div class="d-flex align-items-center mb-1" style="max-width: 1200px">
                                        <div class="d-flex align-items-center" style="min-width: 230px">
                                            <span class="title">СУММА</span>
                                        </div>
                                        <input type="number"
                                               class="form-control col-lg-2 col-12 mb-lg-0 mb-0 mt-lg-0 mt-2 ms-50 shadow-lg form-control rounded"
                                               style="max-width: 340px" placeholder="0,00">

                                    </div>

                                </div>
                                <div style="min-width: 285px"></div>
                                <div class="invoice-number-date mt-md-0 mt-0 ms-lg-75">
                                    <div class="d-flex align-items-center ">
                                        <span class="title" style="min-width: 150px">Сроки действия договора:</span>
                                        <input type="text" placeholder="7856"
                                               class="form-control invoice-edit-input date-picker ms-50 shadow-lg form-control rounded"/>
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
