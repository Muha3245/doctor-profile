@extends('layout.admin')

@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit SubMenu for {{ $menu->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('submenu.update', ['menu_id' => $menu->id, 'submenu' => $submenu->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">SubMenu Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $submenu->name }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
