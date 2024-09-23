@extends('layout.admin')

@section('admin')
<div class="container">
    <h1>Add New Gallery</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="images">Images</label>
            <input type="file" name="images[]" multiple>
        </div>

        <button type="submit">Submit</button>
    </form>

</div>
@endsection
