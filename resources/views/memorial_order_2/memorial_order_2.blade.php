@extends('layouts/contentLayoutMaster')

@section('title', '2 - Мемориальный ордер (Нак. вед. по движению бюджетных средств)')
@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
    <link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
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
        <a href="{{ route('main.index') }}" class="btn btn-outline-primary">
            <i data-feather="arrow-left"></i> Назад
        </a>

        <!-- Excel export button -->
        <a href="{{ route('payment_orders.export') }}" class="btn btn-success ms-auto">
            <i data-feather='download'></i>
            Экспортировать в Excel
        </a>

        <div class="d-flex col-md-3 ms-auto mb-0">
            <select name="chart_of_account"
                    style="padding: 0.285rem 1rem"
                    id="chart_of_account"
                    class="form-select form-control rounded">
                <option disabled selected></option>
                @foreach($chart_of_accounts as $chart_of_account)
                    <option value="{{ $chart_of_account->number }}"
                            data-number="{{ $chart_of_account->number }}">
                        {{ $chart_of_account->number }} - {{ $chart_of_account->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex col-md-3 ms-auto mb-0">
            <input
                style="padding: 0.285rem 1rem"
                type="text"
                id="fp-range"
                class="ms-1 form-control flatpickr-range"
                placeholder="Выберите период"
            />
        </div>

        <a href="" class="btn btn-icon btn-primary ms-1 ms-auto" style="border-radius: 50%">
            <i data-feather='refresh-cw'></i>
        </a>
    </div>

@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js'))}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js'))}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-input-mask.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Initialize Select2 for modal dropdowns when modal is shown
            $('#chart_of_account').select2({
                placeholder: 'Выберите счет',
                allowClear: true,
                width: '100%'
            })
        });

    </script>
@endsection
