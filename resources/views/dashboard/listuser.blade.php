@extends('dashboard.layouts.main')

@section('contain')
    <div class="col-lg-12">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">List Users</h1>
            <p>Dashboard/list users</p>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mt-3">
            <a class="btn btn-success" href="/dashboard/listusers/create" role="button">Create</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Umur</th>
                        <th scope="col">married</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td class="py-auto">{{ $loop->iteration }}</td>
                            <td class="py-auto">{{ $item->nama }}</td>
                            <td class="py-auto">{{ $item->umur }}</td>
                            <td class="py-auto">{{ $item->married }}</td>
                            <td class="py-auto">
                                <div>
                                    <ul class="d-flex flex-wrap" style="list-style-type: none;">
                                        <li style=""><a href="/dashboard/listusers/{{ $item->slug }}"><i
                                                    class="bi bi-eye"></i></a></li>
                                        <li><a href="/dashboard/listusers/{{ $item->id }}/edit" class="mx-2"><i
                                                    class="bi bi-pencil"></i></a></li>
                                        <form action="/dashboard/listusers/{{ $item->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                style="all: unset; display: inline-block; cursor: pointer; color: red;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
