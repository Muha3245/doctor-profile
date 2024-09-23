
@extends('layout.admin')
@section('admin')


    <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label><strong>Description :</strong></label>
            <textarea class="summernote" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>



{{-- @section('scripts') --}}
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection
