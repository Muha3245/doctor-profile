@extends('layout.admin')

@section('admin')
<div class="container">
    <form action="{{ route('iconboxes.update', $iconbox->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $iconbox->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="5" required>{{ $iconbox->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" name="icon" class="form-control" value="{{ $iconbox->icon }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
