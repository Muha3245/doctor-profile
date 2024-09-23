<!-- resources/views/Category/index.blade.php -->
@extends('layout.admin')

@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('menu.create') }}">
                            <button class="btn btn-primary" style="float:right;">Add Category</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    {{-- <th>Change Status</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu as $category)
                                    <tr>
                                        <td>
                                            <a href="{{ route('submenu.index', ['menu_id' => $category->id]) }}" class="text-decoration-none text-dark">
                                                {{ $category->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="{{ $category->status ? 'text-success' : 'text-danger' }}">
                                                {{ $category->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('menu.edit', $category->id) }}" class="btn btn-secondary">Edit</a>
                                        </td>
                                        <td>
                                            @if($category->status)
                                                <form action="{{ route('menu.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @else
                                                <button class="btn btn-secondary" disabled>Delete</button>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- <form action="{{ route('menu.toggleStatus', $category->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn {{ $category->status ? 'btn-danger' : 'btn-success' }}">
                                                    {{ $category->status ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
