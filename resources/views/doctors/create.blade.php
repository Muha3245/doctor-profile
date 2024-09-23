@extends('layout.admin')

@section('admin')
<div class="container">
    <h2>Add Doctor</h2>
    <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Twitter</label>
            <input type="text" name="twitter" class="form-control">
        </div>
        <div class="mb-3">
            <label>Facebook</label>
            <input type="text" name="facebook" class="form-control">
        </div>
        <div class="mb-3">
            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control">
        </div>
        <div class="mb-3">
            <label>LinkedIn</label>
            <input type="text" name="linkedin" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
