@extends('dashboard.layouts.main')

@section('contain')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Management {{ $management->position }}</h1>
        <p>Dashboard/Management/user</p>
    </div>
    <div class="jumbotron mt-5">
        <h1 class="display-4">{{ $management->position }}</h1>
        <p>{{ $management->role_position }}</p>
        <hr>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm mt-5">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Married</th>
                    <th scope="col">Created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td class="py-auto">{{ $loop->iteration }}</td>
                        <td class="py-auto">{{ $item->nama }}</td>
                        <td class="py-auto">{{ $item->umur }}</td>
                        <td class="py-auto">{{ $item->married === 0 ? 'belum' : 'sudah' }}</td>
                        <td class="py-auto">{{ $item->created_at }}</td>
                        <td class="py-auto">
                            <div>
                                <ul class="d-flex flex-wrap" style="list-style-type: none;">
                                    <li style=""><a href="/dashboard/management/{{ $item->id }}"><i
                                                class="bi bi-eye"></i></a></li>
                                    <li><a href="" class="mx-2"><i class="bi bi-pencil"></i></a></li>
                                    <li><a href=""><i class="bi bi-trash"></i></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
