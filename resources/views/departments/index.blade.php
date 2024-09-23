@extends('layout.admin')

@section('admin')
<div class="container">
    <a href="{{ route('departments.create') }}" class="btn btn-primary">Create Department</a>

    {{-- x --}}

    <table class="table">
        <thead>
            <tr>
                <th>Category</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td>{{ $department->category }}</td>
                <td>{{ $department->title }}</td>
                <td>{{ Str::limit($department->description, 50) }}</td>
                <td>
                    @if($department->image)
                        <img src="{{ asset('images/' . $department->image) }}" alt="{{ $department->title }}" width="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline-block;">
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @elseif(session('error'))
            toastr.error('{{ session('error') }}');
        @elseif(session('info'))
            toastr.info('{{ session('info') }}');
        @elseif(session('warning'))
            toastr.warning('{{ session('warning') }}');
        @endif
    });
</script>

@endsection
