@extends('layouts/contentLayoutMaster')
@section('title', 'Договор')
@section('content')
    @if (session('success'))
        <div class="d-inline-block">
            <!-- Modal -->
            <div class="modal fade text-center modal-size-xs" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
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
        <a href="{{ route('contracts.list') }}" class="btn btn-outline-primary btn-sm">
            <i data-feather="arrow-left"></i> Назад
        </a>

        <form method="GET" action="{{ route('contract_categories.list') }}" class="d-flex align-items-center ms-1">
            <div class="input-group">
                <input
                    disabled
                    type="text"
                    class="form-control form-control-sm"
                    placeholder="Поиск"
                    name="search"
                    value="{{ request('search') }}"
                >
                <button disabled type="submit" class="btn btn-primary btn-sm">
                    <i data-feather="search"></i>
                </button>
            </div>
        </form>

        <a href="{{ route('contracts.add') }}" class="btn btn-icon btn-primary ms-auto btn-sm"
           style="border-radius: 50%">
            <i data-feather="plus" class="text-white"></i>
        </a>
    </div>

    <div class="table-responsive rounded" style="font-size: small">
        <table class="table table table-bordered table-sm" style="text-align: center">
            <thead>
            <tr class="align-middle align-content-center">
                <th scope="col">#</th>
                <th scope="col">Рег. №</th>
                <th scope="col" style="min-width: 100px">Дата рег.</th>
                <th scope="col">Тип договора</th>
                <th scope="col" style="min-width: 100px">Номер</th>
                <th scope="col">Дата договора</th>
                <th scope="col">Контрагент</th>
                <th scope="col">Категория</th>
                <th scope="col">Предмет</th>
                <th class="col">Статья</th>
                <th scope="col" style="min-width: 150px">Сумма</th>
                <th scope="col">Срок договора</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>{{ $contract->id }}</th>
                <td>{{ $contract->registration_number }}</td>
                <td>{{ \Carbon\Carbon::parse($contract->registration_date)->format('d.m.Y') }}</td>
                <td>{{ $contract->type }}</td>
                <td>{{ $contract->number }}</td>
                <td>{{ \Carbon\Carbon::parse($contract->date)->format('d.m.Y') }}</td>
                <td>{{ $contract->contractor }}</td>
                <td>{{ $contract->category }}</td>
                <td>{{ $contract->details }}</td>
                <td>{{ $contract->article }}</td>
                <td>{{ number_format($contract->amount, 2, '.', ',') }}</td>
                <td>{{ \Carbon\Carbon::parse($contract->term)->format('d.m.Y') }}</td>
                <td>
                    <div class="btn-group me-2" style="max-width: 65px">
                        <form action="{{ route('contracts.edit', $contract->id) }}">
                            <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-flat-primary">
                                <i data-feather="edit"></i>
                            </button>
                        </form>
                        <div class="d-inline-block ms-1">
                            <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#danger">
                                <i data-feather="trash"></i>
                            </button>
                            <!-- Modal -->
                            <div
                                class="modal fade modal-danger text-start"
                                id="danger"
                                tabindex="-1"
                                aria-labelledby="myModalLabel120"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel120"><strong>Внимание!</strong>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>Вы уверены, что хотите удалить этот контракт?</strong>
                                        </div>
                                        <div class="d-flex">
                                            <form class="ms-1 mb-2"
                                                  action="{{ route('contracts.delete', $contract->id) }}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="Удалить"
                                                       class="btn btn-outline-danger">
                                            </form>
                                            <form class="ms-1 mb-2" action="" method="post">
                                                <input type="button" value="Отмена" data-bs-dismiss="modal"
                                                       aria-label="Close"
                                                       class="btn btn-danger">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive rounded" style="font-size: small">
        @if($contract->paymentOrders->isNotEmpty())
            <h5 class="mt-3">Платежные поручения по договору</h5>
            <div class="table-responsive rounded" style="font-size: small">
                <table class="table table-bordered table-sm" style="text-align: center">
                    <thead>
                    <tr class="align-middle align-content-center">
                        <th scope="col">#</th>
                        <th scope="col">Номер</th>
                        <th scope="col" style="width: 90px">Дата</th>
                        <th scope="col">Наименование плательщика</th>
                        <th scope="col">Наименование получателя</th>
                        <th scope="col">ИНН получателя</th>
                        <th scope="col">Расчетный счет получателя</th>
                        <th scope="col">Сумма</th>
                        <th scope="col">Детали платежа</th>
                        <th class="col">Статья</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contract->paymentOrders as $index => $payment_order)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $payment_order->number }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment_order->date)->format('d.m.Y') }}</td>
                            <td>{{ $payment_order->applicant }}</td>
                            <td>{{ $payment_order->contractor }}</td>
                            <td>{{ $payment_order->beneficiary_tin }}</td>
                            <td>{{ $payment_order->beneficiary_bank_account }}</td>
                            <td>{{ number_format($payment_order->amount, 2, '.', ',') }}</td>
                            <td>{{ $payment_order->details }}</td>
                            <td>{{ $payment_order->article }}</td>
                            <td style="max-width: 50px">
                                <a href="{{ route('payment_orders.preview', $payment_order->id) }}" type="button"
                                   class="btn btn-icon rounded-circle btn-flat-primary">
                                    <i data-feather="eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <!-- Umumiy summa pastda chiqariladi -->
                    <tfoot>
                    <tr>
                        <th colspan="7" class="text-end">Общая сумма:</th>
                        <th class="text-bold">{{ number_format($totalPaymentAmount, 2, '.', ',') }}</th>
                        <th colspan="3"></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        @else
            <div class="alert alert-warning text-center">
                <strong>По этому договору нет платежных поручений</strong>
            </div>
        @endif


    </div>
@endsection
