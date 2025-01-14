@extends('layouts/contentLayoutMaster')
@section('title', 'Список договоров')
@section('content')
    <nav class="navbar navbar-expand">
        <div class="navbar-collapse" id="navbarScroll">
            <div class="">
                <form class="d-flex">
                    <button onclick="location.href='{{ route('main.index') }}'"
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
                <form method="GET" action="{{ route('contracts.list') }}" class="w-100 d-flex">
                    <input type="text" class="form-control shadow-sm ms-1" placeholder="Поиск" name="search"
                           value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary shadow ms-1">Поиск</button>
                </form>
            </div>
            <div>
                <form class="d-flex">
                    <button onclick="location.href='{{ route('contracts.add') }}'"
                            class="btn btn-sm btn-primary ms-1 shadow" type="button"><b>
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
    </nav>

    <div class="table-responsive rounded">
        <table class="table table-responsive table-bordered table-sm" style="text-align: center">
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
            @foreach($contracts as $contract)
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
                        <div class="btn-group me-2" style="max-width: 45px">
                            <div class="d-inline-block ms-1" style="align-items: center">
                                <a href=""> {{--show route with id--}}
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-primary">
                                        <i data-feather="eye"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js'))}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js'))}}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/forms/form-input-mask.js')) }}"></script>
@endsection
