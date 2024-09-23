@extends('layout.admin')

@section('admin')
<div class="container">
    <a href="{{ route('iconboxes.create') }}" class="btn btn-primary">Create Icon Box</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($iconboxes as $iconbox)
            <tr>
                <td>{{ $iconbox->title }}</td>
                <td>{{ $iconbox->description }}</td>
                <td><i class="{{ $iconbox->icon }}"></i></td>
                <td>
                    <a href="{{ route('iconboxes.edit', $iconbox->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('iconboxes.destroy', $iconbox->id) }}" method="POST" style="display:inline-block;">
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
