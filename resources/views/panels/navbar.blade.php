@if ($configData['mainLayoutType'] === 'horizontal' && isset($configData['mainLayoutType']))
    <nav
        class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}"
        data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">

            <ul class="nav navbar-nav">

                <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h2 class="brand-text mb-0">FED</h2>
                    </a>
                </li>
            </ul>
        </div>
        @else
            <nav
                class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }} {{ $configData['layoutWidth'] === 'boxed' && $configData['verticalMenuNavbarType'] === 'navbar-floating' ? 'container-xxl' : '' }}">
                @endif
                <div class="navbar-container d-flex content">
                    <div class="bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav d-xl-none">
                            <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i
                                        class="ficon"
                                        data-feather="menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block">
                                <a class="nav-link nav-link-style">
                                    <i class="ficon"
                                       data-feather="{{ $configData['theme'] === 'dark' ? 'sun' : 'moon' }}"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Calculator button -->

                    <ul class="nav navbar-nav align-items-center ms-auto">
                        <li class="nav-item dropdown dropdown-language">
                            <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown"
                               aria-haspopup="true">
                                <i class="flag-icon flag-icon-us"></i>
                                <span class="selected-language">Русский</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
                                <a class="dropdown-item" href="{{ url('lang/en') }}" data-language="en">
                                    <i class="flag-icon flag-icon-ru"></i> Русский
                                </a>
                                <a class="dropdown-item" href="{{ url('lang/fr') }}" data-language="fr">
                                    <i class="flag-icon flag-icon-uz"></i> O‘zbek
                                </a>
                                <a class="dropdown-item" href="{{ url('lang/de') }}" data-language="de">
                                    <i class="flag-icon flag-icon-de"></i> German
                                </a>
                                <a class="dropdown-item" href="{{ url('lang/pt') }}" data-language="pt">
                                    <i class="flag-icon flag-icon-pt"></i> Portuguese
                                </a>
                            </div>
                        </li>
                        <div class="content-header-right col-md-3 col-12 d-flex justify-content-end align-items-center">
                            <svg id="openCalculator" type="button" width="32px" height="32px" viewBox="0 0 20 20"
                                 version="1.1"
                                 style="display: flex; align-items: center; justify-content: center; cursor: pointer;">
                                <g id="🔍-System-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="ic_fluent_calculator_20_regular" fill="#7367f0" fill-rule="nonzero">
                                        <path
                                            d="M13.5,2 C14.8807,2 16,3.11929 16,4.5 L16,15.5 C16,16.8807 14.8807,18 13.5,18 L6.5,18 C5.11929,18 4,16.8807 4,15.5 L4,4.5 C4,3.11929 5.11929,2 6.5,2 L13.5,2 Z M13.5,3 L6.5,3 C5.67157,3 5,3.67157 5,4.5 L5,15.5 C5,16.3284 5.67157,17 6.5,17 L13.5,17 C14.3284,17 15,16.3284 15,15.5 L15,4.5 C15,3.67157 14.3284,3 13.5,3 Z M7,13 C7.55228,13 8,13.4477 8,14 C8,14.5523 7.55228,15 7,15 C6.44772,15 6,14.5523 6,14 C6,13.4477 6.44772,13 7,13 Z M13,13 C13.5523,13 14,13.4477 14,14 C14,14.5523 13.5523,15 13,15 C12.4477,15 12,14.5523 12,14 C12,13.4477 12.4477,13 13,13 Z M10,13 C10.5523,13 11,13.4477 11,14 C11,14.5523 10.5523,15 10,15 C9.44772,15 9,14.5523 9,14 C9,13.4477 9.44772,13 10,13 Z M7,10 C7.55228,10 8,10.4477 8,11 C8,11.5523 7.55228,12 7,12 C6.44772,12 6,11.5523 6,11 C6,10.4477 6.44772,10 7,10 Z M13,10 C13.5523,10 14,10.4477 14,11 C14,11.5523 13.5523,12 13,12 C12.4477,12 12,11.5523 12,11 C12,10.4477 12.4477,10 13,10 Z M10,10 C10.5523,10 11,10.4477 11,11 C11,11.5523 10.5523,12 10,12 C9.44772,12 9,11.5523 9,11 C9,10.4477 9.44772,10 10,10 Z M12.5,4 C13.2796706,4 13.9204457,4.59488554 13.9931332,5.35553954 L14,5.5 L14,6.5 C14,7.27969882 13.4050879,7.920449 12.6444558,7.99313345 L12.5,8 L7.5,8 C6.72030118,8 6.079551,7.40511446 6.00686655,6.64446046 L6,6.5 L6,5.5 C6,4.72030118 6.59488554,4.079551 7.35553954,4.00686655 L7.5,4 L12.5,4 Z M12.5,5 L7.5,5 C7.25454222,5 7.0503921,5.17687704 7.00805575,5.41012499 L7,5.5 L7,6.5 C7,6.74545778 7.17687704,6.9496079 7.41012499,6.99194425 L7.5,7 L12.5,7 C12.7454222,7 12.9496,6.82312296 12.9919429,6.58987501 L13,6.5 L13,5.5 C13,5.25454222 12.8230914,5.0503921 12.5898645,5.00805575 L12.5,5 Z"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        {{--                        <li class="nav-item dropdown dropdown-user">--}}
                        {{--                            <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user"--}}
                        {{--                               href="javascript:void(0);"--}}
                        {{--                               data-bs-toggle="dropdown" aria-haspopup="true">--}}
                        {{--                                <div class="user-nav d-sm-flex d-none">--}}
                        {{--          <span class="user-name fw-bolder">--}}
                        {{--            @if (Auth::check())--}}
                        {{--                  {{ Auth::user()->name }}--}}
                        {{--              @else--}}
                        {{--                  John Doe--}}
                        {{--              @endif--}}
                        {{--          </span>--}}
                        {{--                                    <span class="user-status">--}}
                        {{--            Admin--}}
                        {{--          </span>--}}
                        {{--                                </div>--}}
                        {{--                                <span class="avatar">--}}
                        {{--          <img class="round"--}}
                        {{--               src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('images/portrait/small/avatar-s-11.jpg') }}"--}}
                        {{--               alt="avatar" height="40" width="40">--}}
                        {{--          <span class="avatar-status-online"></span>--}}
                        {{--        </span>--}}
                        {{--                            </a>--}}
                        {{--                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">--}}
                        {{--                                <h6 class="dropdown-header">Manage Profile</h6>--}}
                        {{--                                <div class="dropdown-divider"></div>--}}
                        {{--                                <a class="dropdown-item"--}}
                        {{--                                   href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0)' }}">--}}
                        {{--                                    <i class="me-50" data-feather="user"></i> Profile--}}
                        {{--                                </a>--}}
                        {{--                                @if (Auth::check() && Laravel\Jetstream\Jetstream::hasApiFeatures())--}}
                        {{--                                    <a class="dropdown-item" href="{{ route('api-tokens.index') }}">--}}
                        {{--                                        <i class="me-50" data-feather="key"></i> API Tokens--}}
                        {{--                                    </a>--}}
                        {{--                                @endif--}}
                        {{--                                <a class="dropdown-item" href="#">--}}
                        {{--                                    <i class="me-50" data-feather="settings"></i> Settings--}}
                        {{--                                </a>--}}

                        {{--                                @if (Auth::User() && Laravel\Jetstream\Jetstream::hasTeamFeatures())--}}
                        {{--                                    <div class="dropdown-divider"></div>--}}
                        {{--                                    <h6 class="dropdown-header">Manage Team</h6>--}}
                        {{--                                    <div class="dropdown-divider"></div>--}}
                        {{--                                    <a class="dropdown-item"--}}
                        {{--                                       href="{{ Auth::user() ? route('teams.show', Auth::user()->currentTeam->id) : 'javascript:void(0)' }}">--}}
                        {{--                                        <i class="me-50" data-feather="settings"></i> Team Settings--}}
                        {{--                                    </a>--}}
                        {{--                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())--}}
                        {{--                                        <a class="dropdown-item" href="{{ route('teams.create') }}">--}}
                        {{--                                            <i class="me-50" data-feather="users"></i> Create New Team--}}
                        {{--                                        </a>--}}
                        {{--                                    @endcan--}}

                        {{--                                    <div class="dropdown-divider"></div>--}}
                        {{--                                    <h6 class="dropdown-header">--}}
                        {{--                                        Switch Teams--}}
                        {{--                                    </h6>--}}
                        {{--                                    <div class="dropdown-divider"></div>--}}
                        {{--                                    @if (Auth::user())--}}
                        {{--                                        @foreach (Auth::user()->allTeams() as $team)--}}
                        {{--                                            --}}{{-- Below commented code read by artisan command while installing jetstream. !! Do not remove if you want to use jetstream. --}}

                        {{--                                            --}}{{-- <x-jet-switchable-team :team="$team" /> --}}
                        {{--                                        @endforeach--}}
                        {{--                                    @endif--}}
                        {{--                                    <div class="dropdown-divider"></div>--}}
                        {{--                                @endif--}}
                        {{--                                @if (Auth::check())--}}
                        {{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
                        {{--                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
                        {{--                                        <i class="me-50" data-feather="power"></i> Logout--}}
                        {{--                                    </a>--}}
                        {{--                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">--}}
                        {{--                                        @csrf--}}
                        {{--                                    </form>--}}
                        {{--                                @else--}}
                        {{--                                    <a class="dropdown-item"--}}
                        {{--                                       href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}">--}}
                        {{--                                        <i class="me-50" data-feather="log-in"></i> Login--}}
                        {{--                                    </a>--}}
                        {{--                                @endif--}}
                        {{--                            </div>--}}
                        {{--                        </li>--}}
                    </ul>
                </div>
                {{--                <strong>Database Connected: </strong>--}}
                {{--                    <?php--}}
                {{--                    try {--}}
                {{--                        \DB::connection()->getPDO();--}}
                {{--                        echo \DB::connection()->getDatabaseName();--}}
                {{--                    } catch (\Exception $e) {--}}
                {{--                        echo 'None';--}}
                {{--                    }--}}
                {{--                    ?>--}}
            </nav>

            {{-- Search Start Here --}}
            <ul class="main-search-list-defaultlist d-none">
                <li class="d-flex align-items-center">
                    <a href="javascript:void(0);">
                        <h6 class="section-label mt-75 mb-0">Files</h6>
                    </a>
                </li>
                <li class="auto-suggestion">
                    <a class="d-flex align-items-center justify-content-between w-100"
                       href="{{ url('app/file-manager') }}">
                        <div class="d-flex">
                            <div class="me-75">
                                <img src="{{ asset('images/icons/xls.png') }}" alt="png" height="32">
                            </div>
                            <div class="search-data">
                                <p class="search-data-title mb-0">Two new item submitted</p>
                                <small class="text-muted">Marketing Manager</small>
                            </div>
                        </div>
                        <small class="search-data-size me-50 text-muted">&apos;17kb</small>
                    </a>
                </li>
                <li class="auto-suggestion">
                    <a class="d-flex align-items-center justify-content-between w-100"
                       href="{{ url('app/file-manager') }}">
                        <div class="d-flex">
                            <div class="me-75">
                                <img src="{{ asset('images/icons/jpg.png') }}" alt="png" height="32">
                            </div>
                            <div class="search-data">
                                <p class="search-data-title mb-0">52 JPG file Generated</p>
                                <small class="text-muted">FontEnd Developer</small>
                            </div>
                        </div>
                        <small class="search-data-size me-50 text-muted">&apos;11kb</small>
                    </a>
                </li>
                <li class="auto-suggestion">
                    <a class="d-flex align-items-center justify-content-between w-100"
                       href="{{ url('app/file-manager') }}">
                        <div class="d-flex">
                            <div class="me-75">
                                <img src="{{ asset('images/icons/pdf.png') }}" alt="png" height="32">
                            </div>
                            <div class="search-data">
                                <p class="search-data-title mb-0">25 PDF File Uploaded</p>
                                <small class="text-muted">Digital Marketing Manager</small>
                            </div>
                        </div>
                        <small class="search-data-size me-50 text-muted">&apos;150kb</small>
                    </a>
                </li>
                <li class="auto-suggestion">
                    <a class="d-flex align-items-center justify-content-between w-100"
                       href="{{ url('app/file-manager') }}">
                        <div class="d-flex">
                            <div class="me-75">
                                <img src="{{ asset('images/icons/doc.png') }}" alt="png" height="32">
                            </div>
                            <div class="search-data">
                                <p class="search-data-title mb-0">Anna_Strong.doc</p>
                                <small class="text-muted">Web Designer</small>
                            </div>
                        </div>
                        <small class="search-data-size me-50 text-muted">&apos;256kb</small>
                    </a>
                </li>
                <li class="d-flex align-items-center">
                    <a href="javascript:void(0);">
                        <h6 class="section-label mt-75 mb-0">Members</h6>
                    </a>
                </li>
                <li class="auto-suggestion">
                    <a class="d-flex align-items-center justify-content-between py-50 w-100"
                       href="{{ url('app/user/view') }}">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-75">
                                <img src="{{ asset('images/portrait/small/avatar-s-8.jpg') }}" alt="png" height="32">
                            </div>
                            <div class="search-data">
                                <p class="search-data-title mb-0">John Doe</p>
                                <small class="text-muted">UI designer</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="auto-suggestion">
                    <a class="d-flex align-items-center justify-content-between py-50 w-100"
                       href="{{ url('app/user/view') }}">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-75">
                                <img src="{{ asset('images/portrait/small/avatar-s-1.jpg') }}" alt="png" height="32">
                            </div>
                            <div class="search-data">
                                <p class="search-data-title mb-0">Michal Clark</p>
                                <small class="text-muted">FontEnd Developer</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="auto-suggestion">
                    <a class="d-flex align-items-center justify-content-between py-50 w-100"
                       href="{{ url('app/user/view') }}">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-75">
                                <img src="{{ asset('images/portrait/small/avatar-s-14.jpg') }}" alt="png" height="32">
                            </div>
                            <div class="search-data">
                                <p class="search-data-title mb-0">Milena Gibson</p>
                                <small class="text-muted">Digital Marketing Manager</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="auto-suggestion">
                    <a class="d-flex align-items-center justify-content-between py-50 w-100"
                       href="{{ url('app/user/view') }}">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-75">
                                <img src="{{ asset('images/portrait/small/avatar-s-6.jpg') }}" alt="png" height="32">
                            </div>
                            <div class="search-data">
                                <p class="search-data-title mb-0">Anna Strong</p>
                                <small class="text-muted">Web Designer</small>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>

            {{-- if main search not found! --}}
            <ul class="main-search-list-defaultlist-other-list d-none">
                <li class="auto-suggestion justify-content-between">
                    <a class="d-flex align-items-center justify-content-between w-100 py-50">
                        <div class="d-flex justify-content-start">
                            <span class="me-75" data-feather="alert-circle"></span>
                            <span>No results found.</span>
                        </div>
                    </a>
                </li>
            </ul>
            {{-- Search Ends --}}
            <!-- END: Header-->
            <!-- Calculator JS -->
            <script>
                document.getElementById("openCalculator").addEventListener("click", function () {
                    // Windows kalkulyatorini ochish
                    if (navigator.userAgent.indexOf("Win") !== -1) {
                        window.open("calculator://");
                    }
                    // Mac kalkulyatorini ochish
                    else if (navigator.userAgent.indexOf("Mac") !== -1) {
                        window.location.href = "calculator://";
                    }
                    // Agar ishlamasa, qo'shimcha xabar
                    else {
                        alert("Открытие калькулятора не поддерживается!");
                    }
                });
            </script>
