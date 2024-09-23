@extends('layout.admin')

@section('admin')
<div class="container">
    <h2>Edit Gallery</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $gallery->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="images">Add New Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>

    <div class="mt-4">
        <h5>Existing Images</h5>
        <div class="row">
            @if($gallery->image)
                @foreach (json_decode($gallery->image, true) as $index => $image)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('galleries/' . $image) }}" class="card-img-top" alt="Gallery Image" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <form action="{{ route('gallery.image.destroy', [$gallery->id, $index]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No images available</p>
            @endif
        </div>
    </div>
</div>
@endsection
