<!DOCTYPE html>
<html>
<head>
    <title>New Appointment Created</title>
</head>
<body>
    <h1>New Appointment Details</h1>
    <p><strong>Name:</strong> {{ $appointment->name }}</p>
    <p><strong>Email:</strong> {{ $appointment->email }}</p>
    <p><strong>Phone:</strong> {{ $appointment->phone }}</p>
    <p><strong>Date and Time:</strong> {{ $appointment->date }}</p>
    <p><strong>Department:</strong> {{ $appointment->department->name }}</p>
    <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
    <p><strong>Message:</strong> {{ $appointment->message }}</p>


    <p> {{ $appointment->name }} recive your message your concern
        <br>{{ $appointment->message }} we try to fulfilll your concern after your requirnment
        <br> we will contect you in this numeber {{ $appointment->phone }}</p>
</body>
</html>
