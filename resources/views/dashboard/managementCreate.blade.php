@extends('dashboard.layouts.main')

@section('contain')
    <div class="col-lg-8">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Management</h1>
        </div>
    </div>
    <div class="col-lg-8">
        <form method="post" action="{{ route('management.store') }}">
            @csrf
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control @error('position') is-invalid @enderror" id="position"
                    name="position">
                @error('position')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role_position">Role Position</label>
                <input id="x" type="hidden" class="@error('role_position') is-invalid @enderror"
                    name="role_position">
                <trix-editor input="x"></trix-editor>
                @error('role_position')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">simpan</button>
        </form>
    </div>
@endsection
