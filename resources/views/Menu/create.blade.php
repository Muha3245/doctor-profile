@extends('layout.admin')

@section('admin')

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create menu</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('menu.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="name"> Name:</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="mb-3">
                            <label for="status">Status:</label>
                            <select id="status" name="status" required>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create Menu</button>

            </form>
            <button class="btn btn-danger"><a href="{{ route('menu.index') }}" style="color: white; text-decoration: none;">Back to menu</a></button>
        </div>
    </div>
@endsection
