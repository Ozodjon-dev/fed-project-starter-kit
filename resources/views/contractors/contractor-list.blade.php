@extends('layouts/contentLayoutMaster')

@section('title', 'Список контрагентов')

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
        <a href="{{ route('main.index') }}" class="btn btn-outline-primary btn-sm">
            <i data-feather="arrow-left"></i> Назад
        </a>

        <form method="GET" action="{{ route('contractors.list') }}" class="d-flex align-items-center ms-1">
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


        <a href="{{ route('contractors.add') }}" class="btn btn-icon btn-success ms-1 btn-sm">
            <i data-feather="plus"></i>
        </a>
    </div>



    <div class=" ">
        <div class="table-responsive rounded">
            <table class="table table-bordered table-sm" style="text-align: center">
                <thead>
                <tr class="align-middle">
                    <th scope="col">#</th>
                    <th scope="col">Наименование контрагента</th>
                    <th scope="col">Наименование банка</th>
                    <th scope="col">Расчетный счет</th>
                    <th scope="col">ИНН или ПНФЛ</th>
                    <th scope="col">Код банка</th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($contractors as $contractor)
                    <tr>
                        <th>{{ $contractor->id }}</th>
                        <td>{{ $contractor->name }}</td>
                        <td>{{ $contractor->bank_name }}</td>
                        <td>{{ $contractor->bank_account }}</td>
                        <td>{{ $contractor->tin }}</td>
                        <td>{{ $contractor->bank_code }}</td>
                        <td>
                            <div class="btn-group me-2" style="max-width: 16px">
                                <a href="{{ route('contractors.show', $contractor->id) }}">
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-primary">
                                        <i data-feather="eye"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $contractors->links() }} <!-- Pagination -->
        </div>
    </div>
@endsection
