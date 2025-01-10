@extends('layouts/contentLayoutMaster')
@section('title', 'Контрагент')
@section('content')
    <nav class="navbar navbar-expand-lg">

        <div class="collapse navbar-collapse" id="navbarScroll">
            <div class=" ms-lg-75">
                <form class="d-flex">
                    <button onclick="location.href='{{ route('contractors.list') }}'"
                            class="btn btn-sm btn-secondary shadow" type="button"
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
                <input type="text" class="form-control shadow-sm" placeholder="Поиск">
                <button type="submit" class="btn btn-secondary shadow me-3">Поиск</button>
            </div>
            <div>
                <form class="d-flex me-lg-75">
                    <button onclick="location.href='{{ route('contractors.add') }}'"
                            class="btn btn-sm btn-secondary shadow" type="button"><b>
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
                            <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                <i data-feather="edit"></i>
                            </button>
                        </form>
                        <div class="d-inline-block ms-1">
                            <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-success" data-bs-toggle="modal"
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
                                            <h5 class="modal-title" id="myModalLabel120">Внимание!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Вы действительно хотите удалить этот контрагент?
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
