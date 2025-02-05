@extends('layouts/contentLayoutMaster')

@section('title', 'Список платежных поручений')

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
        <a href="{{ route('payment_orders.export') }}" class="btn btn-success ms-1 btn-sm">
            <i data-feather='download'></i> Экспортировать в Excel
        </a>

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
            {{ $paymentOrders->links() }} <!-- Pagination -->
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-input-mask.js')) }}"></script>
    <script>

    </script>
@endsection

