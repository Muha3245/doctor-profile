@extends('layout.admin')

@section('admin')
<div class="container">
    {{-- Uncomment if you want to allow adding new appointments --}}
    {{-- <a href="{{ route('appointments.create') }}" class="btn btn-primary">Add Appointment</a> --}}

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Department</th>
                <th>Doctor</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->phone }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->department->category }}</td>
                <td>{{ $appointment->doctor->name }}</td>
                <td>{{ $appointment->message }}</td>
                <td>
                    @if($appointment->status == 'accepted')
                        <button class="btn btn-secondary" disabled>Approved</button>
                    @else
                        <button type="button" class="btn btn-success" onclick="updateStatus('{{ $appointment->id }}', 'accepted')">Accept</button>
                        <button type="button" class="btn btn-danger" onclick="cancelAppointment('{{ $appointment->id }}')">Cancel</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function updateStatus(appointmentId, newStatus) {
        const url = `{{ url('admin/appointments/${appointmentId}') }}`;

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status: newStatus })
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Network response was not ok.');
        })
        .then(data => {
            alert(data.message);
            location.reload();
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }

    function cancelAppointment(appointmentId) {
        const url = `{{ url('admin/appointments/${appointmentId}') }}`; // Change to the cancel route

        fetch(url, {
            method: 'POST', // Use POST to handle the cancellation
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Network response was not ok.');
        })
        .then(data => {
            alert(data.message); // Show success message
            location.reload(); // Reload the page to see changes
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }
</script>


@endsection
