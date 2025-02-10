@extends('layouts/contentLayoutMaster')

@section('title', 'Поступление денежных средств')

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
        <a href="{{ route('receipt_of_funds.list') }}" class="btn btn-outline-primary btn-sm">
            <i data-feather="arrow-left"></i> Назад
        </a>

        <!-- Excel export button -->
        <a href="{{ route('contracts.export') }}" class="btn btn-success ms-1 btn-sm">
            <i data-feather='download'></i>
            Экспортировать в Excel
        </a>

        <form method="GET" action="{{ route('receipt_of_funds.list') }}" class="d-flex align-items-center ms-1">
            <div class="input-group">
                <input
                    disabled
                    type="text"
                    class="form-control form-control-sm"
                    placeholder="Поиск"
                    name="search"
                    value="{{ request('search') }}"
                >
                <button type="submit" class="btn btn-primary btn-sm" disabled>
                    <i data-feather="search"></i>
                </button>
            </div>
        </form>

        <!-- Move the plus button to the right -->
        <a href="{{ route('receipt_of_funds.add') }}" class="btn btn-icon btn-primary ms-auto btn-sm"
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
                <th scope="col" style="max-width: 90px">Дата</th>
                <th scope="col">Расчетный счет</th>
                <th scope="col">Дебет</th>
                <th scope="col">Кредит</th>
                <th scope="col">Договор</th>
                <th class="col">Статья</th>
                <th class="col">Предмет</th>
                <th scope="col" style="min-width: 150px">Сумма</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $receipt_of_fund->id }}</td>
                <td style="max-width: 100px">{{ $receipt_of_fund->number }}</td>
                <td>{{ \Carbon\Carbon::parse($receipt_of_fund->date)->format('d.m.Y') }}</td>
                <td>{{ $receipt_of_fund->bank_account }}</td>
                <td>{{ $receipt_of_fund->debit_chart_of_account }}</td>
                <td>{{ $receipt_of_fund->credit_chart_of_account }}</td>
                <td>
                    @if($receipt_of_fund->contract)
                        № {{ $receipt_of_fund->contract->number }} от
                        {{ \Carbon\Carbon::parse($receipt_of_fund->contract->date)->format('d.m.Y') }}
                        с {{ $receipt_of_fund->contract->contractor }}
                    @endif
                </td>
                <td>{{ $receipt_of_fund->article }}</td>
                <td>{{ $receipt_of_fund->details }}</td>
                <td>{{ number_format($receipt_of_fund->amount, 2, '.', ',') }}</td>
                <td>
                    <div class="btn-group me-2" style="max-width: 65px">
                        <form action="{{ route('receipt_of_funds.edit', $receipt_of_fund->id) }}">
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
                                            <strong>Вы уверены, что хотите удалить этот поступление денежных
                                                средств?</strong>
                                        </div>
                                        <div class="d-flex">
                                            <form class="ms-1 mb-2"
                                                  action="{{ route('receipt_of_funds.delete', $receipt_of_fund->id) }}"
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
        <div>
            {{--            {{ $contracts->links() }} <!-- Pagination -->--}}
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-input-mask.js')) }}"></script>
@endsection
