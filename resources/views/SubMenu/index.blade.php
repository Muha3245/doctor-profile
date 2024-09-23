@extends('layout.admin')

@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>SubMenus for </h5>
                        {{-- <a href="{{ route('submenu.create', ['menu_id' => $menuId]) }}">
                            <button class="btn btn-primary" style="float:right;">Add SubMenu</button>
                        </a> --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Change Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sub as $submenu)
                                    <tr>
                                        <td>{{ $submenu->menu->name }}</td>
                                        {{-- <td>
                                            <span class="{{ $submenu->status ? 'text-success' : 'text-danger' }}">
                                                {{ $submenu->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('submenu.edit', ['menu_id' => $menuId, 'submenu' => $submenu->id]) }}" class="btn btn-secondary">Edit</a>
                                        </td>
                                        <td>
                                            @if ($submenu->status)
                                                <form action="{{ route('submenu.destroy', ['menu_id' => $menuId, 'submenu' => $submenu->id]) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @else
                                                <button class="btn btn-secondary" disabled>Delete</button>
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            <form action="{{ route('submenu.toggleStatus', ['submenu' => $submenu->id, 'menu_id' => $menuId]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn {{ $submenu->status ? 'btn-danger' : 'btn-success' }}">
                                                    {{ $submenu->status ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </form>
                                        </td> --}}
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
