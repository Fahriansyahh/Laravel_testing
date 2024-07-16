@extends('dashboard.layouts.main')

@section('contain')
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Management</h1>
            <p>Dashboard/Management</p>
        </div>
    </div>
    <div class="mt-3">
        <a class="btn btn-success" href="/dashboard/management/create" role="button">Create</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm mt-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Position</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($management as $item)
                    <tr>
                        <td class="py-auto">{{ $loop->iteration }}</td>
                        <td class="py-auto">{{ $item->position }}</td>
                        <td class="py-auto">{{ $item->created_at }}</td>
                        <td class="py-auto">{{ $item->updated_at }}</td>
                        <td class="py-auto">
                            <div>
                                <ul class="d-flex flex-wrap" style="list-style-type: none;">
                                    <li style=""><a href="/dashboard/management/{{ $item->id }}"><i
                                                class="bi bi-eye"></i></a></li>
                                    <li><a href="/dashboard/management/{{ $item->id }}/edit" class="mx-2"><i
                                                class="bi bi-pencil"></i></a></li>
                                    <li>
                                        <form action="/dashboard/management/{{ $item->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                style="all: unset; display: inline-block; cursor: pointer; color: red;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </li>
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
