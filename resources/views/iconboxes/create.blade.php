@extends('layout.admin')

@section('admin')
<div class="container">
    <form action="{{ route('iconboxes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" name="icon" class="form-control" placeholder="e.g., bx bx-fingerprint" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
