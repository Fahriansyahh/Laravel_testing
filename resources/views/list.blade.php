@extends('layouts.body')

@section('container')
    <div class="listUser">
        <div class="header ms-4 mt-4 w-25" style="font-family: arial">
            <h2> pages {{ $pages }}</h2>
            <p>ini adalah halaman list User</p>
            <hr class="mx-auto">
        </div>
        @if ($blog->count())
            <div id="carouselExampleDark" class="carousel carousel-dark slide mt-5" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($blog as $index => $set)
                        @if ($index % 3 == 0)
                            <button type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide-to="{{ intdiv($index, 3) }}" class="active" aria-current="true"
                                aria-label="Slide {{ intdiv($index, 3) + 1 }}">
                            </button>
                        @endif
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($blog as $index => $set)
                        @if ($index % 3 == 0)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}  " data-bs-interval="10000">

                                <div class="row w-100 d-flex justify-content-center ms-1">
                                    @for ($i = $index; $i < $index + 3; $i++)
                                        @if (isset($blog[$i]))
                                            <div class="col-3" style="height: 400px">
                                                <div class="card "
                                                    style="width: 18rem;background-color:#7FC7D9;box-shadow:inset 5px 5px 5px black,inset -5px -5px 5px black;height:400px";>
                                                    <div style="background-color:A0153E ">
                                                        <div class="d-flex justify-content-center "
                                                            style="background-color: #365486;clip-path: polygon(50% 0%, 100% 0, 100% 5%, 100% 61%, 85% 89%, 49% 100%, 13% 89%, 0 61%, 0 38%, 0 0);box-shadow: inset -1px -3px 5px white,inset 1px 1px 5px white;border: 3px solid black;border-bottom: 0px solid white;">
                                                            <img class="card-img-top rounded-circle  mt-5 mb-2"
                                                                src="{{ asset('images/fahri_foto.jpeg') }}"
                                                                alt="Card image cap" style="width: 100px">
                                                        </div>
                                                    </div>
                                                    <div class="card-body d-flex flex-column justify-content-between">
                                                        <div>
                                                            <h5 class="card-title">{{ $blog[$i]['nama'] }}</h5>
                                                            <p class="card-text overflow-auto"
                                                                style="height: 120px;scrollbar-width: none;">
                                                                {{ $blog[$i]['description'] }}</p>
                                                        </div>
                                                        <div
                                                            class="d-flex justify-content-end mb-4 position-absolute position-absolute bottom-0 start-10">
                                                            <a href="/List/{{ $blog[$i]['slug'] }}"
                                                                class="btn btn-primary rounded-pill">Telusuri</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <p>pages tidak ada</p>
        @endif

    </div>
@endsection
