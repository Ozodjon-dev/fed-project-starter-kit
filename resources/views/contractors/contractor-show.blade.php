@extends('layouts/contentLayoutMaster')
@section('title', 'Контрагент')
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
        <a href="{{ route('contractors.list') }}" class="btn btn-outline-primary btn-sm">
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

        <a href="{{ route('contractors.add') }}" class="btn btn-icon btn-success ms-1 btn-sm">
            <i data-feather="plus"></i>
        </a>
    </div>


    <div class="table-responsive rounded" style="font-size: small">
        <table class="table table table-bordered table-sm" style="text-align: center">
            <thead>
            <tr class="align-middle align-content-center">
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
            <tr>
                <th>{{ $contractor->id }}</th>
                <td>{{ $contractor->name}}</td>
                <td>{{ $contractor->bank_name}}</td>
                <td>{{ $contractor->bank_account }}</td>
                <td>{{ $contractor->tin }}</td>
                <td>{{ $contractor->bank_code }}</td>
                <td>
                    <div class="btn-group me-2" style="max-width: 65px">
                        <form action="{{ route('contractors.edit', $contractor->id) }}">
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
                                            <h5 class="modal-title" id="myModalLabel120"><strong>Внимание!</strong></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>Вы действительно хотите удалить этот контрагент?</strong>
                                        </div>
                                        <div class="d-flex">
                                            <form class="ms-1 mb-2"
                                                  action="{{ route('contractors.delete', $contractor->id) }}"
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
@endsection
