@extends('dashboard.layouts.main')

@section('contain')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    </div>
    <div class="about">
        <div class="header ms-4 mt-4 w-25" style="font-family: arial">
            <h2> pages {{ $pages }}</h2>
            <p>ini adalah halaman users</p>
            <hr class="mx-auto">
        </div>
        <div class="d-flex justify-content-center mt-5">
            <div class="row w-50">
                <div class="col-12">
                    <div class="row">
                        @if ($item->images)
                            <div class="col-4" style="max-width:150px;">
                                <img src="{{ asset('storage/' . $item->images) }}"
                                    class="rounded-circle my-2 mx-auto d-block border border-dark" alt="..."
                                    width="150">
                            </div>
                        @else
                            <div class="col-4">
                                <img src={{ asset('images/fahri_foto.jpeg') }} class="rounded-circle my-2 mx-auto d-block"
                                    alt="..." width="150">
                            </div>
                        @endif

                    </div>

                </div>
                <div class="col-12 my-5">
                    <div class="abouts">
                        <p>
                            {{ $item->about }}
                        </p>
                        <p>
                            umur : {{ $item->umur }}
                        </p>
                        <p>
                            married : {{ $item->married === 0 ? 'sudah' : 'belum' }}
                        </p>
                        <p>
                            {{ $item->description }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
