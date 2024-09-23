@extends('layout.admin')

@section('admin')
<div class="container">
    <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add Doctor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Title</th>
                <th>Social</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>
                    @if($doctor->image)
                        <img src="{{ asset('doctors/' . $doctor->image) }}" width="50" alt="Doctor Image">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->title }}</td>
                <td>
                    @if($doctor->twitter)
                        <a href="{{ $doctor->twitter }}" target="_blank"><i class="ri-twitter-fill"></i></a>
                    @endif
                    @if($doctor->facebook)
                        <a href="{{ $doctor->facebook }}" target="_blank"><i class="ri-facebook-fill"></i></a>
                    @endif
                    @if($doctor->instagram)
                        <a href="{{ $doctor->instagram }}" target="_blank"><i class="ri-instagram-fill"></i></a>
                    @endif
                    @if($doctor->linkedin)
                        <a href="{{ $doctor->linkedin }}" target="_blank"><i class="ri-linkedin-box-fill"></i></a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
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
