@extends('layouts.body')

@section('container')
    <div class="listUser">
        <div class="header ms-4 mt-4 w-25" style="font-family: arial">
            <h2> pages {{ $pages }}</h2>
            <p>ini adalah halaman list User</p>
            <hr class="mx-auto">
        </div>

        <div class="input-group mb-3  d-flex justify-content-center">
            <form action="/List" method="GET" class=" w-25 d-flex flex-wrap">
                <!-- Perhatikan method="GET" untuk mengirimkan data sebagai query string -->
                <input type="text" class="form-control rounded-pill w-75" placeholder="Search" arial-label="Search"
                    aria-describedby="button-addon2" name="search" value={{ request('slug') }}>
                <button class="btn btn-outline-secondary ms-2 rounded-pill" type="submit"
                    id="button-addon2">Search</button>
            </form>
        </div>

        @if ($blog->count())
            <div class="d-flex justify-content-center">
                <div class="row w-75 mt-5">
                    @foreach ($blog as $item)
                        <div class="col-4 my-2 " style="height: 400px">
                            <div class="card "
                                style="width: 18rem;background-color:#7FC7D9;box-shadow:inset 5px 5px 5px black,inset -5px -5px 5px black;height:400px";>
                                <div style="background-color:A0153E ">
                                    <div class="d-flex justify-content-center "
                                        style="background-color: #365486;clip-path: polygon(50% 0%, 100% 0, 100% 5%, 100% 61%, 85% 89%, 49% 100%, 13% 89%, 0 61%, 0 38%, 0 0);box-shadow: inset -1px -3px 5px white,inset 1px 1px 5px white;border: 3px solid black;border-bottom: 0px solid white;">
                                        <img class="card-img-top rounded-circle  mt-5 mb-2"
                                            src="{{ asset('images/fahri_foto.jpeg') }}" alt="Card image cap"
                                            style="width: 100px">
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="card-title">{{ $item['nama'] }}</h5>
                                        <p class="card-text overflow-auto" style="height: 120px;scrollbar-width: none;">
                                            {{ $item['description'] }}</p>
                                    </div>
                                    <div
                                        class="d-flex justify-content-end mb-4 position-absolute position-absolute bottom-0 start-10">
                                        <a href="/List?slug={{ $item['slug'] }}"
                                            class="btn btn-primary rounded-pill">Telusuri</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-end mb-5">
                        {{ $blog->links() }}
                    </div>
                </div>
            </div>
    </div>
@else
    <p>pages tidak ada</p>
    @endif

    </div>
@endsection
