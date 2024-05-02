@extends('layouts.body')

@section('container')
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
                        <div class="col-4">
                            <img src={{ asset('images/fahri_foto.jpeg') }} class="rounded-circle my-2 mx-auto d-block"
                                alt="..." width="150">
                        </div>
                        <div class="col-8">
                            <div class="container ">
                                @if (isset($blog))
                                    <p style="font-size: 12px" class="text-end">{{ $blog->created_at }}</p>
                                    <div class="m-3">
                                        <h6 class="display-6 ">{{ $blog->nama }}</h6>
                                    </div>
                                @endif
                            </div>
                        </div>
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
