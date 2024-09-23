@extends('layout.admin')

@section('admin')
<div class="container">
    <h2>Edit Doctor</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $doctor->name }}" required>
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $doctor->title }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $doctor->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            <img src="{{ asset('storage/' . $doctor->image) }}" width="100" alt="">
        </div>

        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Twitter</label>
            <input type="text" name="twitter" class="form-control" value="{{ $doctor->twitter }}">
        </div>

        <div class="mb-3">
            <label>Facebook</label>
            <input type="text" name="facebook" class="form-control" value="{{ $doctor->facebook }}">
        </div>

        <div class="mb-3">
            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control" value="{{ $doctor->instagram }}">
        </div>

        <div class="mb-3">
            <label>LinkedIn</label>
            <input type="text" name="linkedin" class="form-control" value="{{ $doctor->linkedin }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
