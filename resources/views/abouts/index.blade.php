@extends('layout.admin')

@section('admin')
<div class="container">
    <a href="{{ route('abouts.create') }}" class="btn btn-primary">Create About Section</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($abouts as $about)
            <tr>
                <td><img src="{{ asset('images/'.$about->image) }}" width="100"></td>
                <td>{{ $about->description }}</td>
                <td>
                    <a href="{{ route('abouts.edit', $about->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('abouts.destroy', $about->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
