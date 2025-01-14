@extends('layouts/contentLayoutMaster')

@section('title', 'Список категорий')

@section('content')

    {{-- Modalni tekshirish va ko'rsatish --}}
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
            <div class="input-group ms-0">
                <form method="GET" action="{{ route('contract_categories.list') }}" class="w-100 d-flex">
                    <input type="text" class="form-control shadow-sm ms-1" placeholder="Поиск" name="search"
                           value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary shadow ms-1">Поиск</button>
                </form>
            </div>
            <div>
                <form class="d-flex">
                    <button onclick="location.href='{{ route('contract_categories.add') }}'"
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
    <div class="table-responsive rounded" style="font-size: small">
        <table class="table table-bordered table-sm" style="text-align: center">
            <thead>
            <tr class="align-middle align-content-center">
                <th scope="col">#</th>
                <th scope="col">Название категории</th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name}}</td>
                    <td style="max-width: 45px">
                        <div class="btn-group me-2" style="max-width: 45px">
                            <div class="d-inline-block ms-1" style="align-items: center">
                                <a href="{{ route('contract_categories.show', $category->id) }}">
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
    <div>
                {{ $categories->links() }}
    </div>

    <!-- Modal Themes start -->

@endsection
