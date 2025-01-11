@extends('layouts/contentLayoutMaster')

@section('title', 'Список контрагентов')

@section('content')
    <nav class="navbar navbar-expand">
        <div class="navbar-collapse">
            <button onclick="location.href='{{ route('main.index') }}'"
                    class="btn btn-sm btn-primary shadow" type="button"
                    style="height: 37px; align-items: center">
                <b>
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

            <div class="d-flex w-100 justify-content-between">
                <!-- Qidiruv Formasi -->
                <div class="input-group w-100 w-lg-auto me-2">
                    <form method="GET" action="{{ route('contractors.list') }}" class="w-100 d-flex">
                        <input type="text" class="form-control shadow-sm ms-1" placeholder="Поиск" name="search"
                               value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary shadow ms-1">Поиск</button>
                    </form>
                </div>

                <!-- Yangi Kontur qo'shish tugmasi -->
                <div class="ms-auto">
                    <form class="d-flex">
                        <button onclick="location.href='{{ route('contractors.add') }}'"
                                class="btn btn-sm btn-primary shadow" type="button">
                            <b>
                                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="24" fill="currentColor"
                                     class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path style="fill:#FFFFFF;"
                                          d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </b>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>



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
            {{ $contractors->links() }} <!-- Sahifalash -->
        </div>
    </div>
@endsection
