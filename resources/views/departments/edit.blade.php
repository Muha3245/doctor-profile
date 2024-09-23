@extends('layout.admin')

@section('admin')
<div class="container">
    <form action="{{ route('departments.update', $department->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" class="form-control" value="{{ $department->category }}" required>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $department->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control summernote" required>{!! $department->description !!}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            @if($department->image)
                <img src="{{ asset('images/' . $department->image) }}" alt="{{ $department->title }}" width="50">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection
