@extends('layouts.body')

@section('container')
    <div class="management">
        <div class="header ms-4 mt-4 w-25" style="font-family: arial">
            <h2> pages {{ $pages }}</h2>

            <p>ini adalah halaman Management</p>
            <hr class="mx-auto">
        </div>
        <div class="d-flex justify-content-center ">
            <div class="jumbotron jumbotron-fluid bg-info-bg-subtle w-75 py-5">
                <div class="container">
                    <h6 class="display-6">{{ $managementSlug->position }}</h6>
                    <p style="font-size: 12px">Management {{ $managementSlug->position }}</p>
                    <p class=" w-50">{{ $managementSlug->role_position }}</p>
                    <hr class="mx-auto">
                </div>
                <div class="d-flex justify-content-center">
                    <ul class="w-75 ">
                        <div class="header ms-4 mt-4 w-25" style="font-family: arial">
                            <h5> User</h5>
                            <p style="font-size: 12px">List User Management</p>
                            <hr class="mx-auto">
                        </div>
                        @foreach ($management as $item)
                            <li class="list-group-item mx-2 d-flex flex-wrap  justify-content-between mt-2"
                                style="background-color:aliceblue">
                                <img class="card-img-top rounded-circle " src="{{ asset('images/fahri_foto.jpeg') }}"
                                    alt="Card image cap" style="width: 40px">
                                <p>{{ $item->nama }}</p>
                                <a href="/List?slug={{ $item->slug }}">Telusuri</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endsection
