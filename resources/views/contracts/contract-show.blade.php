@extends('layouts/contentLayoutMaster')
@section('title', 'Категория')
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
    <nav class="navbar navbar-expand-lg">

        <div class="collapse navbar-collapse" id="navbarScroll">
            <div class="">
                <form class="d-flex">
                    <button onclick="location.href='{{ route('contracts.list') }}'"
                            class="btn btn-sm btn-primary shadow" type="button"
                            style="height: 37px; align-items: center"><b>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 14l-4 -4l4 -4"/>
                                <path d="M5 10h11a4 4 0 1 1 0 8h-1"/>
                            </svg>
                        </b>
                    </button>
                </form>
            </div>
            <div class="input-group ms-lg-75">
                <input type="text" class="form-control shadow-sm" placeholder="Поиск" disabled>
                <button type="submit" class="btn btn-primary shadow me-1" disabled>Поиск</button>
            </div>
            <div>
                <form class="d-flex">
                    <button onclick="location.href='{{ route('contracts.add') }}'"
                            class="btn btn-sm btn-primary shadow" type="button"><b>
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="24" fill="currentColor"
                                 class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                        </b>
                    </button>
                </form>
            </div>
        </div>
    </nav>


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
                <td>{{ $contract->registration_date }}</td>
                <td>{{ $contract->type }}</td>
                <td>{{ $contract->number }}</td>
                <td>{{ $contract->date }}</td>
                <td>{{ $contract->contractor }}</td>
                <td>{{ $contract->category }}</td>
                <td>{{ $contract->details }}</td>
                <td>{{ $contract->article }}</td>
                <td>{{ $contract->amount }}</td>
                <td>{{ $contract->term }}</td>
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
@endsection