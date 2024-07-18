@extends('dashboard.layouts.main')

@section('contain')
    <div class="col-lg-8">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create ListUsers</h1>
        </div>
    </div>
    <div class="col-lg-8">
        <form method="post" enctype="multipart/form-data" action="/dashboard/listusers">
            @csrf
            <div class="mb-3">
                <label for="management_id" class="form-label">Select Position</label>
                <select id="management_id" name="management_id" class="form-select" aria-label="Default select example">
                    @foreach ($management as $item)
                        <option value="{{ $item->id }}">{{ $item->position }}</option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    name="nama">
                @error('nama')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur"
                    name="umur">
                @error('umur')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror
            </div>
            <img class="imgPublish img-fluid img-thumbnail w-25 mb-3 " alt="Image Preview" src=""
                style="display: none">
            <div class="mb-3">

                <label for="images" class="form-label @error('images') is-invalid @enderror">Foto Diri</label>
                <input class="form-control" type="file" id="images" name="images" onchange="filedata()">

                @error('images')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror

                <script>
                    function filedata() {
                        const image = document.querySelector('#images');
                        const imagesFoto = document.querySelector('.imgPublish');
                        imagesFoto.style.display = 'block'
                        const oFReader = new FileReader();
                        oFReader.readAsDataURL(image.files[0]);

                        oFReader.onload = function(OFREvent) {
                            imagesFoto.src = OFREvent.target.result;
                        };
                    }
                </script>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input @error('married') is-invalid @enderror" id="married"
                    name="married">
                <label class="form-check-label" for="married">Maried</label>
                @error('married')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <input id="x" type="hidden" class="@error('description') is-invalid @enderror" name="description">
                <trix-editor input="x"></trix-editor>
                @error('description')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="about">About</label>
                <input id="about" type="hidden" class="@error('about') is-invalid @enderror" name="about">
                <trix-editor input="about"></trix-editor>
                @error('about')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">simpan</button>
        </form>
    </div>
@endsection
