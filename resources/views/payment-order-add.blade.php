@extends('layouts/contentLayoutMaster')

@section('title', 'Создать платежное поручение')

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
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div class="container">
                                <div class="logo-wrapper mt-0" style="justify-content: center">
                                    <h3 class="text-uppercase"><b>
                                            Платежное поручение №
                                        </b>
                                    </h3>
                                    <div class="ms-1 align-items-center">
                                        <h6 class="invoice-title"></h6>
                                        <div class="input-group input-group-merge invoice-edit-input-group shadow-lg">

                                            <input type="text"
                                                   class="form-control invoice-edit-input form-control rounded"
                                                   placeholder="53634"/>
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

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">

                        <div class="d-flex align-items-end">
                            <div><p class="d-flex align-items-end" style="align-items: center"></p></div>
                        </div>

                        <div class="invoice-number-date mt-md-0 mt-2">
                            <div class="d-flex align-items-center mb-1">
                                <div class="d-flex align-items-center" style="min-width: 230px">
                                    <span class="title">Наименование</span>
                                    <span class="title ms-50"> плательщика:</span>
                                </div>


                                <select class="form-select ms-50 form-control rounded shadow-lg">
                                    <option value="">1-организация</option>
                                    <option value="">2-организация</option>
                                </select>

                            </div>
                        </div>
                        <h6 class="invoice-to-title"><b></b></h6>

                        <div class="row row-bill-to invoice-spacing">
                            <div class="col ps-0">

                                <h6 class=""><b>ДЕБЕТ</b></h6>
                                <div class="row">
                                    <div class="d-flex align-items-center mb-1" style="max-width: 1200px">
                                        <div class="d-flex align-items-center" style="min-width: 230px">
                                            <span class="title">Расчетный</span>
                                            <span class="title ms-50">счет</span>
                                            <span class="title ms-50">плательщика:</span>
                                        </div>
                                        <select
                                            class="form-select col-lg-2 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2 ms-50 shadow-lg form-control rounded"
                                            style="max-width: 340px">
                                            <option value="">20209000800976644826</option>
                                            <option value="">20209000800976644026</option>
                                            <option value="">3-счет</option>
                                            <option value="">4-счет</option>
                                        </select>
                                        <div class="d-flex align-items-end ms-75" style="min-width: 210px">
                                            <div class="col">
                                            </div>
                                            <span class="title">ИНН</span>
                                            <span class="title ms-50">плательщика:</span>
                                        </div>
                                        <select
                                            class="form-select col-lg-2 col-1 mb-lg-0 mb-2 mt-lg-0 mt-2 ms-50 shadow-lg form-control rounded"
                                            style="max-width: 199px">
                                            <option value="">207256888</option>
                                            <option value="">201111755</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="d-flex align-items-center mb-1" style="max-width: 1200px">
                                        <div class="d-flex align-items-center" style="min-width: 230px">
                                            <span class="title">Наимен.</span>
                                            <span class="title ms-50">банка</span>
                                            <span class="title ms-50">плательшика:</span>
                                        </div>
                                        <select
                                            class="form-select col-lg-2 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2 ms-50 shadow-lg form-control rounded"
                                            style="max-width: 340px">
                                            <option value="">РКЦ ЦБ по г. Ташкенту</option>
                                            <option value="">20209000800976644026</option>
                                            <option value="">3-счет</option>
                                            <option value="">4-счет</option>
                                        </select>
                                        <div class="d-flex align-items-end ms-75" style="min-width: 210px">
                                            <div class="col">
                                            </div>
                                            <span class="title">Код</span>
                                            <span class="title ms-50">банка</span>
                                            <span class="title ms-50">плательщика:</span>
                                        </div>
                                        <select
                                            class="form-select col-lg-2 col-1 mb-lg-0 mb-2 mt-lg-0 mt-2 ms-50 shadow-lg form-control rounded"
                                            style="max-width: 199px">
                                            <option value="">00014</option>

                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="d-flex align-items-center mb-1" style="max-width: 1200px">
                                        <div class="d-flex align-items-center" style="min-width: 237px">
                                            <span class="title">СУММА</span>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2" style="min-width: 340px">
                                            <input type="text"
                                                   class="form-control numeral-mask col-12 mb-lg-0 mt-lg-0 shadow-lg rounded"
                                                   placeholder="10,000" id="numeral-formatting"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center" style="min-width: 230px">
                                <span class="title">Наименование</span>
                                <span class="title ms-50"> получателя:</span>
                            </div>


                            <select class="form-select ms-50 form-control shadow-lg rounded">
                                <option value="">1-организация</option>
                                <option value="">2-организация</option>
                            </select>

                        </div>
                        <h6 class="invoice-to-title"><b></b></h6>

                        <div class="row row-bill-to invoice-spacing">
                            <div class="col-lg-auto mb-md-2 col-bill-to ps-0">


                                <h6 class=""><b>КРЕДИТ</b></h6>
                                <div class="row">
                                    <div class="d-flex align-items-center mb-1" style="max-width: 1200px">
                                        <div class="d-flex align-items-center" style="min-width: 230px">
                                            <span class="title">Расчетный</span>
                                            <span class="title ms-50">счет</span>
                                            <span class="title ms-50">получателя:</span>
                                        </div>
                                        <select
                                            class="form-select col-lg-2 ms-50 form-control shadow-lg rounded"
                                            style="max-width: 340px">
                                            <option value="">20209000800976644826</option>
                                            <option value="">20209000800976644026</option>
                                            <option value="">3-счет</option>
                                            <option value="">4-счет</option>
                                        </select>
                                        <div class="d-flex align-items-end ms-75" style="min-width: 210px">
                                            <div class="col">
                                            </div>
                                            <span class="title">ИНН</span>
                                            <span class="title ms-50">получателя:</span>
                                        </div>
                                        <select
                                            class="form-select col-lg-2 col-1 mb-lg-0 mb-0 mt-lg-0 mt-2 ms-50 form-control shadow-lg rounded"
                                            style="max-width: 199px">
                                            <option value="">207256888</option>
                                            <option value="">201111755</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="d-flex align-items-center mb-0" style="max-width: 1200px">
                                        <div class="d-flex align-items-center" style="min-width: 230px">
                                            <span class="title">Наимен.</span>
                                            <span class="title ms-50">банка</span>
                                            <span class="title ms-50">получателя:</span>
                                        </div>
                                        <input
                                            class="form-control col-lg-2 col-12 mb-lg-0 mt-lg-0 ms-50 form-control shadow-lg rounded"
                                            style="max-width: 340px">
                                        <div class="d-flex align-items-end ms-75" style="min-width: 210px">
                                            <div class="col">
                                            </div>
                                            <span class="title">Код</span>
                                            <span class="title ms-50">банка</span>
                                            <span class="title ms-50">получателя:</span>
                                        </div>
                                        <input
                                            class="form-control col-1 mb-lg-0 mt-lg-0 ms-50 form-control shadow-lg rounded"
                                            style="max-width: 199px">
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
                                       class="form-control ms-50 form-control shadow-lg rounded"
                                       style="max-width: 1000px">
                            </div>
                        </div>

                        <div class="mt-md-0 mt-2 mb-2">

                            <div class="d-flex align-items-center mb-1">

                                <div class="d-flex align-items-center" style="min-width: 230px">
                                    <span class="title">Детали</span>
                                    <span class="title ms-50">платежа</span>
                                </div>

                                <textarea class="form-control ms-50 form-control shadow-lg rounded">

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
                        <div class="mt-md-0 mt-2 mb-2">˘

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
                                            <div type="number" class="form-control rounded" style="height: 40px"></div>
                                        </div>
                                        <div class="col me-2">Одобрен
                                            <div type="number" class="form-control rounded" style="height: 40px"></div>
                                        </div>
                                        <div class="col me-2">Проведено банком
                                            <div type="number" class="form-control rounded" style="height: 40px"></div>
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
                                 viewBox="0 0 185.343 185.343" xml:space="preserve">
<g>
    <g>
        <path style="fill:#FFFFFF;" d="M51.707,185.343c-2.741,0-5.493-1.044-7.593-3.149c-4.194-4.194-4.194-10.981,0-15.175
			l74.352-74.347L44.114,18.32c-4.194-4.194-4.194-10.987,0-15.175c4.194-4.194,10.987-4.194,15.18,0l81.934,81.934
			c4.194,4.194,4.194,10.987,0,15.175l-81.934,81.939C57.201,184.293,54.454,185.343,51.707,185.343z"/>
    </g>
</g>
</svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Invoice Add Right ends -->
        </div>

        <!-- Add New Customer Sidebar -->
        <div class="modal modal-slide-in fade" id="add-new-customer-sidebar" aria-hidden="true">
            <div class="modal-dialog sidebar-lg">
                <div class="modal-content p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title">
                            <span class="align-middle">Add Customer</span>
                        </h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <form>
                            <div class="mb-1">
                                <label for="customer-name" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="customer-name" placeholder="John Doe"/>
                            </div>
                            <div class="mb-1">
                                <label for="customer-email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="customer-email"
                                       placeholder="example@domain.com"/>
                            </div>
                            <div class="mb-1">
                                <label for="customer-address" class="form-label">Customer Address</label>
                                <textarea
                                    class="form-control"
                                    id="customer-address"
                                    cols="2"
                                    rows="2"
                                    placeholder="1307 Lady Bug Drive New York"
                                ></textarea>
                            </div>
                            <div class="mb-1 position-relative">
                                <label for="customer-country" class="form-label">Country</label>
                                <select class="form-select" id="customer-country" name="customer-country">
                                    <option label="select country"></option>
                                    <option value="Australia">Australia</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="customer-contact" class="form-label">Contact</label>
                                <input type="number" class="form-control" id="customer-contact"
                                       placeholder="763-242-9206"/>
                            </div>
                            <div class="mb-1 d-flex flex-wrap mt-2">
                                <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Add</button>
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add New Customer Sidebar -->
    </section>
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
                        <div class="d-flex align-items-center">
                            <div style="min-width: 90px">
                                Операция
                            </div>
                            <select class="form-select mb-75 ms-1 shadow-lg rounded">
                                <option value="">159.000-100.000</option>
                                <option value="">231.000-100.000</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                            <div style="min-width: 150px">
                                Дебет
                            </div>
                            <select class="form-select mb-75 ms-1 shadow-lg rounded">
                                <option value="">159.000</option>
                                <option value="">100.000</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                            <div style="min-width: 150px">
                                Кредит
                            </div>
                            <select class="form-select mb-75 ms-1 shadow-lg rounded">
                                <option value="">159.000</option>
                                <option value="">100.000</option>
                            </select>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <div class="col" style="min-width: 90px">
                                Договор
                            </div>
                            <select class="form-select mb-75 ms-1 shadow-lg rounded">
                                <option value="">№ 71 от 2024.12.21</option>
                                <option value="">№ 74 от 2024.11.18</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="invoice-from" class="form-label">Статья</label>
                            <select class="form-select mb-75 shadow-lg rounded">
                                @foreach($classificators as $classificator)
                                    <option value="">
                                        {{ $classificator->article }} - {{ $classificator->details }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1 flex-wrap mt-2 card-body">
                            <a href="" class="btn btn-outline-primary w-100 mb-75"
                               data-bs-dismiss="modal">Отмена</a>
                            <button class="btn btn-primary w-100 mb-75" data-bs-toggle="modal"
                                    data-bs-target="#send-invoice-sidebar">
                                Сохранить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script src="{{ asset(mix('js/scripts/forms/form-input-mask.js')) }}"></script>
@endsection
