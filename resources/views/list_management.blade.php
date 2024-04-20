@extends('layouts.body')

@section('container')
    <div class="listUser">
        <div class="header ms-4 mt-4 w-25" style="font-family: arial">
            <h2> pages {{ $pages }}</h2>
            <p>ini adalah halaman list Management</p>
            <hr class="mx-auto">
        </div>
        @if ($management->count())
            <div id="carouselExampleDark" class="carousel carousel-dark slide mt-5" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($management as $index => $set)
                        @if ($index % 3 == 0)
                            <button type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide-to="{{ intdiv($index, 3) }}" class="active" aria-current="true"
                                aria-label="Slide {{ intdiv($index, 3) + 1 }}">
                            </button>
                        @endif
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($management as $index => $set)
                        @if ($index % 3 == 0)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}  " data-bs-interval="10000">

                                <div class="row w-100 d-flex justify-content-center ms-1">
                                    @for ($i = $index; $i < $index + 3; $i++)
                                        @if (isset($management[$i]))
                                            <div class="col-3" style="height: 400px">
                                                <div class="card "
                                                    style="width: 18rem;background-color:#7FC7D9;box-shadow:inset 5px 5px 5px black,inset -5px -5px 5px black;height:400px;border: 4px solid black;">
                                                    <div style="background-color:A0153E ">
                                                        <div
                                                            style="background-color: #365486;clip-path: polygon(50% 0%, 100% 0, 100% 5%, 100% 61%, 85% 89%, 49% 100%, 13% 89%, 0 61%, 0 38%, 0 0);box-shadow: inset -1px -3px 5px white,inset 1px 1px 5px white;border: 2px solid black;border-bottom: 0px solid white;">
                                                            <div class="d-flex justify-content-center">
                                                                <svg class="card-img-top rounded-circle  mt-2 mb-2"
                                                                    xmlns="http://www.w3.org/2000/svg" width="100px"
                                                                    fill="white" class="bi bi-person-workspace"
                                                                    viewBox="0 0 16 16" style="width: 100px">
                                                                    <path
                                                                        d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                                                    <path
                                                                        d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                                                                </svg>
                                                            </div>
                                                            <div class="d-flex justify-content-center mb-2">
                                                                <h5 class="card-title mx-auto mb-3"
                                                                    style="font-family: Verdana, Geneva, Tahoma, sans-serif;color:whitesmoke">
                                                                    {{ $management[$i]['position'] }}
                                                                </h5>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="card-body d-flex flex-column justify-content-between">
                                                        <div style="height: 120px;scrollbar-width: none;"
                                                            class="overflow-auto">
                                                            <p class="card-text ">
                                                                {{ $management[$i]['role_position'] }}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-end mb-4">
                                                            <a href="/Management/{{ $management[$i]['position'] }}"
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
