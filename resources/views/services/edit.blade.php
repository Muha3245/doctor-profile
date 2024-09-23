@extends('layout.admin')

@section('admin')
<div class="container">
    <h1>Edit Service</h1>
    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="icon">Icon Class</label>
            <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $service->icon) }}" required>
            @error('icon')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            <small class="form-text text-muted">Enter the icon class, e.g., "fas fa-heartbeat".</small>
        </div>

        <div class="form-group">
            <label for="title">Service Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $service->title) }}" required>
            @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Service Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description', $service->description) }}</textarea>
            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Service</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
