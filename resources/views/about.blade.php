@extends('layouts.body')

@section('container')
    <div class="about">
        <div class="header ms-4 mt-4 w-25" style="font-family: arial">
            <h2> pages {{ $pages }}</h2>
            <p>ini adalah halaman about</p>
            <hr class="mx-auto">
        </div>

        <div class="d-flex justify-content-center mt-5">
            <div class="row w-50">
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <img src={{ asset('images/fahri_foto.jpeg') }} class="rounded-circle my-2 mx-auto d-block"
                                alt="..." width="150">
                        </div>
                        <div class="col-8">
                            <div class="container ">
                                @if (isset($item))
                                    <p style="font-size: 12px" class="text-end">{{ $item['created_at'] }}</p>
                                    <h6 class="display-6 m-5">{{ $item['nama'] }}</h6>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12">
                    <div class="abouts">
                        <p>
                            {{ $item['about'] }}
                        </p>
                        <p>
                            umur : {{ $item['umur'] }}
                        </p>
                        <p>
                            married : {{ $item['married'] === 0 ? 'sudah' : 'belum' }}
                        </p>
                        <p>
                            {{ $item['description'] }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
