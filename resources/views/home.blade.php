@extends('layouts.body')

@section('container')
    <div class="w-100 p-2">
        <div class=" w-100 card text-bg-dark "
            style="background-image: url({{ asset('images/bgcjumbo.png') }});  background-position:160px 55px;">
            <img src={{ asset('images/bgc.jpg') }} class="card-img" alt="..." height="400px"
                style="clip-path: polygon(0% 0%, 75% 0%, 100% 50%, 75% 100%, 0% 100%);
            ">
            <div class="card-img-overlay d-flex justify-content-center mx-auto"
                style="box-shadow:inset -20px -5px 20px #888888;width:600px;clip-path: polygon(0% 0%, 75% 0%, 100% 30%, 90% 100%, 0% 100%);">
                <div style="background-image: url({{ asset('images/bgcjumbo.png') }});width:700px;
                background-repeat: no-repeat;
                background-size: cover;border-radius:10px;border:2px solid white;clip-path: polygon(0% 0%, 75% 0%, 100% 24%, 90% 100%, 0% 100%);"
                    class="d-flex align-items-end justify-content-start">

                    <div class="text-white w-75 px-4 mb-4  ">
                        <img src={{ asset('images/fahri_foto.jpeg') }} class="mb-4 ms-3 d-block" alt="fahri"
                            width="130" style="clip-path: ellipse(130px 160px at 10% 20%);">
                        <h1>Manajemen Project</h1>
                        <p class="fs-6 mt-2">Dalam proyek pembelajaran pembuatan web menggunakan Laravel, perencanaan
                            strategis
                            menjadi kunci
                            utama untuk mencapai kesuksesan. </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
