<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Jobs\AppoinmentMakeMail;
use App\Mail\AppointmentCreated;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    // Display all appointments
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    // Show form to create an appointment
    public function create()
    {
        $departments = Department::all();
        $doctors = Doctor::all();
        return view('welcome', compact('departments', 'doctors'));
    }

    // Store new appointment
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after:today',  // Ensure appointment is in the future
            'department_id' => 'required|exists:departments,id',
            'doctor_id' => 'required|exists:doctors,id',
            'message' => 'nullable|string|max:1000'
        ]);

        // Store appointment data
        $appointment = Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'department_id' => $request->department_id,
            'doctor_id' => $request->doctor_id,
            'message' => $request->message,
        ]);
        // if ($errors = $request->errors()) {
        //     dd($errors); // This will dump errors to the browser.
        // }

        // $appointment = Appointment::create($request->all());



        // Redirect back with success message
        return redirect()->back()->with('success', 'Your appointment request has been submitted.');
    }

    // Show form to edit an appointment
    public function edit(Appointment $appointment)
    {
        $departments = Department::all();
        $doctors = Doctor::all();
        return view('appointments.edit', compact('appointment', 'departments', 'doctors'));
    }

    // Update an existing appointment
    public function update(Request $request, Appointment $appointment)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after:today',
            'department_id' => 'required|exists:departments,id',
            'doctor_id' => 'required|exists:doctors,id',
            'message' => 'nullable|string|max:1000'
        ]);

        // Update appointment data
        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully');
    }

    // Delete an appointment
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully');
    }

    // Accept an appointment and send confirmation email
    public function accept(Appointment $appointment)
    {
        // Optional: Add logic to mark the appointment as accepted
        // e.g., $appointment->update(['status' => 'accepted']);

        // Send acceptance email
        // Mail::to($appointment->email)->send(new AppointmentCreated($appointment));

        return redirect()->route('appointments.index')->with('success', 'Appointment accepted and email sent.');
    }

    // Cancel an appointment and delete it
    public function cancel(Appointment $appointment)
{
    $appointment->delete(); // Update status to canceled
    return response()->json(['message' => 'Appointment canceled successfully.']);
}

    public function updateStatus(Request $request, Appointment $appointment)
{
    $request->validate([
        'status' => 'required|string|in:pending,accepted,canceled',
    ]);

    $appointment->status = $request->status;
    $appointment->save();
    // Mail::to($appointment->email)->send(new AppointmentCreated($appointment));
    dispatch(new AppoinmentMakeMail($appointment));

    return response()->json(['message' => 'Status updated successfully']);
}

}
