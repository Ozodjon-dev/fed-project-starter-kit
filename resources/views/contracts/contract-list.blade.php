@extends('layouts/contentLayoutMaster')

@section('title', 'Список договоров')

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
        <a href="{{ route('main.index') }}" class="btn btn-outline-primary btn-sm">
            <i data-feather="arrow-left"></i> Назад
        </a>

        <!-- Excel export button -->
        <a href="{{ route('contracts.export') }}" class="btn btn-success ms-1 btn-sm">
            <i data-feather='download'></i>
            Экспортировать в Excel
        </a>

        <form method="GET" action="{{ route('contracts.list') }}" class="d-flex align-items-center ms-1">
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

        <!-- Move the plus button to the right -->
        <a href="{{ route('contracts.add') }}" class="btn btn-icon btn-primary ms-auto btn-sm"
           style="border-radius: 50%">
            <i data-feather="plus" class="text-white"></i>
        </a>
    </div>


    <div class="table-responsive rounded">
        <table class="table table-responsive table-bordered table-sm" style="text-align: center">
            <thead>
            <tr class="align-middle align-content-center">
                <th scope="col">#</th>
                <th scope="col">Тип договора</th>
                <th scope="col">Номер</th>
                <th scope="col" style="max-width: 90px">Дата договора</th>
                <th scope="col">Контрагент</th>
                <th scope="col">Категория</th>
                <th scope="col">Предмет</th>
                <th class="col">Статья</th>
                <th scope="col" style="min-width: 150px">Сумма</th>
                <th scope="col" style="min-width: 150px">Срок договора</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($contracts as $contract)
                @php
                    $remainingDays = now()->diffInDays($contract->term, false);
                    $progress = ($remainingDays > 0) ? (100 - (now()->diffInDays($contract->term) / 30 * 100)) : 100;
                    $progressColor = ($remainingDays > 30) ? 'bg-success' : (($remainingDays <= 30 && $remainingDays > 7) ? 'bg-warning' : 'bg-danger');

                    // Ruscha okonchaniya (so'z oxiri)ni aniqlash
                    if ($remainingDays == 1) {
                        $dayText = '1 день остался';
                    } elseif ($remainingDays >= 2 && $remainingDays <= 4) {
                        $dayText = $remainingDays . ' дня осталось';
                    } elseif ($remainingDays >= 5 || $remainingDays <= -1) {
                        $dayText = $remainingDays . ' дней осталось';
                    } else {
                        $dayText = 'Срок истек';
                    }
                @endphp
                <tr>
                    <th>{{ $contract->id }}</th>
                    <td style="max-width: 100px">{{ $contract->type }}</td>
                    <td>{{ $contract->number }}</td>
                    <td>{{ $contract->date }}</td>
                    <td>{{ $contract->contractor }}</td>
                    <td>{{ $contract->category }}</td>
                    <td>{{ $contract->details }}</td>
                    <td>{{ $contract->article }}</td>
                    <td>{{ number_format($contract->amount, 2, '.', ',') }}</td>
                    <td>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar {{ $progressColor }} font-weight-bold" role="progressbar"
                                 style="width: {{ max(0, min($progress, 100)) }}%; color: black;"
                                 aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"
                                 data-bs-toggle="tooltip"
                                 title="{{ $remainingDays > 0 ? 'осталось дней: '. $remainingDays : '' }}">
                                @if ($remainingDays <= 0)
                                    <span style="color: #000537;">Срок истек</span>
                                @else
                                @endif
                            </div>
                        </div>
                        <small class="text-muted">{{ $contract->term }}</small>
                    </td>
                    <td>
                        <div class="invoice_status">
                            <div class="invoice_status" role="status">

                            </div>
                        </div>
                    </td>
                    <td style="max-width: 50px">
                        <a href="{{ route('contracts.show', $contract->id) }}" type="button"
                           class="btn btn-icon rounded-circle btn-flat-primary">
                            <i data-feather="eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{ $contracts->links() }} <!-- Pagination -->
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-input-mask.js')) }}"></script>
    <script>

    </script>
@endsection

