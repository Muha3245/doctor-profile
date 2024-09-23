@extends('layout.admin')

@section('admin')
<div class="container">
    <h2>Edit Appointment</h2>

    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $appointment->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $appointment->email }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $appointment->phone }}" required>
        </div>

        <div class="form-group">
            <label for="date">Date and Time</label>
            <input type="datetime-local" name="date" id="date" class="form-control" value="{{ $appointment->date->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="department">Department</label>
            <select name="department_id" id="department" class="form-control" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $appointment->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="doctor">Doctor</label>
            <select name="doctor_id" id="doctor" class="form-control" required>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control">{{ $appointment->message }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
