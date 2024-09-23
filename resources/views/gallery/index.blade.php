@extends('layout.admin')

@section('admin')
<div class="container">
    <h1>Gallery</h1>
    <a href="{{ route('gallery.create') }}" class="btn btn-primary">Add New Gallery</a>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($galleries as $gallery)
            <div class="col-md-4 mb-4">
                <!-- Gallery Description -->
                <p>{{ $gallery->description }}</p>

                <!-- Display Gallery Images -->
                @if($gallery->image)
                    <div class="row">
                        @foreach (json_decode($gallery->image, true) as $image)
                            <div class="col-md-6 mb-2">
                                <img src="{{ asset('galleries/' . $image) }}" alt="Gallery Image" class="img-thumbnail">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No images available</p>
                @endif

                <!-- Edit Button -->
                <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>

                <!-- Delete Form -->
                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
