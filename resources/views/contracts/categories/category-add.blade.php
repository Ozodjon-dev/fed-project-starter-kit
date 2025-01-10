@extends('layouts/contentLayoutMaster')

@section('title', 'Добавить категорию')

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
        <form class="needs-validation" action="{{ route('contract_categories.store') }}" method="post">
            @csrf
            <div class="row invoice-add">
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card invoice-preview-card">

                        <!-- Address and Contact starts -->
                        <div class="card-body invoice-padding ">

                            <div class="d-flex align-items-end">
                                <div><p class="d-flex align-items-end" style="align-items: center"></p></div>
                            </div>

                            <div class="invoice-number-date mt-md-0 mt-2">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="d-flex align-items-center" style="min-width: 230px">
                                        <label class="title">Название категории:</label>
                                    </div>

                                    <input class="form-input ms-50 form-control rounded shadow-lg" type="text" id="name"
                                           name="name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection
