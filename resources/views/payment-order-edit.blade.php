@extends('layouts/contentLayoutMaster')

@section('title', 'Редактировать платежное поручение')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
@endsection

@section('content')
<section class="invoice-edit-wrapper">
  <div class="row invoice-edit">

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
                                      <div class="d-flex align-items-center" style="min-width: 230px">
                                          <span class="title">СУММА</span>
                                      </div>
                                      <input type="number"
                                             class="form-control col-lg-2 col-12 mb-lg-0 mb-0 mt-lg-0 mt-2 ms-50 shadow-lg form-control rounded"
                                             style="max-width: 340px" placeholder="0,00">

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

    <!-- Invoice Edit Left ends -->

    <!-- Invoice Edit Right starts -->
      <div class="col-xl-3 col-md-4 col-12">
          <div class="card">
              <div class="col card-body">
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
                  <div class="d-flex align-items-center">
                      <div style="min-width: 90px">
                          Статья
                      </div>
                      <select class="form-select mb-75 ms-1 shadow-lg rounded">
                          <option value="">42 52 110</option>
                          <option value="">43 54 990</option>
                      </select>
                  </div>
              </div>
          </div>
          <div class="card">
              <div class="card-body">
                  <a href="{{url('/payment_order/preview')}}" class="btn btn-outline-primary w-100 mb-75">Предварительный просмотр</a>
                  <button type="button" class="btn btn-primary w-100 mb-75">Сохранять</button>
              </div>
          </div>
          {{--                <div class="mt-2">--}}
          {{--                    <p class="mb-50">Accept payments via</p>--}}
          {{--                    <select class="form-select">--}}
          {{--                        <option value="Bank Account">Bank Account</option>--}}
          {{--                        <option value="Paypal">Paypal</option>--}}
          {{--                        <option value="UPI Transfer">UPI Transfer</option>--}}
          {{--                    </select>--}}
          {{--                    <div class="invoice-terms mt-1">--}}
          {{--                        <div class="d-flex justify-content-between">--}}
          {{--                            <label class="invoice-terms-title mb-0" for="paymentTerms">Payment Terms</label>--}}
          {{--                            <div class="form-check form-switch">--}}
          {{--                                <input type="checkbox" class="form-check-input" checked id="paymentTerms"/>--}}
          {{--                                <label class="form-check-label" for="paymentTerms"></label>--}}
          {{--                            </div>--}}
          {{--                        </div>--}}
          {{--                        <div class="d-flex justify-content-between py-1">--}}
          {{--                            <label class="invoice-terms-title mb-0" for="clientNotes">Client Notes</label>--}}
          {{--                            <div class="form-check form-switch">--}}
          {{--                                <input type="checkbox" class="form-check-input" checked id="clientNotes"/>--}}
          {{--                                <label class="form-check-label" for="clientNotes"></label>--}}
          {{--                            </div>--}}
          {{--                        </div>--}}
          {{--                        <div class="d-flex justify-content-between">--}}
          {{--                            <label class="invoice-terms-title mb-0" for="paymentStub">Payment Stub</label>--}}
          {{--                            <div class="form-check form-switch">--}}
          {{--                                <input type="checkbox" class="form-check-input" id="paymentStub"/>--}}
          {{--                                <label class="form-check-label" for="paymentStub"></label>--}}
          {{--                            </div>--}}
          {{--                        </div>--}}
          {{--                    </div>--}}
          {{--                </div>--}}
      </div>
    <!-- Invoice Edit Right ends -->
  </div>

  <!-- Send Invoice Sidebar -->
  <div class="modal modal-slide-in fade" id="send-invoice-sidebar" aria-hidden="true">
    <div class="modal-dialog sidebar-lg">
      <div class="modal-content p-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title">
            <span class="align-middle">Send Invoice</span>
          </h5>
        </div>
        <div class="modal-body flex-grow-1">
          <form>
            <div class="mb-1">
              <label for="invoice-from" class="form-label">From</label>
              <input
                type="text"
                class="form-control"
                id="invoice-from"
                value="shelbyComapny@email.com"
                placeholder="company@email.com"
              />
            </div>
            <div class="mb-1">
              <label for="invoice-to" class="form-label">To</label>
              <input
                type="text"
                class="form-control"
                id="invoice-to"
                value="Consolidated@email.com"
                placeholder="company@email.com"
              />
            </div>
            <div class="mb-1">
              <label for="invoice-subject" class="form-label">Subject</label>
              <input
                type="text"
                class="form-control"
                id="invoice-subject"
                value="Invoice of purchased Admin Templates"
                placeholder="Invoice regarding goods"
              />
            </div>
            <div class="mb-1">
              <label for="invoice-message" class="form-label">Message</label>
              <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="11">
Dear Queen Consolidated,

Thank you for your business, always a pleasure to work with you!

We have generated a new invoice in the amount of $95.59

We would appreciate payment of this invoice by 05/11/2019</textarea
              >
            </div>
            <div class="mb-1">
              <span class="badge badge-light-primary">
                <i data-feather="link" class="me-25"></i>
                <span class="align-middle">Invoice Attached</span>
              </span>
            </div>
            <div class="mb-1 d-flex flex-wrap mt-2">
              <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Send</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /Send Invoice Sidebar -->

  <!-- Add Payment Sidebar -->
  <div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
    <div class="modal-dialog sidebar-lg">
      <div class="modal-content p-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title">
            <span class="align-middle">Add Payment</span>
          </h5>
        </div>
        <div class="modal-body flex-grow-1">
          <form>
            <div class="mb-1">
              <input id="balance" class="form-control" type="text" value="Invoice Balance: 5000.00" disabled />
            </div>
            <div class="mb-1">
              <label class="form-label" for="amount">Payment Amount</label>
              <input id="amount" class="form-control" type="number" placeholder="$1000" />
            </div>
            <div class="mb-1">
              <label class="form-label" for="payment-date">Payment Date</label>
              <input id="payment-date" class="form-control date-picker" type="text" />
            </div>
            <div class="mb-1">
              <label class="form-label" for="payment-method">Payment Method</label>
              <select class="form-select" id="payment-method">
                <option value="" selected disabled>Select payment method</option>
                <option value="Cash">Cash</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Debit">Debit</option>
                <option value="Credit">Credit</option>
                <option value="Paypal">Paypal</option>
              </select>
            </div>
            <div class="mb-1">
              <label class="form-label" for="payment-note">Internal Payment Note</label>
              <textarea class="form-control" id="payment-note" rows="5" placeholder="Internal Payment Note"></textarea>
            </div>
            <div class="d-flex flex-wrap mb-0">
              <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Send</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /Add Payment Sidebar -->
</section>
@endsection

@section('vendor-script')
<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection
