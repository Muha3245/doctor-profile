@extends('layout.admin')

@section('admin')
<div class="container">
    <h1>Services</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Create Service</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($services->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td><i class="{{ $service->icon }}"></i></td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->description }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this service?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No services found.</p>
    @endif
</div>
@endsection
