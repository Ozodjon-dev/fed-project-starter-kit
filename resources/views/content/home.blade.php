@extends('layouts/detachedLayoutMaster')

@section('title', 'Blog List')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
@endsection


@section('content')
    <!-- Blog List -->
    <div class="blog-list-wrapper">
        <!-- Blog List Items -->
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <a href="{{ asset('page/blog/detail') }}">
                        <img class="card-img-top img-fluid" src="{{asset('images/slider/02.jpg')}}" alt="Blog Post pic" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ asset('page/blog/detail') }}" class="blog-title-truncate text-body-heading"
                            >The Best Features Coming to iOS and Web design</a
                            >
                        </h4>
                        <div class="d-flex">
                            <div class="avatar me-50">
                                <img src="{{asset('images/portrait/small/avatar-s-7.jpg')}}" alt="Avatar" width="24" height="24" />
                            </div>
                            <div class="author-info">
                                <small class="text-muted me-25">by</small>
                                <small><a href="#" class="text-body">Ghani Pradita</a></small>
                                <span class="text-muted ms-50 me-25">|</span>
                                <small class="text-muted">Jan 10, 2020</small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                            <a href="#">
                                <span class="badge rounded-pill badge-light-info me-50">Quote</span>
                            </a>
                            <a href="#">
                                <span class="badge rounded-pill badge-light-primary">Fashion</span>
                            </a>
                        </div>
                        <p class="card-text blog-content-truncate">
                            Donut fruitcake soufflé apple pie candy canes jujubes croissant chocolate bar ice cream.
                        </p>
                        <hr />
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ asset('page/blog/detail#blogComment') }}">
                                <div class="d-flex align-items-center">
                                    <i data-feather="message-square" class="font-medium-1 text-body me-50"></i>
                                    <span class="text-body fw-bold">76 Comments</span>
                                </div>
                            </a>
                            <a href="{{ asset('page/blog/detail') }}" class="fw-bold">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card">
                    <a href="{{ asset('page/blog/detail') }}">
                        <img class="card-img-top img-fluid" src="{{asset('images/slider/06.jpg')}}" alt="Blog Post pic" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ asset('page/blog/detail') }}" class="blog-title-truncate text-body-heading"
                            >Latest Quirky Opening Sentence or Paragraph</a
                            >
                        </h4>
                        <div class="d-flex">
                            <div class="avatar me-50">
                                <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}" alt="Avatar" width="24" height="24" />
                            </div>
                            <div class="author-info">
                                <small class="text-muted me-25">by</small>
                                <small><a href="#" class="text-body">Jorge Griffin</a></small>
                                <span class="text-muted ms-50 me-25">|</span>
                                <small class="text-muted">Jan 10, 2020</small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                            <a href="#">
                                <span class="badge rounded-pill badge-light-danger me-50">Gaming</span>
                            </a>
                            <a href="#">
                                <span class="badge rounded-pill badge-light-warning">Video</span>
                            </a>
                        </div>
                        <p class="card-text blog-content-truncate">
                            Apple pie caramels lemon drops halvah liquorice carrot cake. Tiramisu brownie lemon drops.
                        </p>
                        <hr />
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{url('page/blog/detail#blogComment')}}">
                                <div class="d-flex align-items-center">
                                    <i data-feather="message-square" class="font-medium-1 text-body me-50"></i>
                                    <span class="text-body fw-bold">2.1k Comments</span>
                                </div>
                            </a>
                            <a href="{{ asset('page/blog/detail') }}" class="fw-bold">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card">
                    <a href="{{ asset('page/blog/detail') }}">
                        <img class="card-img-top img-fluid" src="{{asset('images/slider/04.jpg')}}" alt="Blog Post pic" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ asset('page/blog/detail') }}" class="blog-title-truncate text-body-heading"
                            >Share an Amazing and Shocking Fact or Statistic</a
                            >
                        </h4>
                        <div class="d-flex">
                            <div class="avatar me-50">
                                <img src="{{asset('images/portrait/small/avatar-s-3.jpg')}}" alt="Avatar" width="24" height="24" />
                            </div>
                            <div class="author-info">
                                <small class="text-muted me-25">by</small>
                                <small><a href="#" class="text-body">Claudia Neal</a></small>
                                <span class="text-muted ms-50 me-25">|</span>
                                <small class="text-muted">Jan 10, 2020</small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                            <a href="#">
                                <span class="badge rounded-pill badge-light-danger me-50">Gaming</span>
                            </a>
                            <a href="#">
                                <span class="badge rounded-pill badge-light-success">Food</span>
                            </a>
                        </div>
                        <p class="card-text blog-content-truncate">
                            Tiramisu jelly-o chupa chups tootsie roll donut wafer marshmallow cheesecake topping.
                        </p>
                        <hr />
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{url('page/blog/detail#blogComment')}}">
                                <div class="d-flex align-items-center">
                                    <i data-feather="message-square" class="font-medium-1 text-body me-50"></i>
                                    <span class="text-body fw-bold">243 Comments</span>
                                </div>
                            </a>
                            <a href="{{ asset('page/blog/detail') }}" class="fw-bold">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card">
                    <a href="{{ asset('page/blog/detail') }}">
                        <img class="card-img-top img-fluid" src="{{asset('images/slider/03.jpg')}}" alt="Blog Post pic" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ asset('page/blog/detail') }}" class="blog-title-truncate text-body-heading"
                            >Withhold a Compelling Piece of Information</a
                            >
                        </h4>
                        <div class="d-flex">
                            <div class="avatar me-50">
                                <img
                                    src="{{asset('images/portrait/small/avatar-s-14.jpg')}}"
                                    alt="Avatar"
                                    width="24"
                                    height="24"
                                />
                            </div>
                            <div class="author-info">
                                <small class="text-muted me-25">by</small>
                                <small><a href="#" class="text-body">Fred Boone</a></small>
                                <span class="text-muted ms-50 me-25">|</span>
                                <small class="text-muted">Jan 10, 2020</small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                            <a href="#">
                                <span class="badge rounded-pill badge-light-warning">Video</span>
                            </a>
                        </div>
                        <p class="card-text blog-content-truncate">
                            Croissant apple pie lollipop gingerbread. Cookie jujubes chocolate cake icing cheesecake.
                        </p>
                        <hr />
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{url('page/blog/detail#blogComment')}}">
                                <div class="d-flex align-items-center">
                                    <i data-feather="message-square" class="font-medium-1 text-body me-50"></i>
                                    <span class="text-body fw-bold">10 Comments</span>
                                </div>
                            </a>
                            <a href="{{ asset('page/blog/detail') }}" class="fw-bold">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card">
                    <a href="{{ asset('page/blog/detail') }}">
                        <img class="card-img-top img-fluid" src="{{asset('images/slider/09.jpg')}}" alt="Blog Post pic" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ asset('page/blog/detail') }}" class="blog-title-truncate text-body-heading"
                            >Unadvertised Bonus Opening: Share a Quote</a
                            >
                        </h4>
                        <div class="d-flex">
                            <div class="avatar me-50">
                                <img
                                    src="{{asset('images/portrait/small/avatar-s-13.jpg')}}"
                                    alt="Avatar"
                                    width="24"
                                    height="24"
                                />
                            </div>
                            <div class="author-info">
                                <small class="text-muted me-25">by</small>
                                <small><a href="#" class="text-body">Billy French</a></small>
                                <span class="text-muted ms-50 me-25">|</span>
                                <small class="text-muted">Jan 10, 2020</small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                            <a href="#">
                                <span class="badge rounded-pill badge-light-info me-50">Quote</span>
                            </a>
                            <a href="#">
                                <span class="badge rounded-pill badge-light-primary">Fashion</span>
                            </a>
                        </div>
                        <p class="card-text blog-content-truncate">
                            Muffin liquorice candy soufflé bear claw apple pie icing halvah. Pie marshmallow jelly.
                        </p>
                        <hr />
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{url('page/blog/detail#blogComment')}}">
                                <div class="d-flex align-items-center">
                                    <i data-feather="message-square" class="font-medium-1 text-body me-50"></i>
                                    <span class="text-body fw-bold">319 Comments</span>
                                </div>
                            </a>
                            <a href="{{ asset('page/blog/detail') }}" class="fw-bold">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card">
                    <a href="{{ asset('page/blog/detail') }}">
                        <img class="card-img-top img-fluid" src="{{asset('images/slider/10.jpg')}}" alt="Blog Post pic" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ asset('page/blog/detail') }}" class="blog-title-truncate text-body-heading"
                            >Ships at a distance have Every Man’s Wish on Board</a
                            >
                        </h4>
                        <div class="d-flex">
                            <div class="avatar me-50">
                                <img src="{{asset('images/portrait/small/avatar-s-6.jpg')}}" alt="Avatar" width="24" height="24" />
                            </div>
                            <div class="author-info">
                                <small class="text-muted me-25">by</small>
                                <small><a href="#" class="text-body">Helena Hunt</a></small>
                                <span class="text-muted ms-50 me-25">|</span>
                                <small class="text-muted">Jan 10, 2020</small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                            <a href="#">
                                <span class="badge rounded-pill badge-light-primary me-50">Fashion</span>
                            </a>
                            <a href="#">
                                <span class="badge rounded-pill badge-light-warning">Video</span>
                            </a>
                        </div>
                        <p class="card-text blog-content-truncate">
                            A little personality goes a long way, especially on a business blog. So don’t be afraid to let loose.
                        </p>
                        <hr />
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{url('page/blog/detail#blogComment')}}">
                                <div class="d-flex align-items-center">
                                    <i data-feather="message-square" class="font-medium-1 text-body me-50"></i>
                                    <span class="text-body fw-bold">1.5k Comments</span>
                                </div>
                            </a>
                            <a href="{{ asset('page/blog/detail') }}" class="fw-bold">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Blog List Items -->

        <!-- Pagination -->
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-2">
                        <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item next-item"><a class="page-link" href="#"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--/ Pagination -->
    </div>
    <!--/ Blog List -->
@endsection
