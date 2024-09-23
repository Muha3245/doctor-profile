@extends('layout.admin')

@section('admin')
<div class="container">
    <h1>Create Service</h1>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="icon">Icon Class</label>
            <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon') }}" required>
            @error('icon')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            <small class="form-text text-muted">Enter the icon class, e.g., "fas fa-heartbeat".</small>
        </div>

        <div class="form-group">
            <label for="title">Service Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
            @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Service Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Service</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
