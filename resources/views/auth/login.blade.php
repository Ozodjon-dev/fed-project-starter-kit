@php
    $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
    <style>
        .test-mode-banner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(45deg, #ff4d4d, #ff8c00);
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            font-size: 16px;
            z-index: 1050;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: slideDown 0.5s ease-in-out;
        }

        @keyframes slideDown {
            from {
                top: -50px;
                opacity: 0;
            }
            to {
                top: 0;
                opacity: 1;
            }
        }

        .test-mode-banner button {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 10px;
        }

        .test-mode-banner button:hover {
            color: black;
        }
    </style>
@endsection

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <!-- Brand logo-->
            <a class="brand-logo" href="#">
{{--                <img src="{{ asset('images/logo/favicon.ico') }}" alt="">--}}
                <h2 class="brand-text text-primary ms-1">FED</h2>
            </a>
            <!-- /Brand logo-->

            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                    @if($configData['theme'] === 'dark')
                        <img class="img-fluid" src="{{asset('images/pages/login-v2-dark.svg')}}" alt="Login V2" />
                    @else
                        <img class="img-fluid" src="{{asset('images/pages/login-v2.svg')}}" alt="Login V2" />
                    @endif
                </div>
            </div>
            <!-- /Left Text-->

            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title fw-bold mb-1">Добро пожаловать в FED Project! 👋</h2>
                    <p class="card-text mb-2">Пожалуйста, войдите в свою учетную запись</p>

                    <!-- Foydalanuvchi autentifikatsiyasi -->
                    <form class="auth-login-form mt-2" action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label" for="login">Логин</label>
                            <input class="form-control" id="login" type="text" name="login" placeholder="Логин пользователя" required autofocus tabindex="1" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="password">Парол</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="************" required tabindex="2" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <button class="btn btn-primary w-100" tabindex="4">Вход</button>
                    </form>
                </div>
            </div>
            <!-- /Login-->
        </div>
    </div>
    <div class="test-mode-banner" id="testBanner">
        ⚠ <strong>Внимание!</strong> Данный проект работает в режиме тестирования. ⚠
        <button onclick="document.getElementById('testBanner').style.display='none'">✖</button>
    </div>
@endsection

@section('vendor-script')
    <script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
    <script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endsection
