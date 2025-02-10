@extends('layouts/contentLayoutMaster')

@section('title', 'Список платежных поручений')
@section('vendor-style')
    <link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection

@section('content')
    @if (session('success'))
        <div class="d-inline-block">
            <!-- Modal -->
            <div class="modal fade text-center modal-size-xs" id="successModal" tabindex="-1"
                 aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <span class="modal-body rounded">
                        {{ session('success') }}
                    </span>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        {{-- JavaScript kodini qo'shish: Modalni avtomatik ochish va yopish --}}
        <script>
            // Sahifa yuklanganda modalni avtomatik ochish
            document.addEventListener('DOMContentLoaded', function () {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();

                // 3 soniya o‘tgach, modalni yopish
                setTimeout(function () {
                    successModal.hide();
                }, 3000); // 3000 millisekund = 3 soniya
            });
        </script>
    @endif

    <div class="d-flex justify-content mb-1">
        <a href="{{ route('main.index') }}" class="btn btn-outline-primary btn-sm">
            <i data-feather="arrow-left"></i> Назад
        </a>

        <form method="GET" action="{{ route('payment_orders.list') }}" class="d-flex align-items-center ms-1">
            <div class="input-group">
                <input
                    type="text"
                    class="form-control form-control-sm"
                    placeholder="Поиск"
                    name="search"
                    value="{{ request('search') }}"
                >
                <button type="submit" class="btn btn-primary btn-sm">
                    <i data-feather="search"></i>
                </button>
            </div>
        </form>


        <!-- Excel export button -->
        <a href="{{ route('payment_orders.export', request()->query()) }}" class="btn btn-success ms-1 btn-sm">
            <i data-feather='download'></i> Экспортировать в Excel
        </a>

        <div class="dropdown ms-1">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i data-feather="filter" class="me-1"></i>
            </button>
            <ul class="dropdown-menu p-3 shadow" aria-labelledby="filterDropdown" style="min-width: 300px;">
                <!-- Filtr shakli -->
                <form method="GET" action="">
                    <div class="mb-2">
                        <label class="form-label">Фильтр по организацию</label>
                        <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" name="applicant[]" value="O‘zbekiston Respublikasi PDXX" id="pdxx"
                                {{ request()->has('applicant') && in_array('O‘zbekiston Respublikasi PDXX', request()->applicant) ? 'checked' : '' }}>
                                <label class="form-check-label" for="pdxx">O‘ZBEKISTON RESPUBLIKASI PDXX</label>
                        </div>
                        <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" name="applicant[]" value="77601 Harbiy Qism" id="harbiy"
                                {{ request()->has('applicant') && in_array('77601 Harbiy Qism', request()->applicant) ? 'checked' : '' }}>
                            <label class="form-check-label" for="harbiy">77601 HARBIY QISM</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100 mt-2">Применить</button>
                    <a href="{{ route('payment_orders.list') }}" class="btn btn-secondary btn-sm w-100 mt-1">Очистить фильтр</a>
                </form>
            </ul>
        </div>





        <!-- Move the plus button to the right -->
        <a href="{{ route('payment_orders.add') }}" class="btn btn-icon btn-primary ms-auto btn-sm"
           style="border-radius: 50%">
            <i data-feather="plus" class="text-white"></i>
        </a>
    </div>


    <div class="table-responsive rounded">
        <table class="table table-responsive table-bordered table-sm" style="text-align: center">
            <thead>
            <tr class="align-middle align-content-center">
                <th scope="col">#</th>
                <th scope="col">Номер</th>
                <th scope="col" style="width: 90px">Дата</th>
                <th scope="col">Наименование плательщика:</th>
                <th scope="col">Наименование получателя:</th>
                <th scope="col">ИНН получателя:</th>
                <th scope="col">Расчетный счет получателя:</th>
                <th scope="col">Сумма</th>
                <th scope="col">Детали платежа</th>
                <th class="col">Статья</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($paymentOrders as $paymentOrder)
                <tr>
                    <th>{{ $paymentOrder->id }}</th>
                    <th>{{ $paymentOrder->number }}</th>
                    <td>{{ \Carbon\Carbon::parse($paymentOrder->date)->format('d.m.Y') }}</td>
                    <td>{{ $paymentOrder->applicant }}</td>
                    <td>{{ $paymentOrder->contractor }}</td>
                    <td>{{ $paymentOrder->beneficiary_tin }}</td>
                    <td>{{ $paymentOrder->beneficiary_bank_account }}</td>
                    <td>{{ number_format($paymentOrder->amount, 2, '.', ',') }}</td>
                    <td>{{ $paymentOrder->details }}</td>
                    <td>{{ $paymentOrder->article }}</td>
                    <td style="max-width: 50px">
                        <a href="{{ route('payment_orders.preview', $paymentOrder->id) }}" type="button"
                           class="btn btn-icon rounded-circle btn-flat-primary">
                            <i data-feather="eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{ $paymentOrders->appends(request()->query())->links() }}
        </div>
    </div>
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

    <!-- Feather Icons aktiv qilish -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (typeof feather !== "undefined") {
                feather.replace();
            }

            // Filtrni tanlagandan keyin dropdownni yopish
            document.querySelectorAll(".dropdown-menu input").forEach(input => {
                input.addEventListener("change", function () {
                    setTimeout(() => {
                        document.querySelector("#filterDropdown").click();
                    }, 300);
                });
            });
        });
    </script>
@endsection
