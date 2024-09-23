@extends('layout.admin')

@section('admin')
<div class="container">
    <h2>Add Appointment</h2>

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date">Date and Time</label>
            <input type="datetime-local" name="date" id="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="department">Department</label>
            <select name="department_id" id="department" class="form-control" required>
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->category }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="doctor">Doctor</label>
            <select name="doctor_id" id="doctor" class="form-control" required>
                <option value="">Select Doctor</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
